<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;




class UserController extends Controller
{

    public function home(){
        return view('admin.dashboard.users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        // dd($users);
        return view('admin.dashboard.users', ['users' => $users, 'i'=> 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required | email| unique:users',
            'phone' => 'required | max:10',
            'password' => 'required | min:6 | confirmed ',
        ]);

        $user= User::create([
            'nom' => $request['firstname'],
            'prenom' =>$request['lastname'] ,
            'gsm' =>$request['phone'] ,
            'email' =>$request['email'] ,
            'password' =>  Hash::make($request['password']),
          ]);

        //   $credentials = $request->only('email', 'password');
          $request->session()->put('user', $user);
            
            return redirect('/')->with('new-user','Your account has been created successfuly!   you can log in now');
        


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
    public function destroy($id)
    {
        //
    }

    public function logIn()
    { 
        return view('user.login');
    }

    public function logout(Request $request){
        // return view('user.logout');
        $request->session()->pull('user');
        return redirect('/');

    }
}
