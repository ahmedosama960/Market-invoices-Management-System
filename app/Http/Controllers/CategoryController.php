<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function products($id){

        $products = product::where('cat_id',$id)->get();

        return view('backend/categories/products',compact('products'));
    }

    public function index()
    {
        $categories=category::all();
        return view('backend/categories/index',compact('categories'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        try{
            $category= new category();
            $category->name=['ar'=>$request->name ,'en'=>$request->name_en];
            $category->notes=$request->notes;
            $category->save();
            // session()->flash('Add',trans('backend/main-sidebar.sectionAdd'));

            return redirect()->route('categories.index')->with('Add',trans('backend/main-sidebar.sectionAdd'));
        }
        catch(\Exception $e){
            return redirect()->route('categories.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(category $category)
    {
        //
    }


    public function edit($id)
    {


    }

    public function update(Request $request , $id)
    {
        try{
            category::findorfail($request->id)->update([
                "name"=>['ar'=>$request->name,'en'=>$request->name_en],
                "notes"=>$request->notes
            ]);
            return redirect()->route('categories.index')->with('Edit',trans('backend/main-sidebar.editSucc'));
        }

        catch(\Exception $e){

            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }

    }

    public function destroy($id)
    {
        try{
            category::findorfail($id)->delete();
            return redirect()->route('categories.index')->with('Delete',trans('backend/main-sidebar.editSucc'));
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }
}
