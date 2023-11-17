<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Majors;
use Illuminate\Support\Facades\DB;

class MajorController extends Controller
{
    public function Major(){
        $data = Majors::all();
        return view('Books.majors', compact('data'));
    }

    public function addMajor(Request $rq){
        $major = $rq->major;
        // print_r($major);
        $data = array();
        for ($i=0; $i<count($major); $i++){
            $data = array('major_name' => $major[$i]);
            Majors::insert($data);
        }
        echo 1;
    }

    public function EditMajor(Request $rq){
        DB::table('majors')
        ->where('major_id', $rq->id)
        ->update(['major_name' => $rq->major]);
        echo 1;
        // echo "Hello chhaily";
    }
    public function destroy($id){
        DB::table('majors')
        ->where('major_id', $id)
        ->delete();
        return redirect('/majors')->with(['message' => 'Major deleted success.']);
    }
}
