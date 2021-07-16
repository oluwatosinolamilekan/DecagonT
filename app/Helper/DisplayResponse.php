<?php


namespace App\Helper;


class DisplayResponse
{
    public static function resourceNotFound()
    {
        return response()->json([
            'status' => 'error',
            'message' => 'resource not found'
        ], 404);
    }

    public static function notFoundResponse()
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => [],
            'data' => null,
        ]);
    }

    public static function deleteResponse()
    {
        return response()->json([
            'status' => true,
            'message' => "Delete Operation Successful",
            'errors' => [],
            'data' => null,
        ]);
    }

    public static function resSuccess()
    {
        return response()->json([
            'status' => true,
            'message' => "Operation Successful",
            'errors' => []
        ]);
    }

    public static function reFailed($error)
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => $error,
            'data' => null,
            'meta' => null
        ]);
    }

    public static function somethingWentWrong()
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => 'Something Went Wrong',
            'data' => null,
            'meta' => null
        ]);
    }

    public static function unauthorized()
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => 'unauthorized',
            'data' => null,
            'meta' => null
        ]);
    }
}
