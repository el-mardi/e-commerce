<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;




class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function home(){
        return view('admin.dashboard.admins');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
        
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

        $admin= Admin::create([
            'nom' => $request['firstname'],
            'prenom' =>$request['lastname'] ,
            'gsm' =>$request['phone'] ,
            'email' =>$request['email'] ,
            'password' =>  Hash::make($request['password']),
          ]);

        //   $credentials = $request->only('email', 'password');            
            return redirect('/dashboard')->with('success','Your account has been created successfuly!   you can log in now');

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
        return view('admin.login');
    }

    public function addminLoginValidation(Request $request){

        $validate = $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:6 ',
        ]);

        $admin = Admin::where('email', '=', $request['email'])->first();
        //   $admin= Admin::select('*')
        //   ->where('email', $request['email'])
        //   ->get();
        // dd($admin);
          if ($admin) {
            if (Hash::check( $request['password'], $admin['password'])) {
                $request->session()->put('admin', $admin);
                return redirect('/dashboard')->with('success','You are loged in successfuly!');
        
            }else {
                return back()->withErrors([
                    'password' => 'Your password in invalid! Try again ',
                    ]);
            }         
         } else {
            return back()->withErrors([
                'email' => 'Your email in invalid! Try again ',
                ]);
        }
      
          
        // $credentials = $request->only('email', 'password');
        // if (Auth::attempt($validate)){
        //     $request->session()->regenerate();
        //     return redirect()->intended('dashboard');
        // }
        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);


    }

    public function logout(Request $request){
        // return view('user.logout');
        $request->session()->pull('admin');
        return redirect('/dashboard');

    }


}
