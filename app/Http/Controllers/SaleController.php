<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleBook;
use App\Models\BookModel;
use App\Models\instockBook;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function index(){
        return view('Books.Sale');
    }
   
    public function outstock(){
        $outstock = DB::table('salebooks')->join('books', 'books.book_id', '=', 'salebooks.book_id')
        ->select('salebooks.*', 'books.*',
            DB::raw("CONCAT(salebooks.created_at) as date"))->paginate(8);
        return view('Books.outstock', compact('outstock'));
    }

    public function addPO(Request $rq){
        $id = $rq->id;
        $foundBook = BookModel::where('book_id', $id)->first();
        if(isset($foundBook)){
            $price = $foundBook->price;
            $title = $foundBook->title;
            echo $price. ";". $title;
        }else{
            echo 0;
        }
    }

    public function purchase(Request $rq){
        $bookId = $rq->id;
        $title = $rq->title;
        $qty = $rq->qty;
        $price = $rq->price;
        $amount = $rq->amount;

        $data = array();
        for($i =0; $i<count($bookId); $i++){
            $data = array(
                'book_id' => $bookId[$i],
                'Title' => $title[$i],
                'quantity' => $qty[$i],
                'price' => $price[$i],
                'amount' => $amount[$i]
            );
            SaleBook::insert($data);

            $instock = instockBook::where('book_id', $bookId[$i])->first();
            $remingQty = $instock->quantity - $qty[$i];
            $instock->quantity = $remingQty;
            $instock->save();
        }
        echo 1;
    }

    public function receipt($id){

    $receipt = DB::table('salebooks as s')
    ->select(
        's.Title',
        's.price',
        's.quantity',
        's.amount',
        'm.major_name',
        'f.faculty_name',
        'y.year_name',
        'sem.semester_name',
        'b.Image'
    )
    ->join('books as b', 's.book_id', '=', 'b.book_id')
    ->join('majors as m', 'm.major_id', '=', 'b.major_id')
    ->join('years as y', 'y.year_id', '=', 'b.year_id')
    ->join('faculties as f', 'f.faculty_id', '=', 'b.faculty_id')
    ->join('semester as sem', 'sem.semester_id', '=', 'b.semester_id')
    ->where('s.sale_id', $id)
    ->first();
        return view('Books.Receipt', compact('receipt'));
    }
}
