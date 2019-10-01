<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
        AuthenticationException::class
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);

        if($exception->getMessage() == 'Unauthenticated.' || empty($exception->getMessage()) || $exception instanceof AuthenticationException){
            //'訊息為：Unauthenticated',此異常不發送通知
        }else{
            $this->pushOver($exception->getMessage());
        }

    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }

    protected function unauthenticated($request, AuthenticationException $exception) {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        //dd($request->path());

        if (preg_match('/^backstage/', $request->path())) {
            return redirect()->to('/backstage/login');
        }

        return redirect()->guest(route('login'));
    }

    function pushOver($msg){
        $msg = trim($msg);

        if($msg != 'Unauthenticated.') {

            $msg = '[logitech]' . $msg;

            curl_setopt_array($ch = curl_init(), array(
                CURLOPT_URL => "https://api.pushover.net/1/messages.json",
                CURLOPT_POSTFIELDS => array(
                    "token" => "ap9hkibdqds1ssbcvz3b7h9mo8mz31",
                    "user" => "ujikj81ex55jevhrh7kp1gxig6cxez",
                    "message" => $msg,
                ),
                CURLOPT_SAFE_UPLOAD => true,
                CURLOPT_RETURNTRANSFER => true,
            ));
            curl_exec($ch);
            curl_close($ch);
        }
    }
}
