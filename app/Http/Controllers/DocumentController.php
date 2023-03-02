<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use PhpParser\Comment\Doc;
use RealRashid\SweetAlert\Facades\Alert;
use Webpatser\Uuid\Uuid;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doc = Document::paginate(10);
        return view('document.index', [
            'document' => $doc
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('document.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['file' => 'required|mimes:doc,docx,xlx,csv,pdf,xlsx,|max:50000']);
        
        // ambil semua inputan
        $data = $request->all();
        $uuid = (string)Uuid::generate();
        $data['uuid'] = $uuid;
        $destinationPath = 'document';
        // cek upload document
        if($doc = $request->file('file')) 
        {
            // $file_name = date('YmdHis'). '.' . $doc->getClientOriginalExtension();
            $file_name = date('YmdHis'). '-' . $doc->getClientOriginalName();
            $doc->move($destinationPath, $file_name);
            $data['file'] = "$file_name";
            $data['link'] = url($destinationPath) . '/' . $uuid .'/'."download";
        } 

        $data['uploader'] = Auth::user()->name;
        
        Document::create($data);
        Alert::success("Congrats, You're file has been added!");

        return redirect()->route('document.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {   
        return view('document.edit', [
            'item' => $document
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        $request->validate(['file' => 'required|mimes:doc,docx,xlx,csv,pdf,xlsx,|max:50000']);
        
        // ambil semua inputan
        $data = $request->all();

        // cek upload document
        if($doc = $request->file('file')) 
        {   
            // hapus data lama 
            unlink('document/'.$document->file);
            
            // update kalo ada uploadan
            $destinationPath = 'document';
            // $file_name = date('YmdHis'). '.' . $doc->getClientOriginalExtension();
            $file_name = date('YmdHis'). '-' . $doc->getClientOriginalName();
            $doc->move($destinationPath, $file_name);
            $data['file'] = "$file_name";
        } else {
            unset($data['file']);
        }
        
        $data['uploader'] = Auth::user()->name;
        
        $document->update($data);
        Alert::success("Congrats, You're file has been Updated!");

        return redirect()->route('document.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $doc = public_path('document/').$document->file;
        // cek jika file ada
        if(file_exists($doc))
        {
            unlink($doc);
        }

        $document->delete();
         return response()->json([
            'success' => 'File deleted.'
        ]);
    }

    public function download($uuid)
    {   
        $f = Document::where('uuid', $uuid)->firstOrFail();

        // dd($f->file);
        // path
        $pathToFile = public_path('document/' . $f->file);
        return response()->download($pathToFile);
    }
}
