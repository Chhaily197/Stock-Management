<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function faculty(){
        $data = Faculty::all();
        return view('Books.faculty', compact('data'));
    }

    public function addFty(Request $rq){
        $faculty = $rq->faculty;
        // print_r($faculty);
        $data = array();
        for($i =0; $i<count($faculty); $i++){
            $data = array('faculty_name' => $faculty[$i]);
            Faculty::insert($data);
        }
        echo 1;
    }

    public function editFty(Request $rq){
        $id = $rq->id;
        $faculty = $rq->faculty;
         
        DB::table('faculties')
        ->where('faculty_id', $id)
        ->update(['faculty_name' => $faculty]);
        echo 1;
    }

    public function destroy($id){
        DB::table('faculties')
        ->where('faculty_id', $id)
        ->delete();
        return redirect('/faculty')->with(['message' => 'Faculty deleted success.']);
    }
}
