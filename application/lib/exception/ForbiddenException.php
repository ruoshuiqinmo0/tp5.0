<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/24
 * Time: 14:22
 */

namespace app\lib\exception;


class ForbiddenException extends BaseException
{
    public $code = 404;
    public $msg  = '没有权限';
    public $errorCode = 10000;
}