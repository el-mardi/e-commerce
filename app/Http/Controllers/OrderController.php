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
            dd( session()->get('facture'), $request['id_user'] );
            
                $request->session()->pull('facture.0');
                // session()->forget('facture');
               
            // session()->unset('facture',[]);
            // session()->forget('facture');exit();
            // session()->destroy();
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
                    ->where('commandes.id_cmd', '=',$id)
                    ->select(['categories.*','lignes_commandes.quantite as qauntite_prd' ,'categories.nom as ctg_name','commandes.*', 'lignes_commandes.*', 'produits.*', 'produits.nom as prd_name', 'users.*', 'users.nom as username'])
                    ->get();
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
        //
    }
}
