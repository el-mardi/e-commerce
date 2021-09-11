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
        $categories = Category::all();
        $products = Product::all();

        return view('welcome',['categories'=>$categories, 'products'=>$products]);
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
            
            return view('user.categories',['category'=>$category, 'products'=>$products]);
        } else {
            $categories = Category::all();
            return view('user.categories',['categories'=>$categories]);        }
        
    }
}
