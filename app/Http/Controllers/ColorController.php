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
            $color = Color::find($request->post('id'));
            $msg = "Color Updated";
        }else{
        $color = new Color();
        $msg = "Color inserted";
        }
        $color->color = $request->post('color');
        $color->status = 1;
        // $category->status = 1;
        $color->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');
    }

    public function delete(Request $request, $id){
        $model = Color::find($id);
        $model->delete();
        $request->session()->flash('message','Color Deleted');
        return redirect('admin/color');
    }
    public function status(Request $request,$status, $id){
        $model = Color::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Color Status Updated');
        return redirect('admin/color');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $color = Color::find($id);
        return view('Admin.edit_color', compact("color"));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $color = Color::find($id);
        $color->color = $request->color;
        $color->size = $request->size;
        $color->save();
        $request->session()->flash('message','Color Updated');
        return redirect('admin/color');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        //
    }
}
