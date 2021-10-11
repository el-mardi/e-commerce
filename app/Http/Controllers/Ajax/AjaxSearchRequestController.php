<?php

namespace App\Http\Controllers\Ajax;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;


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


    public function searchProduct(Request $request){
        // echo $request['product']; is_numeric
        // echo $request['select']; exit();
        if ($request['select'] == 'category') {
        
            $products= DB::table('produits')
                            ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                            ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                            ->where('categories.nom', '=', $request['product'])
                            ->orWhere('categories.nom', 'like', '%'.$request['product'].'%')
                            ->select(['categories.nom As ctg_nom', 'produits.*', 'remises.*'])
                            ->get();   
        } 

        if ($request['select'] == "default") {

            $products= DB::table('produits')
                                ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                                ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                                ->where('produits.nom', '=', $request['product'])
                                ->orWhere('produits.nom', 'like', '%'.$request['product'].'%')
                                ->select(['categories.nom As ctg_nom', 'produits.*', 'remises.*'])
                                ->get();   
        } 

                
        if( $request['select'] == 'quantite')  {
            try {
                $products= DB::table('produits')
                            ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                            ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                            ->where('quantite', '=', $request['product'])
                            ->orWhere('quantite', '<', $request['product'])
                            ->select(['categories.nom As ctg_nom', 'produits.*', 'remises.*'])
                            ->orderByRaw('quantite DESC')
                            ->get();
            } catch (\Throwable $th) {
            
            }
            
        }
        
        if ($request['select'] == 'markDown'){

            try {
                $products= DB::table('produits')
                            ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                            ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                            ->where('pourcentage', '=', $request['product'])
                            ->orWhere('pourcentage', '<', $request['product'])
                            ->select(['categories.nom As ctg_nom', 'produits.*', 'remises.*'])
                            ->orderByRaw('remises.pourcentage DESC')
                            ->get();

            } catch (\Throwable $th) {

            }
            
        }
    
        if ($request['product'] == null) {
            echo "vide";
        
        }else{ 

        $i=1;
        foreach ($products as $product) {
            $id = $product->id_prd;
            $output ="
                <tr>
                <th><input type='checkbox'></th>
                <th>".$i++."</th>
                <th>".$product->nom."</th>
                <th>".$product->prix."</th>
                <th>".$product->quantite."</th>
                <th>".$product->ctg_nom."</th>
                <th>".$product->pourcentage."%</th>
                <th>".$product->description."</th>
                <td><a class='link-primary' href='/product/$id'><i class='fas fa-eye'></i></a></td>
                <td><a class='link-success' href='/product/$id/edit'><i class='fas fa-edit'></i></a></td>
                <td>
                     <button type='submit' class='btn btn-link' style='color: red'><i class='fas fa-minus-square'></i></button>
                </td>
            </tr>
        ";
        echo $output;
        }
    }
    }

    
    public function searchOrder (Request $request){

        $user_cmds =Order::all();
        foreach ($user_cmds as $user_cmd) {
              $orders[]= DB::table('lignes_commandes')
                            ->where('lignes_commandes.id_cmd', '=', $user_cmd->id_cmd)
                            ->join('commandes', 'lignes_commandes.id_cmd', '=', 'commandes.id_cmd')
                            ->join('users', 'users.id_user', '=', 'commandes.id_user')
                            ->get();
        } 
        
            $users =USer::where('users.nom', 'like', '%'.$request['order'].'%')
                        ->orWhere('users.prenom', 'like', '%'.$request['order'].'%')
                        ->get();
                
            foreach ($orders as $order) {
                $order->total_prd =0;
                $order->num_prd =0;
                $order->num_item =0;
                
                foreach ($order as $item) {
                $order->num_prd = $order->num_prd + $item->quantite;
                $order->total_prd = $order->total_prd +  ($item->prix*$item->quantite);
                $order->num_item++;
                $order->userID=$item->id_user;
                }
                 
            }

        $results=[];
        if ($request['select'] ==="users") {
            foreach ($orders as $order) {
                foreach ($users as $user) {
                    if ($user->id_user == $order->userID) {
                    $results[]= $order;
                    }
                }   
            }
        } //end if users 

        if ($request['select']==="price") {
            foreach ($orders as $order) {
                    if ($order->total_prd <= $request['order']) {
                    $results[]= $order;
                    }
            }
        } //end if price

    

        if ($request['select'] === "n_product") {
            foreach ($orders as $order) {
                if ($order->num_prd <= $request['order']) {
                $results[]= $order;
                }
        }
        } //end if n procust

        if ($request['select'] === "date") {
            // dd($orders[0][0]->date, $request['date_input']);exit();
            foreach ($orders as $order) {
                if ($order[0]->date <= $request['date_input']) {
                    $results[]= $order;
                }
        }
        } //end if date
        if (empty($results)) {
            echo "NoResult";
            
        } elseif(empty($request['order'])){
            echo "vide";
        }
        else{

          $i=1;
        foreach ($results as $order) {
              $output = "
                  <tr>
                  <td><input type='checkbox'></td>
                  <th scope='row'>".$i++."</th>
                  <td>".$order[0]->nom." ".$order[0]->prenom."</td>
                  <td>".$order->num_item."</td>
                  <td>".$order->num_prd."</td>
                  <td>".$order->total_prd."</td>
                  <td>".$order[0]->date."</td>
                  <td><a href='#' class='link-primary'><i class='fas fa-eye'></i></a></td>
                  <td><a href='#' class='link-danger'><i class='fas fa-minus-square'></i></a></td>
                  </tr>
              "; echo $output; 
        }
        }   

    }

}//end claass
