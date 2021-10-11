<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\MarkDown;
use App\Models\Picture;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('produits')
                        ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                        ->join('remises', 'produits.id_rem', '=', 'remises.id_rem')
                        ->select('produits.*','categories.nom As categ_nom', 'remises.pourcentage')
                        ->distinct()
                        // ->count()
                        ->get();
                        // dd($products);
      
        
        return view('admin.dashboard.product', ['products' => $products, 'i'=> 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markdowns = MarkDown::all();
        $categories = Category::all();
        return view('admin.dashboard.product.create',['markdowns'=>$markdowns, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('produits')
                    ->join('images', 'produits.id_prd', '=', 'images.id_prd')
                    ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
                    ->join('remises', 'remises.id_rem', '=', 'produits.id_rem')
                    ->select('produits.*','images.*','remises.*','categories.nom as cat_nom','categories.description as cat_description')
                    ->where('produits.id_prd', '=', $id)
                    ->get();
                    // dd($product[0]);exit();
        return view('admin.dashboard.product.show', ['product'=>$product[0]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $markdowns = MarkDown::all();
        $product= Product::where('id_prd', '=', $id)
                            ->join('categories', 'categories.id_ctg','=','produits.id_ctg')
                            ->join('remises', 'remises.id_rem','=','produits.id_rem')
                            ->select(['remises.*', 'produits.*','categories.nom as ctg_nom', 'categories.description as ctg_description'])
                            ->firstOrfail();
        // dd($product, $categories, $markdowns); exit();
        return view('admin.dashboard.product.edit', ['product'=>$product, 'categories'=>$categories, 'markdowns'=>$markdowns]);
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
        Picture::where('id_prd', '=', $id)->delete();
        Product::where('id_prd', '=', $id)->delete();
        return back()->with('success','The product was deleted successfuly');

         
    }
}
