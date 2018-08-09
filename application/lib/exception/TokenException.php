<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 14:36
 */

namespace app\lib\exception;


class TokenException extends BaseException {
    public $code = 403;
    public $msg  = 'token已失效';
    public $errorCode = 10001;
}