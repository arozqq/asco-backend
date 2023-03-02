<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getAllVideo()
    {
        $video = Video::all();

        return ResponseFormatter::success([
            'message' => 'Successed Fetch all Video Data!',
            'data' => $video
        ]);
    }


    public function getVideoById(Video $video)
    {
        $v = Video::find($video);
        if ($v) {
           return ResponseFormatter::success(
            $v,
            'Video was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'Video Data Not Found',
                404
            );
        }
    }
}
