<?php

namespace App\Http\Controllers;

use App\Page;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
          return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = Page::select('product.*')->orderBy('created_at', 'DESC')->get();

        //return $foodorder;

        return view('dashboard.index')->with(['products'=> $products,'no'=>1]);
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
        $this->validate($request, [
          'image_1' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
            ]);
            $add = New Page();
            //$add->seller_id = auth()->user()->id;
            $add->product_category = $request->category;
            $add->product_name = $request->product_name;
            $add->product_description = $request->description;
            $add->product_price_dollar = $request->price_dollar;
            $add->product_price_euro = $request->price_euro;
            $imageName = time().'.'.$request->image_1->getClientOriginalExtension();
            $request->image_1->move(public_path('/images/product'), $imageName);
            $add->product_image = $imageName;
            $add->save();

            return Redirect::back()->with('message','Product Added Successful!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }
    public function addproduct()
    {
        //
        return view('dashboard.addproduct');
    }
    public function orderlist()
    {
        //
        return view('dashboard.orderlist');
    }
    public function dologin(Request $request){

        $this->validate($request,[
          'email' => 'required|email',
          'password' => 'required|alphaNum|min:3'

        ]);
        $email = $request->email;
        $password = $request->password;

        $products = Page::select('product.*')->orderBy('created_at', 'DESC')->get();

        //return $foodorder;



        $dologin = DB::table('users')->where('email','=', $email)->where('password','=',$password)->first();
        //return $dologin->password;
        if($dologin){


          return view('dashboard.index')->with(['products'=> $products,'no'=>1]);
        }else{
          return "fail";
        }
    }
    public function logout()
    {
        //
        return view('welcome');
    }

}
