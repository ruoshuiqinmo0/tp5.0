<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/19
 * Time: 10:14
 */

namespace app\lib\exception;


use Exception;
use think\exception\Handle;
use think\Log;
use think\Request;

class ExceptionHandler extends Handle
{
    protected $code;
    protected $msg;
    protected $errorCode;

    public function render(Exception $e)
    {
        //dump($e);
        if ($e instanceof BaseException) {
            //自定义异常
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if(config('app_debug')){
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = ' 服务器内部错误';
            $this->errorCode = 999;
            $this->recordErrorLog($e);
        }
        $request = Request::instance()->url(true);
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'request_url' => $request,
        ];
        return json($result, $this->code);
    }

    protected function recordErrorLog(Exception $e)
    {
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level'=>['error']
        ]);
        Log::record($e->getMessage(), 'error');
    }
}