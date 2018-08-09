<?php

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