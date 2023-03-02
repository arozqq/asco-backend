<?php

namespace App\Http\Controllers;

use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Webpatser\Uuid\Uuid;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poster = Poster::paginate(10);
        return view('poster.index', [
            'poster' => $poster
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poster.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['poster_image' => 'image','max:50000']);
        
        // ambil semua inputan
        $data = $request->all();
        $uuid = (string)Uuid::generate();
        $data['uuid'] = $uuid;
        // cek upload document
        if ($poster = $request->file('poster_image')) {
            $destinationPath = 'poster';
            $posterImage = date('YmdHis') . "." . $poster->getClientOriginalName();
            $poster->move($destinationPath, $posterImage);
            $data['poster_image'] = "$posterImage";
            $data['link'] = url($destinationPath) . '/' . $uuid .'/'."download";
        }
        
        $data['creator'] = Auth::user()->name;
        
        Poster::create($data);
        Alert::success("Congrats, You're poster has been added!");

        return redirect()->route('poster.index');
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
    public function edit(Poster $poster)
    {   
        return view('poster.edit', [
            'item' => $poster
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poster $poster)
    {
        $request->validate(['poster_image' => 'image']);
        
        // ambil semua inputan
        $data = $request->all();

        // cek upload poster
        if($img = $request->file('poster_image')) 
        {   
            // hapus data lama 
            unlink('poster/'.$poster->poster_image);
            
            // update kalo ada uploadan
            $destinationPath = 'poster/';
            $file_name = date('YmdHis'). '.' . $img->getClientOriginalName();
            $img->move($destinationPath, $file_name);
            $data['poster_image'] = "$file_name";
        } else {
            unset($data['poster_image']);
        }
        
        $data['creator'] = Auth::user()->name;
        
        $poster->update($data);
        Alert::success("Congrats, You're poster has been Updated!");

        return redirect()->route('poster.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poster $poster)
    {
        $img = public_path('poster/').$poster->poster_image;
        // cek jika file ada
        if(file_exists($img))
        {
            @unlink($img);
        }

        $poster->delete();
         return response()->json([
            'success' => 'Poster deleted.'
        ]);
    }

    public function download($uuid)
    {   
        $p = Poster::where('uuid', $uuid)->firstOrFail();

        // dd($f->file);
        // path
        $pathToFile = public_path('poster/' . $p->poster_image);
        return response()->download($pathToFile);
    }
}
