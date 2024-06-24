<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return view('Admin/dashboard');    
        }else{
            return view('Admin.login');
        }
        return view('Admin.login');
    }
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    // make password hash
    // public function updatepassword()
    // {
    //     $r = Admin::find(1);
    //     $r->password=Hash::make('12345678');
    //     $r->save();
    // }
    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

       // $result = Admin::where(['email'=>$email, 'password'=>$password])->get();
        $result = Admin::where(['email'=>$email])->first();
        if($result){
            if(Hash::check($request->post('password'),$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);
                return redirect('admin/dashboard');
            }
            else{
                $request->session()->flash('error', 'Please Enter Correct Password');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('error', 'Invalid Email or Password');
            return redirect()->back();
        }
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
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
