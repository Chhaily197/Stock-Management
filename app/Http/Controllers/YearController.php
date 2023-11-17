<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Years;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    public function year(){
        $data = Years::all();
        return view('Books.years', compact('data'));
    }

    //Add
    public function add(Request $rq){
        $year = $rq->year;
        // print_r($year);
        $data = array();
        for ($i = 0; $i<count($year); $i++){
            $data = array('year_name' => $year[$i]);
            Years::insert($data);
        }
        echo 1;
    }

    // Edit
    public function editYear(Request $rq){
        $id = $rq->id;
        $year = $rq->year;

        DB::table('years')->where('year_id', $id)->update(['year_name' => $year]);
        echo 1;
    }

    public function destroy($id){
        DB::table('years')->where('year_id', $id)->delete();
        return redirect('/years')->with(['message' => 'Year deleted success.']);
    }
}

