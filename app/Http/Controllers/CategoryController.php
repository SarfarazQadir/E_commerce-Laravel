<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result['data']= Category::all(); 
        return view('Admin.category',$result);
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
    public function manage_category(Request $request,$id ='')
    {
        if($id>0){
            $arr=Category::where(['id' => $id])->get();
            
            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['id']=$arr['0']->id;
            }else{
                $result['category_name']='';
                $result['category_slug']='';
                $result['id']='0';
            }
        return view('Admin.manage_category',$result);
    
}
    public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id')
        ]);
        if($request->post('id')>0){
            $category = Category::find($request->post('id'));
            $msg = "Category Updated";
        }else{
        $category = new Category();
        $msg = "Category inserted";
        }
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->status = 1;
        // $category->status = 1;
        $category->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

    public function delete(Request $request, $id){
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }
    public function status(Request $request,$status, $id){
        $model = Category::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Category Status Updated');
        return redirect('admin/category');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      
        $product = Category::find($id);
        return view('Admin.edit_category', compact("product"));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->category_name = $request->categoryname;
        $category->category_slug = $request->categoryslug;
        $category->save();
        $request->session()->flash('message','Category Updated');
        return redirect('admin/category');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
