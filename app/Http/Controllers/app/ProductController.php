<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    function index(){
        if(!Auth::user()->hasPermission('READ', 'product_list')){
            return response()->json(['errors' => ['error' => ["You are not allowed"]]], 422);
        }
        return view('app.productList');
    }
}
