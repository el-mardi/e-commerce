<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MarkDown;
use App\Models\Product;

class MarkDownController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $markDown = MarkDown::all();
        
        return view('admin.dashboard.markdown', ['markDowns' => $markDown, 'i'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.markdown.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $markdown = DB::table('remises')
        ->join('produits', 'produits.id_rem', '=', 'remises.id_rem')
        ->join('categories', 'categories.id_ctg', '=', 'produits.id_ctg')
        ->where('produits.id_rem', '=',  $id)
        ->select(['remises.*', 'produits.*', 'categories.nom as nom_ctg'])
        ->get();
// dd($markdown[0]->id_rem);
        return view('admin.dashboard.markdown.show', ['markdowns' =>$markdown]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $markdown = MarkDown::where('id_rem', '=',  $id)
                        ->firstOrfail();

        return view('admin.dashboard.markdown.edit', ['markdown' =>$markdown]);
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
        $item = MarkDown::where('id_rem', '=', $id)->firstORfail();
        Product::where('id_rem', '=', $id)
                ->update(['id_rem' => 1]);

        MarkDown::where('id_rem', '=', $id)->delete();

        return back()->with('success', 'The mark downd was deleted successfuly');
    }
}
