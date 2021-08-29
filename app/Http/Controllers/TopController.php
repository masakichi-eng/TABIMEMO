<?php

namespace App\Http\Controllers;

use App\Article;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\PrimaryCategory;

class TopController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(5)->sortByDesc('created_at')
            ->load(['user', 'likes', 'tags']);

        $query = Item::query();
        // PostgreSQLの場合
        $items = $query->orderByRaw("(CASE state WHEN '1' THEN 'selling'
                                                      WHEN '2' THEN 'bought' END)")
            ->orderBy('id', 'DESC')
            ->paginate(3);

        $categories = PrimaryCategory::query()
            ->get();

        return view('tops.index')
            ->with('articles', $articles)
            ->with('items', $items)
            ->with('user', Auth::user())
            ->with('categories', $categories);
    }
}
