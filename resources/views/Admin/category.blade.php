@extends('Admin/layout')
@section('heading')
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
<h1>Category</h1>
<br>
<a href="category/manage_category"><button type="button" class="btn btn-success">Manage Category</button></a>
<br><br>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>CATEGORY NAME</th>
                        <th>CATEGORY SLUG</th>
                        <th>ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        
                    
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->category_name}}</td>
                        <td>{{$row->category_slug}}</td>
                        <td><a href="{{url('admin/category/delete')}}/{{$row->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            <a href="{{url('admin/category/manage_category')}}/{{$row->id}}"><button type="button" class="btn btn-success">Edit</button></a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection