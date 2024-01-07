<?php
namespace App\Helpers;

class ApiFormatter
{
    protected static $response = [
        // 'code' => null,
        // 'message' => null,
        'data' => null,
    ];

    public static function createApi($data = null)
    {
        // self::$response['code'] = $code;
        // self::$response['message'] = $message;
        self::$response = $data;

        return response()->json(self::$response);
    }
}
