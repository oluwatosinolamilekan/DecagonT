<?php


namespace App;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;


    function resourceNotFound(): JsonResponse
    {
        return response()->json([
            'status' => 'error',
            'message' => 'resource not found'
        ], 404);
    }

    function notFoundResponse(): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => [],
            'data' => null,
        ]);
    }

    function deleteResponse(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Delete Operation Successful",
            'errors' => [],
            'data' => null,
        ]);
    }

    function resSuccess(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => "Operation Successful",
            'errors' => []
        ]);
    }

    function reFailed($error): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => $error,
            'data' => null,
            'meta' => null
        ]);
    }

    function somethingWentWrong(): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => 'Something Went Wrong',
            'data' => null,
            'meta' => null
        ]);
    }

    function unauthorized(): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => "Operation Failed",
            'errors' => 'unauthorized',
            'data' => null,
            'meta' => null
        ]);
    }

    function returnToken($user,$request = null): JsonResponse
    {
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request && $request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(10); #can add any number there..
        }
        $token->save();
        return response()->json([
            'status' => true,
            'message' => "Operation Successful",
            'errors' => [],
            'data' => [
                'name' => $user->name,
                'username' => $user->user_data_name,
                'email' => $user->email,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString()
            ]
        ]);
    }

    function hey()
    {
        return [
            'status' => false,
            'message' => "Operation Failed",
            'errors' => 'unauthorized',
            'data' => null,
            'meta' => null
        ];
    }
