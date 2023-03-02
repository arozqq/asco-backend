<?php

namespace App\Http\Controllers;

use App\Models\MitosFakta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MitosFaktaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mf = MitosFakta::paginate(10);
        return view('mitos_fakta.index', [
            'mf' => $mf
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitos_fakta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'mitos' => ['required'],
            'fakta' => ['required'],
        ]);

        $data = $request->all();

        $data['creator'] = Auth::user()->name;
        
        MitosFakta::create($data);
        Alert::success('success', "You're data has been added!");

        return redirect()->route('mitos-fakta.index');
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
    public function edit(MitosFakta $mitos_faktum)
    {
        return view('mitos_fakta.edit', [
            'item' => $mitos_faktum
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MitosFakta $mitos_faktum)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'mitos' => ['required'],
            'fakta' => ['required'],
        ]);

        $data = $request->all();

        $data['creator'] = Auth::user()->name;
        
        $mitos_faktum->update($data);
        Alert::success('success', "You're data has been updated!");

        return redirect()->route('mitos-fakta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MitosFakta $mitos_faktum)
    {
        $mitos_faktum->delete();
        return response()->json([
            'success' => 'Data deleted!' 
        ]);
    }
}
