<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']= Color::all(); 
        return view('Admin.Color',$result);
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
    public function manage_Color(Request $request,$id ='')
    {
        if($id>0){
            $arr=Color::where(['id' => $id])->get();
            
            $result['color']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
            }else{
                $result['color']='';
                $result['status']='';
                $result['id']='0';
            }
        return view('Admin.manage_color',$result);
    
}
    public function manage_color_process(Request $request)
    {
        $request->validate([
            'color'=>'required|unique:colors,color,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $size = Color::find($request->post('id'));
            $msg = "Color Updated";
        }else{
        $size = new Color();
        $msg = "Color inserted";
        }
        $size->size = $request->post('color');
        $size->status = 1;
        // $category->status = 1;
        $size->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');
    }

    public function delete(Request $request, $id){
        $model = Size::find($id);
        $model->delete();
        $request->session()->flash('message','Size Deleted');
        return redirect('admin/size');
    }
    public function status(Request $request,$status, $id){
        $model = Size::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Size Status Updated');
        return redirect('admin/size');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $size = Size::find($id);
        return view('Admin.edit_size', compact("size"));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $size = Size::find($id);
        $size->size = $request->size;
        $size->category_slug = $request->categoryslug;
        $size->save();
        $request->session()->flash('message','Size Updated');
        return redirect('admin/size');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        //
    }
}
