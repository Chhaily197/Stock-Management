<?php

use App\Http\Controllers\IT_LAB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin_log;
use App\Http\Controllers\LabItems;
use App\Http\Controllers\UserAccount;
use App\Http\Controllers\Books;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\YearController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;

// =============================================

Route::get('/homes', [HomeController::class, 'Home']);
Route::get('/', [admin_log::class,'loginform']);

Route::get('/stock', function () {
    return view('biustock.index');
});
Route::post('/login_ch', [admin_log::class,'login_ch']);
Route::get('/logout', [admin_log::class,'logout']);

//Customers
Route::get('/customer', [CustomerController::class, 'index'])->name('customers');
Route::post('/addCustomer', [CustomerController::class, 'AddCustomer']);
Route::post('/EditCustomer', [CustomerController::class, 'EditCustomer']);
Route::delete('/customer/:{id}', [CustomerController::class, 'Destroy']);

// Books
Route::get('/books', [Books::class, 'index']);
Route::get('/create', [Books::class, 'create']);
Route::post('/addbook', [Books::class, 'AddBook'])->name('book.create');
Route::get('/edit/:{id}/edit', [Books::class, 'Edit'])->name('book.edit');
Route::put('/edit/:{id}', [Books::class, 'update'])->name('book.update');
Route::delete('/delete/:{id}', [Books::class, 'destroy'])->name('book.delete');
Route::get('/view/:{id}', [Books::class, 'ViewBook'])->name('book.view');
//End Books---------------------

//Year

Route::get('/years', [YearController::class, 'year']);
Route::post('/addyear', [YearController::class, 'add']);
Route::post('/edityear', [YearController::class, 'editYear']);
Route::delete('/years/:{id}', [YearController::class, 'destroy']);

//End Year----------------

//Faculty

Route::get('/faculty', [FacultyController::class, 'faculty']);
Route::post('/addfty', [FacultyController::class, 'addFty']);
Route::post('/editfty', [FacultyController::class, 'editFty']);
Route::delete('/faculty/:{id}', [FacultyController::class, 'destroy']);

//End faculty----------------

//Major

Route::get('/majors', [MajorController::class, 'Major']);
Route::post('/addmajor', [MajorController::class, 'addMajor']);
Route::post('/editmajor', [MajorController::class, 'EditMajor']);
Route::delete('/major/:{id}', [MajorController::class, 'destroy']);

//End Major---------------------

//Semester
Route::get('/semester', [SemesterController::class, 'Semester']);
Route::post('/addsemester', [SemesterController::class, 'AddSemester']);
Route::post('/edit', [SemesterController::class, 'Edit']);
Route::delete('/destroy/:{id}', [SemesterController::class, 'destroy'])->name('semester.destroy');
//end semester

//instock
Route::get('/instock', [Books::class, 'Instock']);

//Sale Book
Route::get('/sale', [SaleController::class , 'index'])->name('book.sale');
Route::post('/addmulti', [SaleController::class, 'addPO']);
Route::post('/addpo', [SaleController::class, 'purchase']);
Route::get('/outstock',[SaleController::class, 'outstock']);
Route::get('/Receipt/:{id}', [SaleController::class, 'Receipt']);

// itlab
// --------------------------------------------------------------
Route::get('/category', [IT_LAB::class,'category']);
Route::get('/unit', [IT_LAB::class,'unt_display']);
Route::get('/item', [IT_LAB::class,'item']);
Route::get('/brand', [IT_LAB::class,'brand']);


// unit
Route::post('unit_create', [IT_LAB::class,'unit_create']);
Route::post('update', [IT_LAB::class,'update']);
Route::post('unit_delete', [IT_LAB::class,'unit_delete']);

// category
Route::post('category_create', [IT_LAB::class,'category_create']);
Route::post('category_update', [IT_LAB::class,'category_update']);
Route::post('category_delete', [IT_LAB::class,'category_delete']);

// item
Route::post('create_item', [IT_LAB::class,'create_item']);
Route::post('item_update', [IT_LAB::class,'item_update']);
Route::get('item_delete/{id}', [IT_LAB::class,'item_delete']);
Route::get('item_view/{id}', [IT_LAB::class,'item_view']);
Route::post('add_more_qty', [IT_LAB::class,'add_more_qty']);
Route::post('sub_qty', [IT_LAB::class,'sub_qty']);
Route::get('create_item_page', [IT_LAB::class,'create_item_page']);
Route::resource('display', LabItems::class);
Route::get('display_now/{id}', [LabItems::class,'display_now']);
Route::get('displaybarcode/{id}', [LabItems::class,'displaybarcode']);
Route::post('item_sum', [LabItems::class,'item_sum']);
Route::post('item_sub', [LabItems::class,'item_sub']);


//log
Route::get('lab_log', [IT_LAB::class,'lab_log']);
Route::get('lab_logview/{id}', [IT_LAB::class,'logview']);

// -------------------- admin -----------------
// user account 
Route::resource('account', UserAccount::class);
Route::post('aed', [UserAccount::class,'edit_display']);
// ------------------------------------------------

// --------------- brand ------------------
// category
Route::post('brand_create', [IT_LAB::class,'brand_create']);
Route::post('brand_update', [IT_LAB::class,'brand_update']);
Route::post('brand_delete', [IT_LAB::class,'brand_delete']);
// ===================== crop =========================
