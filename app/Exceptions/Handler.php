<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler,
    Symfony\Component\HttpKernel\Exception\NotFoundHttpException,
    Illuminate\Auth\AuthenticationException,
    Illuminate\Database\QueryException,
    Exception,
    Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->renderable(function (AuthenticationException $e) {
            return response()->json(
                [
                    'message'   =>  "Authentication Invalid",
                    'results'   =>  [],
                    'code'      =>  401,
                    'errors'    =>  true,
                ], 401);
        });

        $this->renderable(function (NotFoundHttpException $e) {
            return response()->json(
                [
                    'message'   =>  "Data not found, Please double check your data",
                    'results'   =>  [],
                    'code'      =>  404,
                    'errors'    =>  true,
                ], 404);
        });

        $this->renderable(function (QueryException $e) {
            return response()->json(
                [
                    'message'   =>  "Some data does not exist, Please double check your data",
                    'results'   =>  [],
                    'code'      =>  404,
                    'errors'    =>  true,
                ], 404);
        });

        // $this->renderable(function (Exception $e) {
        //     return response()->json(
        //         [
        //             'message'   =>  "Unexpected error please contact spcfsms@spcf.edu.ph",
        //             'results'   =>  [],
        //             'code'      =>  422,
        //             'errors'    =>  true,
        //         ], 422);
        // });
    }
}
