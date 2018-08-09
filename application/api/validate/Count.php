<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/20
 * Time: 16:47
 */

namespace app\api\validate;


class Count extends BaseValidate
{
    protected $rule = [
        'size' => 'isPositiveInteger|between:1,15',
    ];

    protected $message = [
        'size' => 'size必须是正整数|不在范围内',
    ];
}