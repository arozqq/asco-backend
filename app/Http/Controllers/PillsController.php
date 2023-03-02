<?php

namespace App\Http\Controllers;

use App\Models\Pills;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // $pills = Pills::with('user')->paginate(10);|
        $pills = Pills::paginate(10);
        return view('pills.index', [
            'pills' => $pills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $user = User::all();
        return view('pills.create', [
            // 'user' => $user
        ]);
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


        $data = $request->all();

        // dd($data);
        Pills::create($data);
        Alert::success('success', "You're Pill has been added!");

        return redirect()->route('pills.index');
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
    public function edit(Pills $pill)
    { 
        // $user = User::all();
        return view('pills.edit', [
            // 'user' => $user,
            'pill' => $pill
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pills $pill)
    {
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

        $data = $request->all();

        // dd($data);
        $pill->update($data);
        Alert::success('success', "You're Pill has been updated!");

        return redirect()->route('pills.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pills $pill)
    {
        $pill->delete();
        return response()->json([
            'success' => 'Pill deleted.'
        ]);
    }
}
