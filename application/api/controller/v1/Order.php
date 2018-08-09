<?php


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