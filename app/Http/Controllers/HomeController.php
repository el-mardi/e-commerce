<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Picture;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function home(){
        return view('welcome');
    }

    public function about(){
        return view('user.about');
    }
    public function shop(){
        return view('user.shop');
    }

    public function categories(Request $request){
        if ($request['c']) {
            $products =DB::table('produits')
                                    ->where('id_ctg','=', $request['c'])
                                    ->join('images', 'produits.id_prd', '=', 'images.id_prd')
                                    ->select('produits.*','images.*')
                                    ->get();

            $category = Category::where('id_ctg','=', $request['c'])->firstOrFail();
            foreach ($products as $product) {
                //  dd($product->url);
                # code...
            }
            return view('user.categories',['categories'=>$category, 'products'=>$products]);
        } else {
            $categories = Category::all();
            return view('user.categories',['categories'=>$categories]);        }
        
    }
}
