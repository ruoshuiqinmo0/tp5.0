<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 14:28
 */

namespace app\api\controller\v1;


use app\api\service\Token;

class Order extends BaseController
{
    protected $beforeActionList = [
        'checkExclusiveScope' => ['only' => 'placeOrder'],
    ];

    public function placeOrder()
    {
        (new OrderPlace)->goCheck();
        $products = input('post.products/a');
        $uid = Token::getCurrentUid();


    }
}