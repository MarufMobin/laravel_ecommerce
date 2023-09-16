<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display The Home Page 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.home');
    }
    
    /**
     * Display All Products
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        return view('frontend.pages.products.products');
    }
    
    /**
     * Display Single Product are here
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        return view('frontend.pages.products.details');
    }

    /**
     * Display login
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('frontend.pages.login');
    }
    /**
     * Display Registration
     *
     * @return \Illuminate\Http\Response
     */
    public function registration()
    {
        return view('frontend.pages.registration');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
