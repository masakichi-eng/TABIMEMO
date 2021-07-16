<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PrimaryCategory;

class SoldItemsController extends Controller
{
    public function showSoldItems()
     {
         $user = Auth::user();
 
         $items = $user->soldItems()->orderBy('id', 'DESC')->get();

         $categories = PrimaryCategory::query()
         ->with([
             'secondaryCategories' => function ($query) {
                 $query->orderBy('sort_no');
             }
         ])
         ->orderBy('sort_no')
         ->get();
 
         return view('mypage.sold_items')
             ->with('items', $items)
             ->with('categories', $categories)
             ->with('user', Auth::user());
     }
}
