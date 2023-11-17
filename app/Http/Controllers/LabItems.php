<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\itlab_category;
use App\Models\it_lab_item;
use App\Models\IT_lab_Log;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\ViewItem;

class LabItems extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        echo 'hello';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lab_item = ViewItem::latest()->get();
        $unit = unit::latest()->get();
        $itlab_categories = itlab_category::latest()->get();
        ddd($itlab_categories->image_url);
        // return view('IT_lab.itemview')->with(['lab_item' => $lab_item, 'unit' => $unit, 'itlab_categories' => $itlab_categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_item)
    {
        // ehco $id_item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        echo $id;
        $itlab = it_lab_item::findOrFail($id);



        if ($request->hasFile('profile_image')) {
            try {
                unlink('itlab_img_upload/' . $itlab->profile_image);
            } catch (\Exception $e) {
                echo "error deleting";
            }

            $profile_image = $request->file('profile_image');
            if ($profile_image->isValid()) {
                $newImageName = time() . '-' . $profile_image->getClientOriginalName();
                $profile_image->move(public_path('itlab_img_upload'), $newImageName);
                $itlab->image_url = $newImageName;
            }
        }



        $itlab->item_model_name = $request->ModelName;
        $itlab->brand_name = $request->BrandName;
        $itlab->item_description = $request->dec;
        $itlab->category_id = $request->select_category;
        $itlab->unit_id = $request->unit;
        $itlab->unit_price = $request->unitprice;
        $itlab->save();
        // return redirect('/unit');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function display_now($id)
    {
        $lab_item = ViewItem::Where('item_id', $id)->first();
        $brand = Brand::latest()->get();
        $unit = unit::latest()->get();
        $itlab_categories = itlab_category::latest()->get();
        return view('IT_lab.itemview')->with(['lab_item' => $lab_item, 'unit' => $unit, 'itlab_categories' => $itlab_categories , 'brand' => $brand]);
    }
    public function displaybarcode($id)
    {
        $lab_item = ViewItem::Where('item_code', $id)->first();
        if($lab_item){
            $brand = Brand::latest()->get();
        $unit = unit::latest()->get();
        $itlab_categories = itlab_category::latest()->get();
        return view('IT_lab.itemview')->with(['lab_item' => $lab_item, 'unit' => $unit, 'itlab_categories' => $itlab_categories , 'brand' => $brand]);
        }
       else{
        session()->put("barcode", 'error');
        return back();
       }
    }
    public function item_sum(Request $request){
        
        $user_id = session('user_id');
        $log = new IT_lab_Log;
        $log->user_id = $user_id;
        $log->item_id = $request->itemid;
        $log->in_and_out = 'In';
        $log->qty = $request->unit_upadte;
        $log->save();

        $qty_get_all = it_lab_item::
            where('item_id', $request->itemid)
            ->first();
        $qty_all = $request->unit_upadte + $qty_get_all->qty_all;
        $qty_instock = $request->unit_upadte + $qty_get_all->qty_instocked;

        $result = it_lab_item::where('item_id', $request->itemid)->update([
            'qty_instocked' => $qty_instock,
            'qty_all' => $qty_all
        ]);
        return back();
    }
    public function item_sub(Request $request){
        $user_id = session('user_id');
        $log = new IT_lab_Log;
        $log->user_id = $user_id;
        $log->item_id = $request->itemid;
        $log->in_and_out = 'Out';
        $log->qty = $request->unit_upadte;
        $log->save();

        $qty_get_all = it_lab_item::
            where('item_id', $request->itemid)
            ->first();
        $qty_remove = $request->unit_upadte + $qty_get_all->qty_was_removed;
        $qty_instock =  $qty_get_all->qty_instocked -  $request->unit_upadte;

        $result = it_lab_item::where('item_id', $request->itemid)->update([
            'qty_instocked' => $qty_instock,

            'qty_was_removed' => $qty_remove
        ]);
        return back();
    }
}