<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PrimaryCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $categories = PrimaryCategory::query()
             ->with([
                 'secondaryCategories' => function ($query) {
                     $query->orderBy('sort_no');
                 }
             ])
             ->orderBy('sort_no')
             ->get();
        return view('home')->with('user', $user)->with('categories', $categories);
    }
}
