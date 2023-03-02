<?php

namespace App\Http\Controllers;

use App\Models\FcmToken;
use App\Models\Notification;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notif = Notification::paginate(10);
        return view('notif.index', compact('notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return response()->json([
           'success' => 'Notif deleted.'
       ]);
    }

    public function send(Request $request)
    {
        $request->validate([
                    'title'=>'required',
                    'body'=>'required'
                ]);  
            
        $data = $request->all();  
              
        $tkn = FcmToken::pluck('token_to_fcm');

        $recipients = $tkn; 
        // [

        // ];
        
        // UNTUK KIRIM KE FIREBASE
        fcm()
        ->to($recipients) // $recipients must an array
        ->priority('normal')
        ->timeToLive(0)
        ->data([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ])
        ->notification([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ])
        ->send();

        // UNTUK KIRIM KE DATABASE
        Notification::create($data);
        Alert::success('Congrats', 'Notification has been sent!');

        return redirect()->route('notification.index');
    }


    public function deleteAll()
    {
        Notification::truncate();
        return response()->json([
            'success' => 'Congrats, Notification was empty!'
        ]);
    }
}
