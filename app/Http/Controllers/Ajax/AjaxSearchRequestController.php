<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;


class AjaxSearchRequestController extends Controller
{
    public function searchUser(Request $request){
        $users=User::where('nom', $request['user'])
                        ->where('prenom', $request['user'])
                        ->orWhere('nom', 'like', '%' .$request['user']. '%')
                        ->orWhere('prenom', 'like', '%' .$request['user']. '%')
                        ->get();  
    $i=1;
    if ( $request['user'] == null) {
        echo $output="vide";
    } else {
        
        foreach ($users as $user) {
    $output =
    "<tr class='table-info'>
            <th><input type='checkbox'></th>
            <th> ".$i."</th>
            <th> ".$user['nom']."</th>
            <td> ".$user['prenom']."</td>
            <td> ".$user['email']."</td>
            <td> ".$user['gsm']."</td>
            <td><a id='show_user' class='link-primary' href=''><i class='fas fa-eye'></i></a></td>
            <td><a id='edit_user' class='link-success' href=''><i class='fas fa-edit'></i></a></td>
            <td><button id='delete_user' type='submit'> <i style='color:red' class='fas fa-minus-square'></i></button></td>
            </tr>";
            $i++;
    echo $output;
}
    }

    }


    public function searchAdmin(Request $request){

        $admins=Admin::where('nom', '=', $request['admin'])
                        ->where('prenom','=', $request['admin'])
                        ->orWhere('nom', 'like', '%'. $request['admin']. '%')
                        ->orWhere('prenom', 'like', '%'. $request['admin']. '%')
                        ->get();
    $i=1;
    if ($request['admin']== null) {
        echo $output='vide';

    } else {
        
        foreach ($admins as $admin) {
            $output=
            "
                <tr>
                    <th><input type='checkbox'></th>
                    <th>".$i++."</th>
                    <td>".$admin['nom']."</td>
                    <td>".$admin['prenom']."</td>
                    <td>".$admin['email']."</td>
                    <td>".$admin['gsm']."td>
                    <td><a class='link-primary' href=''><i class='fas fa-eye'></i></a></td>
                    <td><a class='link-success' href=''><i class='fas fa-edit'></i></a></td>
                    <td> <button type='submit'> <i style='color:red' class='fas fa-minus-square'></i></button> </td>
                </tr>
            ";
            echo $output;
        }
    }
    
        
    }



}//end claass
