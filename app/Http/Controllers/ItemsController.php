<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\PrimaryCategory;


class ItemsController extends Controller
{
    public function showItems(Request $request)
     {
        $query = Item::query();
 
        // カテゴリで絞り込み
        if ($request->filled('category')) {
            list($categoryType, $categoryID) = explode(':', $request->input('category'));

            if ($categoryType === 'primary') {
                $query->whereHas('secondaryCategory', function ($query) use ($categoryID) {
                    $query->where('primary_category_id', $categoryID);
                });
            } else if ($categoryType === 'secondary') {
                $query->where('secondary_category_id', $categoryID);
            }
        }

          // キーワードで絞り込み
          if ($request->filled('keyword')) {
            $keyword = '%' . $this->escape($request->input('keyword')) . '%';
            $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', $keyword);
                $query->orWhere('description', 'LIKE', $keyword);
            });
        }

         $items = $query->orderByRaw( "FIELD(state, '" . Item::STATE_SELLING . "', '" . Item::STATE_BOUGHT . "')" )
             ->orderBy('id', 'DESC')
             ->paginate(3);

             $categories = PrimaryCategory::query()
             ->with([
                 'secondaryCategories' => function ($query) {
                     $query->orderBy('sort_no');
                 }
             ])
             ->orderBy('sort_no')
             ->get();
 
         return view('items.items')
             ->with('items', $items)
             ->with('user', Auth::user())
             ->with('categories', $categories);
     }

     private function escape(string $value)
     {
         return str_replace(
             ['\\', '%', '_'],
             ['\\\\', '\\%', '\\_'],
             $value
         );
     }

     public function showItemDetail(Item $item)
     {
        $categories = PrimaryCategory::query()
        ->with([
            'secondaryCategories' => function ($query) {
                $query->orderBy('sort_no');
            }
        ])
        ->orderBy('sort_no')
        ->get(); 
        return view('items.item_detail')
             ->with('item', $item)
             ->with('categories', $categories)
             ->with('user', Auth::user());
     }
}
