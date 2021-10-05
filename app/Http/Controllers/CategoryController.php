<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table('categories')->get();
        return view('admin.dashboard.category',['categories'=>$categories, 'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'nom'=>'required | unique:categories',
            'ctg_description' =>'required | min:20'
        ]);
        
        Category::create([
            'nom'=>$request['nom'],
            'description'=>$request['ctg_description'],
        ]);
        return back()->with('success', 'Category Addes Deleted Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id_ctg', '=', $id)
                                ->firstOrFail();
                                // dd($category);
        return view('admin.dashboard.category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id_ctg', '=', $id)->firstOrfail();
        return view('admin.dashboard.category.edit',['category'=>$category]);
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
        $validation= $request->validate([
            'nom'=>'required | unique:categories',
            'description'=>'required | min:15'
        ]);

        Category::where('id_ctg', '=', $id)
                ->update(['nom' =>$validation['nom'], 'description' =>$validation['description']]);
                return redirect()->route('category.show',$id)->with('success', 'Category was updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category= Category::where('id_ctg', '=', $id)->delete();
        return back()->with('success','The category was deleted successfuly');

    }
}
