<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_cmds =Order::all();
            foreach ($user_cmds as $user_cmd) {
                $orders[]= DB::table('lignes_commandes')
                                ->where('lignes_commandes.id_cmd', '=', $user_cmd->id_cmd)
                                ->join('commandes', 'lignes_commandes.id_cmd', '=', 'commandes.id_cmd')
                                ->join('users', 'users.id_user', '=', 'commandes.id_user')
                                // ->orderByRaw('users.nom')
                                ->get();
            }

            foreach ($orders as $order) {
                $order->total_prd =0;
                $order->num_prd =0;
                $order->num_item =0;
                foreach ($order as $item) {
                    $order->num_prd = $order->num_prd + $item->quantite;
                    $order->total_prd = $order->total_prd + ($item->prix*$item->quantite);
                    $order->num_item++;
                }
            }
                    
            // dd($orders); exit();
        return view('admin.dashboard.order', ['orders'=>$orders, 'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Category::all();
        $users=User::all();
        
                        // dd($orders, $or_products); exit();
        return view('admin.dashboard.order.create',['orders'=>$orders, 'users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session=session()->get('facture');
        dd(session()->get('facture'));

        // unset($_SESSION['facture']);
        
        foreach ($session as  $key => $value) {
        // session()->destroy($key);
// unset($session[$key]);
        // session()->forget($value['id_prd']);
        // session()->forget($value['nom']);
        // session()->forget($value['price']);
        // session()->forget($value['status']);
        // session()->forget($value['quantite']);
        // session()->forget($value['total']);
            
            
            // $value['id_prd']= null; 
            // $value['nom']= null; 
            // $value['price']= null; 
            // $value['status']= null; 
            // $value['quantite']= null; 
            // $value['total']= null; 
            //  $key = null;
            //  echo $value['id_prd'];
        // dd($key, $value);

        }
        // // session()->put('facture', $session);
        // dd(session()->get('facture'));
       
        // dd(session()->get('facture'));
        // session_destroy()
        // dd($request['id_user'], $session);
        // $request->session()->pull('facture'.$key);
        // session()->forget($key);
        
        

                // $request->session()->pull('facture.0');
                // session()->destroy();
               
            // session()->forget('facture');exit();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders=DB::table('commandes')
                    ->join('lignes_commandes','lignes_commandes.id_cmd','=', 'commandes.id_cmd')
                    ->join('users', 'users.id_user','=','commandes.id_user')
                    ->join('produits', 'produits.id_prd', '=', 'lignes_commandes.id_prd')
                    ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                    ->join('remises', 'remises.id_rem', '=', 'produits.id_rem')
                    ->where('commandes.id_cmd', '=',$id)
                    ->select(['remises.*', 'categories.*','lignes_commandes.quantite as qauntite_prd' ,'categories.nom as ctg_name','commandes.*', 'lignes_commandes.*', 'produits.*', 'produits.nom as prd_name', 'users.*', 'users.nom as username'])
                    ->get();


        $orders->facture =0;                    
        foreach ($orders as $value) {
            if ($value->statut === 1) {
                $value->markDown = $value->pourcentage;
                $value->total = ( $value->prix  - (($value->markDown * $value->prix )/ 100) ) *  $value->qauntite_prd ;
            } else {
                $value->markDown = "-";
                $value->total = $value->prix * $value->qauntite_prd;
            }
            
            $orders->facture = $orders->facture + $value->total; 
        }
        // dd($orders);

        return view('admin.dashboard.order.show',['orders'=>$orders]);
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
        DB::table('lignes_commandes')
        ->where('lignes_commandes.id_cmd', '=', $id)
        ->delete();
        Order::where('id_cmd', '=', $id)->delete();
        return back()->with('success','The Order was deleted successfuly');

    }
}
