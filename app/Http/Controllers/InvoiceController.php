<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\invoice;
use App\Models\product;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = invoice::all();
        return view('backend.invoices.index',compact('invoices'));
    }


    public function create()
    {
        $categories = category::all();
        return view('backend.invoices.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        invoice::create([
            "invoice_number"=> $request->invoice_number,
            "invoice_date"=>  $request->invoice_date,
            "categorie_id"=> $request->category_id,
            "product_id"=> $request->product_id,
            "price"=> $request->price,
            "discount"=> $request->discount,
            "tax_rate"=>  $request->tax_rate,
            "tax_value"=> $request->tax_value,
            "total"=> $request->total,
            "notes"=>  $request->notes,
            "status"=>1
        ]);

        return redirect()->route('invoices.index')->with('Edit',trans('backend/main-sidebar.editSucc'));
        }
        catch(\Exception $e){
            return redirect()->back()->withErrors(['error',$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = invoice::findorFail($id);

        $categories =category::get();

        return view('backend/invoices.edit',compact('invoice','categories'));

    }

    public function update(Request $request, $id)
    {
        $invoice=invoice::findorFail($id);
        try{

            $invoice->update([
                "invoice_number"=> $request->invoice_number,
                "invoice_date"=>  $request->invoice_date,
                "categorie_id"=> $request->categorie_id,
                "product_id"=> $request->product_id,
                "price"=> $request->price,
                "discount"=> $request->discount,
                "tax_rate"=>  $request->tax_rate,
                "tax_value"=> $request->tax_value,
                "total"=> $request->total,
                "notes"=>  $request->notes,
                "status"=>1
            ]);
            return redirect()->route('invoices.index')->with('Edit',trans('backend/main-sidebar.sectionEdit'));
            }
            catch(\Exception $e){
                return redirect()->back()->withErrors(['error',$e->getMessage()]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        invoice::destroy($request->invoice_id);
        return redirect()->route('invoices.index')->with('Delete',trans('backend/invoices.Delete Invoice'));
    }


public function getProducts($id){

        $products = product::where('cat_id',$id)->select('id','name','price')->get();
        return response()->json($products);
}

public function getProductPrice($id){

    $price = product::where('id',$id)->select('price')->get();
    return response()->json($price);
}


}
