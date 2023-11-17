<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\user_data;
use App\Models\role;

class UserAccount extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = DB::table('user_datas')
            ->join('roles', 'user_datas.role_id', '=', 'roles.role_id')
            ->select('roles.*', 'user_datas.*')
            ->orderByDesc('user_datas.created_at')
            ->paginate(10);

        $role = role::latest()->get();

        return view('admin.user', compact('user', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new user_data;
        $user->username = $request->username;
        $user->gender = $request->gender;
        $user->gmail = $request->gmail;
        $user->password = $request->password;
        $user->role_id = $request->role;
        $user->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $userdata =  DB::table('user_datas')
        ->join('roles', 'user_datas.role_id', '=', 'roles.role_id')
        ->select('user_datas.*', 'roles.*',DB::raw("CONCAT(roles.role_id) as role"))
        ->where('user_id', $id)
        ->first();
        $role = role::get();
        return view('admin/update',compact('userdata'),compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = user_data::find($id);
        $user->username = $request->name;
        $user->gender = $request->gender;
        $user->gmail = $request->gmail;
        $user->password = $request->password;
        $user->role_id = $request->role;
        $user->save();
        return redirect('account');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user_data::destroy($id);
        return back();
    }
    public function edit_display(Request $request)
    {
        // echo $request->id;
        // $user = user_data::
        // where('user_id', $request->id)->first();
        $user = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.role_id')
            ->select('users.*', 'roles.*',DB::raw("CONCAT(roles.role_id) as role"))
            ->where('user_id', $request->id)
            ->first();

        echo $user->username . ";" . $user->gender . ";" . $user->gmail . ";" . $user->password . ";" . $user->role_id . ";" . $user->role_name;

    }
}