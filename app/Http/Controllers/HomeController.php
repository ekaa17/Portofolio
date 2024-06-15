<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Ensure the user object is not null
        if ($user) {
            if ($user->level === 'User') {
                $products = Product::all();
                return view('themes.tokoonline.home', compact("products"));
            } elseif ($user->level === 'admin') {
                return redirect('/products');
            } else {
                return redirect('/login')->with('error', 'Level tidak ditemukan!');
            }
        }

        // In case the user is not authenticated, redirect to login
        return redirect('/login')->with('error', 'User not authenticated!');
    }
    public function landing()
    {
        $products = Product::all();
        // dd($products);
        return view('themes.tokoonline.home', compact("products"));
    }
}
