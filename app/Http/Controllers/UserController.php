<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    use PasswordValidationRules;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return  view('users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' =>  'required|string|email|max:255|unique:users,email',
            'password' => $this->passwordRules(),
            'profile_photo_path' => ['image'],
            'role' => ['required', 'string', 'max:255', 'in:USER,ADMIN'],
            'IMEI' => ['']
           
        ]);
        // ambil semua data inputan
        $data = $request->all();

        if ($image = $request->file('profile_photo_path')) {
            $destinationPath = 'image/user';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['profile_photo_path'] = "$profileImage";
        }
        
        // hash password
        $data['password'] = Hash::make($request->password);

         // input ke database
         User::create($data);
         Alert::success('Congrats', 'Users Added!');

         // kembalikan ke index user
         return redirect()->route('users.index');
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
    public function edit(User $user)
    {
        return view('users.edit', [
            'item' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {   
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($user)],
            'password' => $this->passwordRules(),
            'profile_photo_path' => ['image'],
            'role' => ['required', 'string', 'max:255', 'in:USER,ADMIN'],
            'IMEI' => ['']
        ]);

        $data = $request->all();

        // dd($data);


        if ($image = $request->file('profile_photo_path')) {
            $destinationPath = 'image/user';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['profile_photo_path'] = "$profileImage";
        }else{
            unset($data['profile_photo_path']);
        }
        
        // $data['role'] = $request->role;
        $data['password'] = Hash::make($request->password);

        $user->update($data);
        Alert::success('Congrats', 'Users Updated!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {    
        $file = public_path('/image/user/').$user->profile_photo_path;
        // dd($file);

        // cek jika gambar ada
        if(file_exists($file))
        {
            @unlink($file);
        }
        $user->delete();
         return response()->json([
            'success' => 'User deleted.'
        ]);
    }       
}
