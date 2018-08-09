<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 18:25
 */

namespace app\api\model;


class UserAddress extends BaseModel
{
    protected $hidden = ['update_time', 'delete_time', 'user_id'];
}