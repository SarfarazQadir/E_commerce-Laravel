@extends('Admin/layout')
@section('heading')
<h1>Manage Category</h1><br>
<a href="{{url('admin/category')}}"><button type="button" class="btn btn-success">Back</button></a>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h1>njk</h1>
                <form action="{{route('update_category',['id'])}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category Name</label>
                        <input id="category_name" value="{{$product->category_name}}" name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    @error('category_name')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" value="{{$product->category_slug}}" class="form-control" aria-required="true" aria-invalid="false" required>
                        @error('category_slug')
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
                </form>
            </div>
        </div>
    </div>
@endsection