<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Exception;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function getAllDocument()
    {   
        // note : buat field baru aja di table buat nampung link dari inputan
        try {
        $doc = Document::all(); 
        foreach ($doc as $d) {
            $test = url('document') . '/'. $d->id . '/download';
        }
            return ResponseFormatter::success([
                'message' => 'Successed Fetch all Document Data!',
                'data' => [
                    'doc' => $doc,
                    'file' => $test
                ]
            ]);
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error,
            ], 'Get Document Failed', 500);
        }
       
    }


    public function getDocumentById(Document $document)
    {
        $u = Document::find($document);
        if ($u) {
           return ResponseFormatter::success(
            $u,
            'Document was Found',
        );
        } else {
            return ResponseFormatter::error(
                null,
                'Document Data Not Found',
                404
            );
        }

    }
}
