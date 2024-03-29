<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        Exception::class
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        // If the request come from /API/, convert to json response
        if(strpos($request->getPathInfo(), '/api/') !== false)
        {
            // Define the response
            $response = [
                'errors' => 'Sorry, something went wrong.'
            ];

            if ($e instanceof APIException) {
                $response['message'] = $e->getMessage();
            }else{
                if (config('app.debug')) {
                    $response['message'] = $e->getMessage();
                }
            }
            // If the app is in debug mode
            if (config('app.debug')) {
                // Add the exception class name, message and stack trace to response
                $response['exception'] = get_class($e); // Reflection might be better here
                $response['trace'] = $e->getTraceAsString();
            }

            // Default response of 400
            $status = 400;

            // If this exception is an instance of HttpException
            if ($this->isHttpException($e)) {
                // Grab the HTTP status code from the Exception
                $status = $e->getStatusCode();
            }

            // Return a JSON response with the response array and status code
            return  response()->json($response, $status);
        }

        if ($e instanceof \Bican\Roles\Exceptions\RoleDeniedException) 
        {
            
            return redirect()->back();
        }    

        if ($e instanceof TokenMismatchException) 
        {
            return redirect('login');
        }

        
        return parent::render($request, $e);
    }
}
