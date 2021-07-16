<?php

namespace App\Http\Controllers\MyPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PrimaryCategory;


class BoughtItemsController extends Controller
{
    public function showBoughtItems()
    {
        $user = Auth::user();

        $items = $user->boughtItems()->orderBy('id', 'DESC')->get();

        $categories = PrimaryCategory::query()
        ->with([
            'secondaryCategories' => function ($query) {
                $query->orderBy('sort_no');
            }
        ])
        ->orderBy('sort_no')
        ->get();

        return view('mypage.bought_items')
            ->with('items', $items)
            ->with('user', $user)
            ->with('categories', $categories);
    }
}
