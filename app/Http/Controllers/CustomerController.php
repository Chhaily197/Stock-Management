<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    public function index(){
        $customer = Customers::all();
        return view('customers.index', compact('customer'));
    }

    public function AddCustomer(Request $rq){
        $username = $rq->name;
        $idCard = $rq->idcard;
        $gender = $rq->gender;

        Customers::insert(
            [
                'Username' => $username,
                'id_card' => $idCard,
                'gender' => $gender
            ]
        );
        echo 1;
    }

    public function EditCustomer(Request $rq){
        $id = $rq->id;
        $name = $rq->name;
        $idcard = $rq->idcard;
        $gender = $rq->gender;

        Customers::where('customer_id', $id)
        ->update(
            [
                'Username' => $name,
                'id_card' => $idcard,
                'gender' => $gender
            ]);
        echo 1;
    }

    public function Destroy($id){
        $customer = Customers::find($id);
        $customer->delete();
        return redirect()->route('customers')->with(['message' => 'Customer deleted successfully.']);
    }
}
