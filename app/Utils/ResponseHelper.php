<?php

namespace App\Utils;

class ResponseHelper
{
    public static function sendResponse($data,$message)
    {
        return response()->json(['status'=>true,'data'=>$data,'message'=>$message],200);
    }
    public static function sendError($message,$errors= [],$status= 500)
    {
        $response = [
            'status'=>false,
            'message'=>$message,
        ];
        if(!empty($errors)){
            $response['data'] = $errors;
        }
        return response()->json($response,$status);
    }

}
