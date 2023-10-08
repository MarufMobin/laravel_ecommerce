<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Slider;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Support\Str;
// After done by Intervention Image Work
use Image;
use File;
 
class PagesController extends Controller
{
    /**
     * Display The Home Page 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->get();
        $newArrivals = Product::orderBy('id', 'desc')->get();
        $featuredItems = Product::orderBy('id', 'desc')->where('featured_item', 1 )->get();
        return view('frontend.pages.home', compact('sliders', 'newArrivals', 'featuredItems'));
    }
    
    /**
     * Display All Products Page redirect
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        $products = Product::orderBy('id', 'desc')->paginate(24);
        return view('frontend.pages.products.products', compact('products'));
    }
    
    /**
     * Display Single Product are here
     *
     * @return \Illuminate\Http\Response
     */
    public function productshow($slug)
    {
        $value = Product::where('slug', $slug )->first();

        if( !is_null( $value ) ){
            return view('frontend.pages.products.details', compact('value'));
        }else{
            return back();
        }
    }
    
    /**
     * Category Wise Product are here
     *
     * @return \Illuminate\Http\Response
     */
    public function productcategory()
    {
        return view('frontend.pages.products.details');
    }
   
    /**
     * Single category Product show
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryshow($slug) 
    {
        $category = Category::where('slug', $slug )->first();

        if( !is_null( $category ) ){
            return view('frontend.pages.products.category', compact('category'));
        }else{
            return redirect()->route('homepage');
        }
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     *  Single Product Details View
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('frontend.pages.products.details');
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
