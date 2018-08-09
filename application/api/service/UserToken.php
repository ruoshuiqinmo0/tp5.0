<?php

namespace app\api\service;


use app\lib\enum\ScopeEnum;
use app\lib\exception\TokenException;
use think\Exception;
use app\api\model\User;

class UserToken
{
    protected $code;
    protected $wxAppID;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
    }


    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
        $wxResult = json_decode($result, true);
        if (empty($wxResult)) {
            throw new Exception('获取session_key及openid异常');
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            } else {
                $token = $this->grantToken();
            }
        }
        return $token;
    }

    private function grantToken($wxResult)
    {
        //
        $openid = $wxResult['openid'];
        $user = User::getByOpenID($openid);
        if ($user) {
            $uid = $user->id;
        } else {
            $uid = $this->newUser($openid);
        }
        $cacheValue = $this->prepareCacheValue($wxResult, $uid);
        $token = $this->saveToCache($cacheValue);
        return $token;
    }

    /***
     *
     * @param $cacheValue
     * @return mixed
     * @throws TokenException
     */
    private function saveToCache($cacheValue)
    {
        $key = self::generateToken();
        $value = json_encode($cacheValue);
        $expire_in = config('setting.token_expire_in');
        $request = cache($key, $value, $expire_in);
        if (!$request) {
            throw new TokenException();
        }
        return $key;
    }

    /***
     * 生成缓存value
     * @param $wxResult
     * @param $uid
     * @return mixed
     */
    private function prepareCacheValue($wxResult, $uid)
    {
        $cacheValue = $wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = ScopeEnum::User;
        return $cacheValue;
    }

    /***
     * 添加新用户
     * @param $openid
     * @return mixed
     */
    private function newUser($openid)
    {
        $user = User::create([
            'openid' => $openid,
        ]);
        return $user->id;
    }

    private function processLoginError($wxResult)
    {
        throw new Exception([
            'msg' => $wxResult['errmsg'],
            'errorCode' => $wxResult['errcode']
        ]);
    }
}