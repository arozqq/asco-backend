<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\MitosFakta;
use Illuminate\Http\Request;

class MitosFaktaController extends Controller
{
    public function getAllMitosFakta()
    {
        $mf = MitosFakta::all();

        return ResponseFormatter::success([
            'message' => 'Successed Fetch all Mitos Fakta Data!',
            'data' => $mf
        ]);
    }


    public function getMitosFaktaById(MitosFakta $mitosfaktum)
    {
        $mf = MitosFakta::find($mitosfaktum);
        if ($mf) {
           return ResponseFormatter::success(
            $mf,
            'Mitos & Fakta was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'Mitos & Fakta Not Found',
                404
            );
        }
    }
}
