<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Poster;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    public function getAllPoster()
    {
        $poster = Poster::all();

        return ResponseFormatter::success([
            'message' => 'Successed Fetch all Poster Data!',
            'data' => $poster
        ]);
    }


    public function getPosterById(Poster $poster)
    {
        $p = Poster::find($poster);
        if ($p) {
           return ResponseFormatter::success(
            $p,
            'Poster was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'Poster Data Not Found',
                404
            );
        }
    }
}
