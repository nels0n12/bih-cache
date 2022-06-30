<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

trait ApiResponser
{
    /**
     * Build success response
     * @param  $data
     * @param  int $code
     * @return JsonResponse
     */
    public function successResponse($data , int $code = ResponseAlias::HTTP_OK, $display = 'Operation Successful'): JsonResponse
    {
        return response()->json([
            'type' => 'success',
            'data' => $data,
            'code' => $code
        ],
            $code
        );
    }

//    /**
//     * Build valid response
//     * @param  string|array $data
//     * @param  int $code
//     * @return Illuminate\Http\JsonResponse
//     */
//    public function validResponse($data, $code = Response::HTTP_OK)
//    {
//        return response()->json(['data' => $data], $code);
//    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param int $code
     * @return JsonResponse
     */
    public function successResponseMessage($message, int $code = ResponseAlias::HTTP_OK): JsonResponse
    {
        if (!is_bool($message))
        {
            $message = strtolower($message);
        }

        return response()->json([
            'type' => 'success',
            'data' => $message,
            'code' => $code
        ],
            $code
        );
    }

    /**
     * Build error responses
     * @param  string|array $message
     * @param int $code
     * @return JsonResponse
     */
    public function errorResponse($message, int $code): JsonResponse
    {
        $type = gettype($message);

        if ($type == 'string')
        {
            $message = strtolower($message);
        }
        return response()->json([
            'type' => 'error',
            'data' => $message,
            'code' => $code
        ],
            $code
        );
    }

//    /**
//     * Build error responses
//     * @param  string|array $message
//     * @param int $code
//     * @return \Illuminate\Http\Response
//     */
//    public function errorMessage($message, int $code): Response
//    {
//        return response($message, $code)->header('Content-Type', 'application/json');
//    }
}
