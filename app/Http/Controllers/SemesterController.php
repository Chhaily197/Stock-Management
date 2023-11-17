<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    public function Semester()
    {
        $data = Semester::all();
        return view('Books.semester', compact('data'));
    }

    public function AddSemester(Request $rq)
    {
        $semester = $rq->semester;
        $data = array();
        for ($i = 0; $i < count($semester); $i++) {
            $data = array('semester_name' => $semester[$i]);
            Semester::insert($data);
        }
        echo 1;
    }

    public function Edit(Request $rq){
        $id = $rq->id;
        $sem = $rq->sem;
        DB::table('semester')->where('semester_id', $id)
        ->update(['semester_name' => $sem]);
        echo 1;
    }

    public function destroy($id)
    {
        DB::table('semester')->where('semester_id', $id)->delete();
        return redirect('/semester')->with(['message' => 'semester deleted success.']);
    }
}
