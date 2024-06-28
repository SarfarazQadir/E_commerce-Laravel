<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']= Coupon::all(); 
        return view('Admin.coupon',$result);
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
    public function manage_coupon(Request $request,$id ='')
    {
        if($id>0){
            $arr=Coupon::where(['id' => $id])->get();
            
            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['id']=$arr['0']->id;
            }else{
                $result['title']='';
                $result['code']='';
                $result['value']='';
                $result['id']='0';
            }
        return view('Admin.manage_coupon',$result);
    
}
    public function manage_coupon_process(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupons,code,'.$request->post('id'),
            'value'=>'required',
        ]);
        if($request->post('id')>0){
            $category = Coupon::find($request->post('id'));
            $msg = "Coupon Updated";
        }else{
        $category = new Coupon();
        $msg = "Coupon inserted";
        }
        $category->title = $request->post('title');
        $category->code = $request->post('code');
        $category->value = $request->post('value');
        // $category->status = 1;
        $category->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/coupon');
    }

    public function delete(Request $request, $id){
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash('message','Coupon Deleted');
        return redirect('admin/coupon');
    }

    public function status(Request $request,$status, $id){
        $model = Coupon::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Coupon Status Updated');
        return redirect('admin/coupon');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $product = Coupon::find($id);
        return view('Admin.edit_coupon', compact("product"));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Coupon::find($id);
        $category->category_name = $request->categoryname;
        $category->category_slug = $request->categoryslug;
        $category->save();
        $request->session()->flash('message','Category Updated');
        return redirect('admin/category');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $category)
    {
        //
    }
}
