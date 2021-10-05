<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderLine;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;




class UserController extends Controller
{

   

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

        //   auth()->attempt( $request->only('email', 'password'));

        //   $credentials = $request->only('email', 'password');
                    
            return redirect('/login')->with('new-user','Your account has been created successfuly!   you can log in now');
        
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id_user', '=', $id)->firstOrFail();
        return view('admin.dashboard.user.show',['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = USer::where('id_user', '=', $id)->firstOrFail();
        return view('admin.dashboard.user.edit',['user'=> $user]);
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

        $orders = Order::where('id_user', '=', $id)->get();
        
        foreach ($orders as $key => $order) {
            $orderLines  = OrderLine::where('id_cmd', '=', $order['id_cmd'])->get();
             foreach ($orderLines as $value) {
                OrderLine::where('id_lg_cmd', '=', $value['id_lg_cmd'])->delete();
             }
            
             Order::where('id_cmd', '=', $order['id_cmd'])->delete();
        }

        $user = User::where('id_user', '=', $id)->delete();
        return back()->with('success', 'User was Deleted successfuly');
    }

    public function logIn()
    { 
            return view('user.login');
    }

    public function login_Val(Request $request){

        $validate = $request->validate([
                'email' => 'required|email',
                'password'=> 'required'
            ]);

            $user =User::where('email', '=', $request['email'])->first();

            if($user){
            if (Hash::check($request['password'], $user['password'] )) {
                     $request->session()->put('user', $user);
                    return redirect('/')->with('success', 'Your are logged in successfuly ');

                } else {
                    return back()->withErrors([
                        'password'=> 'The password field is invalid.'
                    ]);
            }
        }else{
            return back()->withErrors([
                'email'=> 'The password field is invalid.'
            ]);
        }
            

            }

    public function logout(Request $request){
        // return view('user.logout');
        $request->session()->pull('user');
        return redirect('/');

    }
}
