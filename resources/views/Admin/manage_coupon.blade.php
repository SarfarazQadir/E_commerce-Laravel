@extends('Admin/layout')
@section('title','Manage Coupon')
@section('heading')
<h1>Manage Coupon</h1><br>
<a href="{{url('admin/coupon')}}"><button type="button" class="btn btn-success">Back</button></a>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
                <form action="{{route('coupon.manage_coupon_process')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="title" class="control-label mb-1">Title</label>
                        <input id="title" value="{{$title}}" name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('title')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="code" class="control-label mb-1">Code</label>
                        <input id="code" name="code" value="{{$code}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('code')
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