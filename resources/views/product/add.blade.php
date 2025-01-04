@extends('layout')

@section('main')
@php
use Illuminate\Support\Facades\DB;
$category_id = DB::table('categories')->where('parent_id',null)->get();
$sub_category_id = DB::table('categories')->whereNotNull('parent_id')->get();
@endphp
<div class="container">
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Prodectname</label>
            <input type="text" class="form-control" name="productname" placeholder="Enter the product name">
          </div>

          <div class="mb-3">
            <label class="form-label">Category_id</label>
            <select name="category" class="form-control" style="width: 100%;">
                <option value="">Select Category</option>
                @foreach($category_id as $catid)
                    <option value="{{ $catid->id }}">{{ $catid->name }}</option>
                @endforeach
            </select>
        </div>
          <div class="mb-3">
            <label class="form-label">Sub_Category</label>
              <select name="subcategory"  class="form-control">
                <option value="">Select Sub Category</option>
                @foreach($sub_category_id as $subcatid)
                    <option value="{{ $subcatid->id }}">{{ $subcatid->name }}</option>
                @endforeach
              </select>
            </div>
        <div class="mb-3">
          <label class="form-label">Cost</label>
          <input type="number" class="form-control" name="cost" placeholder="Enter the cost" >
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" class="form-control" name="price" placeholder="Enter the price">
          </div>
          <div class="mb-3">
            <label class="form-label">Prodect_Image</label>
            <input type="file" class="form-control" name="image" placeholder="Select product image">
          </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@endsection
