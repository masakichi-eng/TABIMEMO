<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemsController extends Controller
{
    public function showItems(Request $request)
     {
         $items = Item::orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
             ->orderBy('id', 'DESC')
             ->paginate(1);
 
         return view('items.items')
             ->with('items', $items)
             ->with('user', Auth::user());
     }
}
