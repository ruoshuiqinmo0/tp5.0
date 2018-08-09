<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/18
 * Time: 17:56
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
         'id'=>'require|isPositiveInteger',
    ];

    protected $message = [
        'id' => 'ids必填|ids参数必须是正整数',
    ];

}