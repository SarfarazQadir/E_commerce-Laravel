@extends('Admin/layout')
@section('heading')
<h1>Manage Category</h1><br>
<a href="category"><button type="button" class="btn btn-success">Back</button></a>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
                <form action="{{route('category.insert')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="category" class="control-label mb-1">Category</label>
                        <input id="category" name="category" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                    </div>
                    <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
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