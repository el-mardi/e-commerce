<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class AjaxRequestController extends Controller
{
    public function createOrder(Request $request){
        
    if (isset($request['categorySelected'])) {
            
        $ctg= $request['categorySelected'];

        $or_products=DB::table('categories')
                            ->where('categories.id_ctg', '=', $ctg)
                            ->join('produits', 'categories.id_ctg', '=', 'produits.id_ctg')
                            ->select(['produits.*', 'categories.nom as ctg_name', 'categories.description as ctg_discription'])
                            ->get();
        // dd($or_products[0]); exit();
        echo "<option value='' selected>Select product</option>";
        foreach ($or_products as $item){
            echo "<option value='$item->id_prd'>$item->nom</option>";
        }

    }

    if (isset($request['productSelected'])) {

        $prd= $request['productSelected'];

        $product=DB::table('produits')
                ->where('produits.id_prd', '=', $prd)
                ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                ->select(['remises.*','produits.*'])
                ->get();
            if ($product[0]->statut === 1) {
                $status = 'Active';
            }else{ $status = 'Not active';}
        // echo $status; exit();


    echo "
    <tr>
        <th>".$product[0]->prix."</th>
        <th>".$product[0]->pourcentage."%</th>
        <th>".$status."</th>
        <th>".$product[0]->quantite."</th>
    </tr>
    ";
          

        
    }

    if (isset($request['theCategory']) && isset($request['theProduct']) && isset($request['thQuantite'])) {
        
        $prd=$request['theProduct'];
        $crg=$request['theCategory'];
        $qt=$request['thQuantite'];
        $user_id =$request['theUser'];
        // dd($prd, $qt, $crg); exit();

        $product=DB::table('produits')
                ->where('produits.id_prd', '=', $prd)
                ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                ->select(['remises.*','produits.*'])
                ->get();
        // dd($product[0]); exit();
        if ($product[0]->statut === 1) {
            $markDown = (($product[0]->pourcentage * $product[0]->prix)/ 100) ;
            $total= ( $product[0]->prix  - $markDown) * $qt;
            $st=$product[0]->pourcentage;
        }else{
            $total =  $product[0]->prix * $qt;
            $st='-';
        }
        if ($product[0]->quantite >= $qt) {

            $ligne=['id_prd'=> $prd,'nom'=>$product[0]->nom, 'price'=>$product[0]->prix, 'status'=>$st, 'quantite'=>$qt, 'total'=>$total]; 
            session()->push('facture', $ligne);
            echo "
                <tr>
                    <td>". $ligne['nom'] ."</td>
                    <td>". $ligne['price'] ."</td>
                    <td>". $ligne['status'] ."</td>
                    <td>". $ligne['quantite'] ."</td>
                    <td>". $ligne['total'] ."</td>
                    <td><i class='fas fa-minus-square' style='color:red'></i></td>
                </tr>
            ";        
        }else{
            echo "quantite insufficient";
        }
        // dd($total, $st); exit();
       
            // dd(session()->get('facture'));exit();
    }

    if (isset($request['search_prd'])) {
        $prd =$request['search_prd'];

        $products=DB::table('produits')
        ->where('produits.nom', 'like', '%'.$prd.'%')
        ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
        ->select(['remises.*','produits.*'])
        ->get();
        // dd($products);
        foreach ($products as $item) {
            echo "<option value='$item->id_prd'>$item->nom</option>";
        }

    }

    
    }
}
