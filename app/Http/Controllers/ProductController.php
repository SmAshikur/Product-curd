<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro =Product::with('category')->latest()->paginate(8);

        return view('Product.index',compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats= Category::get();
        return view('Product.add',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'pname'=>'required',
            'cat_id'=>'required',
            'price'=>'required|numeric',
            'image'=>'required',
        ]);
        $pro=new Product();
        $pro->pname=$request->pname;
        $pro->cat_id=$request->cat_id;
        $pro->price=$request->price;
        $pro->description=$request->description;
        $pro->slug=Str::slug($request->pname);
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extention= $file->getClientOriginalExtension();
            $fileName= time().'.'. $extention;
            $file->move('images/pro/',$fileName);
            $pro->image=$fileName;
        }

        $pro->save();
        Session::flash('msg','product create successfully');
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('Product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cats= Category::get();
        return view('Product.edit',compact('cats','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         //return $request->all();
         $this->validate($request,[
            'pname'=>'required',
            'cat_id'=>'required'
        ]);
        $product->pname=$request->pname;
        $product->cat_id=$request->cat_id;
        $product->slug=Str::slug($request->pname);
        if($request->hasFile('image')){
            $des='images/pro/'.$product->image;
                if(File::exists($des)){
                File::delete($des);
            }
            $file=$request->file('image');
            $extention= $file->getClientOriginalExtension();
            $fileName= time().'.'. $extention;
            $file->move('images/pro/',$fileName);
            $product->image=$fileName;
        }
        $product->save();

        Session::flash('msg','product update successfully');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $des='images/pro/'.$product->image;
                if(File::exists($des)){
                File::delete($des);
            }
        $product->delete();
        Session::flash('msg','product Delete successfully');
        return redirect('/product');
    }
}
