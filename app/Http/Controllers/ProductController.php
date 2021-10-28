<?php

namespace App\Http\Controllers;

use App\Http\Requests\productValidation;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $products=product::get();
        }catch(\Exception $e){
            $products =[];
        }
        return view('backend/products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=product::get();
        $categories=category::get();
        return view('backend/products.create',compact('products','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productValidation $request)
    {
        try{
        product::create([
            "name"=>['ar'=>$request->name,'en'=>$request->name_en],
            "cat_id"=>$request->category_id,
            "price"=>$request->price,
            "notes"=>$request->notes
        ]);

        return redirect()->route('products.index')->with('Add',trans('backend/main-sidebar.sectionAdd'));
        }
        catch(\Exception $e){

            return $e->getMessage();
            return redirect()->route('products.index')->withErrors('error',$e->getMessage());
        }


    }

    public function show(product $product)
    {
        //
    }


    public function edit($id)
    {
        $categories = category::get();
        $product = product::findorFail($id);
        return view('backend/products.edit',compact('product','categories'));
    }


    public function update(productValidation $request,$id)
    {
        try{
        product::findorFail($id)->update([
            "name"=>['ar'=>$request->name,'en'=>$request->name_en],
            "cat_id"=>$request->category_id,
            "price"=>$request->price,
            "notes"=>$request->notes
        ]);

        return redirect()->route('products.index')->with('Edit',trans('backend/main-sidebar.editSucc'));

    }
    catch(\Exception $e){

        return redirect()->route('products.index')->withErrors('error',$e->getMessage());

    }

    }


    public function destroy(Request $request)
    {


        try{
            product::findorFail($request->pro_id)->delete();
            return redirect()->route('products.index')->with('Delete',trans('backend/main-sidebar.editSucc'));
        }
        catch(\Exception $e){

            return redirect()->route('products.index')->withErrors('error',$e->getMessage());

        }
    }
}
