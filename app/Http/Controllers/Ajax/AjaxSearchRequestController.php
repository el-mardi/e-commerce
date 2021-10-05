<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;


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
       echo "vide";
    } else {
        
        foreach ($users as $user) {
            $id =$user['id_user'];
    $output =
    "<tr>
            <th><input type='checkbox'></th>
            <th> ".$i."</th>
            <th> ".$user['nom']."</th>
            <th> ".$user['prenom']."</th>
            <th> ".$user['email']."</th>
            <th> ".$user['gsm']."</th>
            <td><a id='show_user' class='link-primary' href='/user/$id'><i class='fas fa-eye'></i></a></td>
            <td><a id='edit_user' class='link-success' href='/user/$id/edit'><i class='fas fa-edit'></i></a></td>
            <td>
                <button type='submit' class='btn bt-link'> <i style='color:red' class='fas fa-minus-square'></i></button>
            </td>
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
            $id=$admin['id_adm'];
            $output=
            "
                <tr>
                    <th><input type='checkbox'></th>
                    <th>".$i++."</th>
                    <th>".$admin['nom']."</th>
                    <th>".$admin['prenom']."</th>
                    <th>".$admin['email']."</th>
                    <th>".$admin['gsm']."th>
                    <td><a class='link-primary' href='/admin/$id'><i class='fas fa-eye'></i></a></td>
                    <td><a class='link-success' href='/admin/$id/edit'><i class='fas fa-edit'></i></a></td>
                    <td> <button type='submit'> <i style='color:red' class='fas fa-minus-square'></i></button> </td>
                </tr>
            ";
            echo $output;
        }
    }
    
        
    }

    public function searchCategory(Request $request){
        $categories = Category::where('id_ctg', '=', $request['category'])
                    ->orWhere('nom', 'like', '%'.$request['category'].'%')
                    ->get();
    $i = 1;
    if ($request['category'] == null) {
        echo "vide";
    }else{
        foreach ($categories as $category) {
            $id= $category['id_ctg'];
            $output = "
                <tr>
                    <th><input type='checkbox'></th>
                    <th>".$i++."</th>
                    <th>".$category['nom']."</th>
                    <th>".$category['description']."</th>
                    <td><a class='link-primary' href='/category/$id'><i class='fas fa-eye'></i></a></td>
                    <td><a class='link-success' href='/category/$id/edit'><i class='fas fa-edit'></i></a></td>
                    <td> 
                        <button type='submit'> <i style='color:red' class='fas fa-minus-square'></i></button>
                    </td>
               
                </tr>
            ";
            echo $output;
        }
    }
       

    }


}//end claass
