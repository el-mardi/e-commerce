<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function edit($id){
        return view('user.userAccount.edit');
    }


    public function notifications(){
        return view('user.userAccount.notifications');
    }
}
