<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\instockBook;
use App\Models\it_lab_item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home(Request $rq){        
        $selected = $rq->input('selected');

        $book = instockBook::all();
        $item = it_lab_item::all();

        $limit = 7;

        $data = DB::table('instocks as i')
        ->leftJoin('books as b', 'i.book_id', '=','b.book_id')
        ->select('b.title','i.quantity')
        ->limit($limit)
        ->get();

        $labelsBook = $data->pluck('title')->toArray();
        $qtyBook = $data->pluck('quantity')->toArray();

        $labelsItem = $item->pluck('item_model_name')->toArray();
        $qtyItem = $item->pluck('qty_instocked')->toArray();
        return view('admin.index', compact('labelsBook', 'qtyBook', 'labelsItem','qtyItem'));
     }
     
}
