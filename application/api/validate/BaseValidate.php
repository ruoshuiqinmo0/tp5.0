<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 18:39
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck()
    {
        //接收参数
        $request = Request::instance();
        $params = $request->param();
        //校验
        $result = $this->batch()->check($params);
        if (!$result) {
            $e = new ParameterException([
                'msg' => is_array($this->error) ? implode(',', $this->error) : $this->error,
            ]);
            throw $e;
            //$error = $this->error;
            //throw new ParameterException(is_array($error)?implode(',',$error):$error);
        } else {
            return true;
        }
    }

    /**
     * @param $value
     * @param string $rule
     * @param string $data
     * @param string $field
     */
    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return false;
        }
    }

    protected function isEmpty($value, $rule = '', $data = '', $field = '')
    {
        if (empty($value)) {
            return $field . '不能为空';
        } else {
            return true;
        }
    }

    public function getDataByRule($arrays)
    {
        if (array_key_exists('user_id', $arrays) | array_key_exists('uid', $arrays)) {
            throw new ParameterException([
                'msg' => '有非法参数uid或者user_id'
            ]);
        }
        $newArray = [];

        foreach ($this->rule as $key => $val) {
            $newArray[$key] = $arrays[$key];
        }
        return $newArray;
    }

    protected function isMobile($value){
        $rule = '^1(3|4|5|7|8|9)[0-9]\d{8}$^';
        $result = preg_match($rule,$value);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}