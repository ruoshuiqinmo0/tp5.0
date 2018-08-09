<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/20
 * Time: 19:53
 */

namespace app\api\model;


class User extends BaseModel
{

    public function address(){
        return $this->hasOne('Address','user_id','id');
    }

    public function getByOpenID($openid){
        $user = self::where('openid','=',$openid)->find();
        return $user;
    }

}