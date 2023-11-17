<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookModel;
use App\Models\Majors;
use App\Models\Years;
use App\Models\Faculty;
use App\Models\Semester;
use App\Models\instockBook;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Books extends Controller
{
    public function index()
    {
        $info = DB::table('books_info')->paginate(15);
        return view('Books.book', compact('info'));
    }

    public function create()
    {
        $majors = Majors::all();
        $faculty = Faculty::all();
        $year = Years::all();
        $semester = Semester::all();
        return view('Books.addBook', compact('majors', 'faculty', 'year', 'semester'));
    }

    public function AddBook(Request $rq)
    {
        $title = $rq->input('title');
        $price = $rq->input('price');

        $major = $rq->input('major');
        $addmajor = $rq->input('add_major');

        $faculty = $rq->input('faculty');
        $addfaculty = $rq->input('add_faculty');

        $year = $rq->input('year');
        $addyear = $rq->input('add_year');

        $sem = $rq->input('semester');
        $addsem = $rq->input('add_sem');

        $qty = $rq->input("qty");

        if($major){
            $majorId = $major; 
        }elseif($addmajor){
            $newMajor = Majors::create(['major_name' => $addmajor]);
            $majorId = $newMajor->major_id;
        }else{
            return redirect()->back()->with('error','Please select or create major');
        }

        if($faculty){
            $facultyId = $faculty;
        }elseif($addfaculty){
            $newFaculty = Faculty::create(['faculty_name' => $addfaculty]);
            $facultyId = $newFaculty->faculty_id;
        }else{
            return redirect()->back()->with('error', 'Please select or create faculty.');
        }

        if($year){
            $yearId = $year;
        }elseif($addyear){
            $newYear = Years::create(['year_name' => $addyear]);
            $yearId = $newYear->year_id;
        }else{
            return redirect()->back()->with('error', 'Please select or create year.');
        }

        if($sem){
            $semId = $sem;
        }elseif($addsem){
            $newSem = Semester::create(['semester_name' => $addsem]);
            $semId = $newSem->semester_id;
        }else{
            return redirect()->back()->with('error', 'Please select or create semester.');
        }
        
        $existingBook = BookModel::where(
            ['title' => $title,
             'price' => $price,
             'major_id' => $majorId,
             'faculty_id' => $facultyId,
             'year_id' => $yearId,
             'semester_id' => $semId
            ])->first();

        if($existingBook){
            $instock = instockBook::where('book_id', $existingBook->book_id)->first();
            if($instock){
                $instock->quantity += $qty;
                $instock->save();
            }
        }else{
            $book = new BookModel();
            $book->title = $title;
            $book->price = $price;
            $book->major_id = $majorId;
            $book->faculty_id = $facultyId;
            $book->year_id = $yearId;
            $book->semester_id = $semId;

            if($rq->hasFile('image')){
                $image = $rq->file('image');
                if($image->isValid()){
                    $newImage = time() . '_' .$image->getClientOriginalName();
                    $image->move(public_path('book_img/'), $newImage);
                    $book->Image = $newImage;
                }else{
                    $book->Image = '';
                }
            }
            $book->save();

            $instock = new instockBook();
            $instock->book_id = $book->book_id; // Use $book->id instead of $book->book_id
            $instock->quantity = $qty;
            $instock->save();
        }
        return redirect('/books');
    }

    public function Edit($id){
        try{
        $book = BookModel::findOrFail($id);

        $majors = Majors::all();
        $faculties = Faculty::all();
        $years = Years::all();
        $semesters = Semester::all();

        $instock = instockBook::where('book_id', $id)->first();
        return view('Books.updateBook', compact('book', 'instock','majors','faculties','years','semesters'));

        }catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Book not found.');
        }
    }

    public function update(Request $rq, $id){
        $title = $rq->input('title');
        $price = $rq->input('price');

        $major = $rq->input('major');
        $addmajor = $rq->input('add_major');

        $faculty = $rq->input('faculty');
        $addfaculty = $rq->input('add_faculty');

        $year = $rq->input('year');
        $addyear = $rq->input('add_year');

        $semester = $rq->input('semester');
        $addsem = $rq->input('add_sem');

        $qty = $rq->input('quantity');

        if($major){
            $majorId = $major;
        }elseif($addmajor){
            $newMajor = Majors::create(['major_name' => $addmajor]);
            $majorId = $newMajor->major_id;
        }else{
            return redirect()->back()->with('error','Please select or create major.');
        }

        if($faculty){
            $facultyId = $faculty;
        }elseif($addfaculty){
            $newFaculty = Faculty::create(['faculty_name' => $addfaculty]);
            $facultyId = $newFaculty->faculty_id;
        }else{
            return redirect()->back()->with('error','Please select or create faculty.');
        }

        if($year){
            $yearId = $year;
        }elseif($addyear){
            $newYear = Years::create(['year_name' => $addyear]);
            $yearId = $newYear->year_id;
        }else{
            return redirect()->back()->with('error','Please select or create year.');
        }

        if($semester){
            $semId = $semester;
        }elseif($addsem){
            $newSem = Semester::create(['semester_name' => $addsem]);
            $semId = $newSem->semester_id;
        }else{
            return redirect()->back()->with('error','Please select or create semester.');
        }

        $book = BookModel::findOrFail($id);

        $book->title = $title;
        $book->price = $price;
        $book->major_id = $majorId;
        $book->faculty_id = $facultyId;
        $book->year_id = $yearId;
        $book->semester_id = $semId;

        if($rq->hasFile('image')){
            $image = $rq->file('image');
            if($image->isValid()){
                if($book->Image){
                    Storage::disk('public')->delete('book_img/'. $book->Image);
                }

                $newImage = time() . '_'. $image->getClientOriginalName();
                $image->move(public_path('book_img/'), $newImage);
                $book->Image = $newImage;
            }else{
                $book->Image = '';
            }
        }else{
            $book->Image = " ";
        }
        $book->save();

        $instock = instockBook::where('book_id', $id)->first();
        if(!$instock){
            $instock = new instockBook();
            $instock->book_id = $id;
        }

        $instock->quantity = $qty;
        $instock->save();

        return redirect('/books')->with(['message' => 'Book and Instock data updated']);

    }

    public function destroy($id){
        $book = BookModel::find($id);
        $instock = instockBook::find($id);

            if($book){
                if($instock){
                   $instock->delete();
                }
                $book->delete();
                return redirect('/books')->with(['success' => 'Book deleted successfully.']);
            }else{
                return redirect('/books')->with(['success' => 'Book deleted successfully.']);
            }
        }

    public function Instock()
    {
        $books = DB::table('instocks as i')
            ->leftJoin('books as b', 'i.book_id', '=', 'b.book_id')
            ->select('i.instock_id', 'b.title', 'i.quantity')->get();

        return view('Books.instock', compact('books'));
    }

    public function ViewBook($id){
        $info = DB::table('books_info')->where('book_id', $id)->get();
        return view('Books.Viewbook', compact('info'));
    }
}
