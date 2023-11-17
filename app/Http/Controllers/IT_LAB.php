<?php

namespace App\Http\Controllers;
use App\Models\ViewItem;
use App\Models\Brand;
use App\Models\itlab_category;
use App\Models\it_lab_item;
use App\Models\IT_lab_Log;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\delete_tbl;

class IT_LAB extends Controller
{
    //unit
    public function unt_display()
    {
        $unit = unit::latest()->paginate(5);
        // 'links' => $list->links()->orderBy('created_at', 'desc')->get(),
        return view('IT_lab.unit', compact('unit'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function unit_create(Request $request)
    {
        // echo $request->unit;
        $units = new unit;
        $units->unit = $request->unit;
        $units->user_id = request()->session()->get('user_id');
        $units->save();
        return back();
        // return view('index');
    }
    public function update(Request $request)
    {

        unit::where('unit_id', $request->unit_id_upadte)->update([
            'unit' => $request->unit_upadte
        ]);
        return redirect('/unit');

    }
    public function unit_delete(Request $request)
    {
        // get 
        $latestUnit = Unit::where('unit_id', $request->delete_unit)->latest()->first();
        // store 
        $delete_tbl = new delete_tbl;
        $delete_tbl->delete_category = 'Unit';
        $delete_tbl->delete_name = $latestUnit->unit;
        $delete_tbl->user_id = request()->session()->get('user_id');
        $delete_tbl->save();
        // delete
        unit::where('unit_id', '=', $request->delete_unit)->delete();
        return redirect('/unit');

    }
    // =======================


    // =============================
    // category 
    public function category()
    {
        $category = itlab_category::latest()->paginate(10);
        return view('IT_lab.cat', compact('category'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function category_create(Request $request)
    {
        $category = new itlab_category;
        $category->category_name = $request->category;
        $category->user_id = request()->session()->get('user_id');
        $category->save();
        return redirect('/category');
    }
    public function category_update(Request $request)
    {
        echo $request->cate_upadte;
        itlab_category::where('category_id', $request->cate_id_upadte)->update([
            'category_name' => $request->cate_upadte
        ]);
        return redirect('/category');
    }
    public function category_delete(Request $request)
    {
        // get 
        $latestUnit = itlab_category::where('category_id', $request->category_id)->latest()->first();
        // store 
        $delete_tbl = new delete_tbl;
        $delete_tbl->delete_category = 'Category';
        $delete_tbl->delete_name = $latestUnit->category_name;
        $delete_tbl->user_id = request()->session()->get('user_id');
        $delete_tbl->save();

        itlab_category::where('category_id', '=', $request->category_id)->delete();
        return redirect('/category');
    }
    // =====================================================
    // item 
    public function item()
    {


        // $lab_item = DB::table('it_lab_items')
        //     ->join('units', 'it_lab_items.unit_id', '=', 'units.unit_id')
        //     ->join('itlab_categories', 'it_lab_items.category_id', '=', 'itlab_categories.category_id')
        //     ->select('it_lab_items.*', 'units.unit', 'itlab_categories.category_name')
        //     ->orderByDesc('it_lab_items.created_at')
        //     ->paginate(10);
        $lab_item = ViewItem::latest()->paginate(10);
        $unit = unit::latest()->get();
        $itlab_categories = itlab_category::latest()->get();



        // $lab_item = lab_item::latest()->paginate(10);
        return view('IT_lab.item', compact('lab_item', 'unit', 'itlab_categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function item_create(Request $request)
    {
        $category = new itlab_category;
        $category->category_name = $request->category;
        $category->save();
        return redirect('/category');
    }
    public function item_update(Request $request)
    {
        echo $request->cate_upadte;
        itlab_category::where('category_id', $request->cate_id_upadte)->update([
            'category_name' => $request->cate_upadte
        ]);
        return redirect('/category');
    }
    // delete item 
    public function item_delete(Request $request, $id)
    {
        // get 
        $latestUnit = it_lab_item::where('item_id', $id)->latest()->first();
        // store 
        $delete_tbl = new delete_tbl;
        $delete_tbl->delete_category = 'Item';
        $delete_tbl->delete_name = $latestUnit->item_model_name;
        $delete_tbl->user_id = request()->session()->get('user_id');
        $delete_tbl->save();


        it_lab_item::where('item_id', '=', $id)->delete();

        return redirect('/item');
    }
    // add item qty 
    public function add_more_qty(Request $request)
    {

        $user_id = session('user_id');
        $log = new IT_lab_Log;
        $log->user_id = $user_id;
        $log->item_id = $request->userid;
        $log->in_and_out = 'In';
        $log->qty = $request->add_int;
        $log->save();

        $qty_remove = it_lab_item::
            where('item_id', $request->userid)
            ->first();
        $qty = $request->add_int + $qty_remove->qty_all;

        $result = it_lab_item::where('item_id', $request->userid)->update([
            'qty_instocked' => $request->qty,
            'qty_all' => $qty
        ]);
        if ($result) {
            echo 1;
        } else {

        }
    }
    // sub item 
    public function sub_qty(Request $request)
    {
        $user_id = session('user_id');
        $log = new IT_lab_Log;
        $log->user_id = $user_id;
        $log->item_id = $request->userid;
        $log->in_and_out = 'Out';
        $log->qty = $request->sub;
        $log->save();

        $qty_remove = it_lab_item::
            where('item_id', $request->userid)
            ->first();
        $qty = $request->sub + $qty_remove->qty;
        $result = it_lab_item::where('item_id', $request->userid)->update([
            'qty_instocked' => $request->sub_result,
            'qty_was_removed' => $qty
        ]);
        if ($result) {
            echo 1;
        } else {

        }
    }
    public function create_item(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'brand' => 'required',
        ]);
        do {
            //  ================== generate code here =================
            // Available alpha caracters
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // generate a pin based on 2 * 7 digits + a random character
            $pin = mt_rand(10, 99)
                . mt_rand(10, 99)
                . $characters[rand(0, strlen($characters) - 1)];
            // shuffle the result
            $codegen = str_shuffle($pin);
        } while (it_lab_item::where('item_code', $codegen)->exists());

        $refrence_id = $codegen;
        // =========================== create unit =======================
        $unit = $request->unit;
        $unit_store = '';

        if (unit::where('unit', $unit)->exists()) {
            $latestUnit = Unit::where('unit', $unit)->latest()->first();
            $unit_store = $latestUnit->unit_id;
        } else {
            $units = new unit;
            $units->unit = $request->unit;
            $units->user_id = request()->session()->get('user_id');
            $units->save();

            $mostRecentProduct = unit::latest('created_at')->first();
            $unit_store = $mostRecentProduct->unit_id;
        }
        // ================= create brand ================================
        $brand = $request->brand;
        $brand_store = '';

        if (Brand::where('brand_name', $brand)->exists()) {
            $latestbrand = brand::where('brand_name', $brand)->latest()->first();
            $brand_store = $latestbrand->brand_id;
        } else {
            $brands = new Brand;
            $brands->brand_name = $request->brand;
            $brands->user_id = request()->session()->get('user_id');
            $brands->save();

            $mostRecentProduct = Brand::latest('created_at')->first();
            $brand_store = $mostRecentProduct->brand_id;
        }
        // =================================================================
        $item_create = new it_lab_item;
        $item_create->item_code = $refrence_id;
        $item_create->item_model_name = $request->model_name;
        $item_create->brand_name = $brand_store;
        $item_create->item_description = $request->description;
        $item_create->category_id = $request->category_id;
        $item_create->qty_instocked = $request->qty;
        $item_create->unit_id = $unit_store;
        $item_create->qty_was_removed = 0;
        $item_create->qty_all = $request->qty;
        $item_create->unit_price = $request->unit_price;
        $item_create->user_id = request()->session()->get('user_id');

        // img 

        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            if ($profile_image->isValid()) {
                $newImageName = time() . '-' . $profile_image->getClientOriginalName();
                $profile_image->move(public_path('itlab_img_upload/'), $newImageName);
                $item_create->image_url = $newImageName;
            } else {
                // Handle the case when the uploaded file is not valid
                // For example, show an error message or redirect back with an error
            }
        } else {
            $item_create->image_url = '';
        }

        $item_create->save();

        $maxValue = it_lab_item::max('item_id');

        // log 
        $user_id = session('user_id');
        $log = new IT_lab_Log;
        $log->user_id = $user_id;
        $log->item_id = $maxValue;
        $log->in_and_out = 'In';
        $log->qty = $request->qty;
        $log->save();

        // echo $maxValue;
        return redirect('/item');
    }
    //item_create
    public function create_item_page()
    {
        $unit = unit::latest()->get();
        $brands = Brand::latest()->get();
        $itlab_categories = itlab_category::latest()->get();
        return view('IT_lab.itemcreate')->with(['unit' => $unit, 'itlab_categories' => $itlab_categories, 'brand' => $brands]);
    }
   
    // update item 
    public function update_item(Request $request, $id)
    {
        // $news = it_lab_item::findOrFail($id);
        // $item = new it_lab_item
        // echo $id;
    }
    // log 
    public function lab_log()
    {

        $log = DB::table('lab_log')
            ->join('it_lab_items', 'lab_log.item_id', '=', 'it_lab_items.item_id')
            ->join('user_datas', 'lab_log.user_id', '=', 'user_datas.user_id')
            ->select('it_lab_items.*', 'lab_log.*', 'user_datas.*', DB::raw("CONCAT(lab_log.created_at) as date"))
            ->orderByDesc('lab_log.created_at')
            ->paginate(10);

        // $log = IT_lab_Log::latest()->paginate(10);
        return view('IT_lab.log', compact('log'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function logview($id)
    {
        $log = DB::table('lab_log')
            ->join('it_lab_items', 'lab_log.item_id', '=', 'it_lab_items.item_id')
            ->join('user_datas', 'lab_log.user_id', '=', 'user_datas.user_id')
            ->join('itlab_categories', 'it_lab_items.category_id', '=', 'itlab_categories.category_id')
            ->join('units', 'it_lab_items.unit_id', '=', 'units.unit_id')
            ->join('brands', 'it_lab_items.brand_name', '=', 'brands.brand_id')
            ->where('log_id', $id)
            ->select('units.*', 'it_lab_items.*', 'lab_log.*', 'user_datas.*', DB::raw("CONCAT(lab_log.created_at) as date"), 'itlab_categories.*', DB::raw("CONCAT(it_lab_items.unit_price * lab_log.qty ) as total"), DB::raw("CONCAT(brands.brand_name) as the_brand"))
            ->first();

            // $log = ViewItem::Where('item_id', $id)->first();

        // $log = IT_lab_Log::latest()->paginate(10);
        return view('IT_lab.logview')->with(['log' => $log]);

        // return view('IT_lab.logview', compact('log'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    // =============================================
    // brand 

    public function brand()
    {
        $category = Brand::latest()->paginate(10);
        return view('IT_lab.brand', compact('category'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function brand_create(Request $request)
    {
        $category = new Brand;
        $category->brand_name = $request->category;
        $category->user_id = request()->session()->get('user_id');
        $category->save();
        return back();
    }
    public function brand_update(Request $request)
    {
        echo $request->cate_upadte;
        Brand::where('brand_id', $request->cate_id_upadte)->update([
            'brand_name' => $request->cate_upadte
        ]);
        return back();
    }
    public function brand_delete(Request $request)
    {  // get 
        $latestUnit = Brand::where('brand_id', $request->category_id)->latest()->first();
        // store 
        $delete_tbl = new delete_tbl;
        $delete_tbl->delete_category = 'Brand';
        $delete_tbl->delete_name = $latestUnit->brand_name;
        $delete_tbl->user_id = request()->session()->get('user_id');
        $delete_tbl->save();

        Brand::where('brand_id', '=', $request->category_id)->delete();
        return back();
    }

}