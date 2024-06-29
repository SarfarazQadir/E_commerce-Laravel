@extends('Admin/layout')
@section('title','Size')
@section('size_select','active')
@section('heading')
<div class="alert alert-success" role="alert">
    {{session('message')}}
</div>
<h1>Category</h1>
<br>
<a href="{{url('admin/size/manage_size')}}"><button type="button" class="btn btn-success">Manage size</button></a>
<br><br>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SIZE</th>
                        <th>ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $row)
                        
                    
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->size}}</td>
                        <td>
                            <a href="{{url('admin/size/manage_size')}}/{{$row->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                           @if ($row->status == 1)    
                           <a href="{{url('admin/size/status/0')}}/{{$row->id}}"><button type="button" class="btn btn-primary">Active</button></a>
                           @elseif ($row->status == 0)    
                           <a href="{{url('admin/size/status/1')}}/{{$row->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>  
                           @endif
                            <a href="{{url('admin/size/delete')}}/{{$row->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>
@endsection