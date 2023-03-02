<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pills;
use Exception;
use Illuminate\Http\Request;

class PillsController extends Controller
{
    public function getAllPills()
    {
        // $p = Pills::with('user')->get();
        $p = Pills::all();

        return ResponseFormatter::success([
            'message' => 'Successed Fetch all Pills Data!',
            'data' => $p
        ]);
    }

    public function getPillsById($id)
    {
        // $p = Pills::with('user')->findOrFail($id);
        $p = Pills::findOrFail($id);
        if ($p) {
           return ResponseFormatter::success([
            'data' => $p,
            'message' => 'Pills was Found',
        ]);
        } else {
            return ResponseFormatter::error(
                null,
                'Pills Data Not Found',
                404
            );
        }
    }


    public function createPills(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required','string'],
                'username' => ['required','string'],
                'amount' => ['required', 'integer'],
                'type' => ['required'],
                'howManyWeeks' => ['required', 'integer'], 
                'howManyDays' => ['required', 'integer'],
                'medicineForm' => ['required'],
                'schedule' => ['required'],
                'takeit' => ['required']
            ]);
            
            // $data['user_id'] = $request->user_id;

            $data = $request->all();
            Pills::create($data);
            return ResponseFormatter::success([
                'message' => 'Success added Pills',
                'data' => $data
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error,
            ], 'Create Pill Failed Failed', 500);
        }
    }
}
