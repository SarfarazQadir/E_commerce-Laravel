@extends('Admin/layout')
@section('title','Manage Size')
@section('size_select','active')
@section('heading')
<h1>Manage Size</h1><br>
<a href="{{url('admin/size')}}"><button type="button" class="btn btn-success">Back</button></a>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
                <form action="{{route('size.manage_size_process')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="size" class="control-label mb-1">Size</label>
                        <input id="size" value="{{$size}}" name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('size')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                           Submit
                        </button>
                    </div>
                    <input type="hidden" value="{{$id}}" name="id" id="id">
                </form>
            </div>
        </div>
    </div>
@endsection