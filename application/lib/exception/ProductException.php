<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/20
 * Time: 16:59
 */

namespace app\lib\exception;


class ProductException extends BaseException
{
    public $code = 404;
    public $msg  = '指定的商品不存在';
    public $errorCode = 40000;
}