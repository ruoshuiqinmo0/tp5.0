<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 18:04
 */

namespace app\api\validate;


use app\lib\exception\ParameterException;

class OrderPlace extends BaseValidate
{
    protected $rule = [
        'products' => 'checkProducts',
    ];

    protected $simpleRule = [
        'product_id' => 'require|isPositiveInteger',
        'count' => 'require|isPositiveInteger'
    ];

    protected function checkProducts($values)
    {
        if (!empty($values)) {
            throw new ParameterException([
                'msg' => '参数不对'
            ]);
        }
        foreach ($values as $value) {
            $this->checkProduct($value);
        }
        return true;
    }

    protected function checkProduct($value)
    {
        $validate = new BaseValidate($this->simpleRule);
        $result = $validate->check($value);
        if (!$result) {
            throw new ParameterException([
                'msg' => '商品列表参数错误',
            ]);
        }
    }
}