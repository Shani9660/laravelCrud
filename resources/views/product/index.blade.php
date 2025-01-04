@extends('layout')

@section('main')
<div class="container mt-3">
    <div class="d-flex align-items-center justify-content-between">
        <strong>Product List</strong>
        <a href="{{route('product.create')}}" class="btn btn-outline-dark">Add new product</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Product Name</th>
            <th scope="col">Category</th>
            <th scope="col">Subcategory</th>
            <th scope="col">Cost</th>
            <th scope="col">Price</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->productname }}</td>
            <td>{{ $row->category_name }}</td>
            <td>{{ $row->subcategory_name }}</td>
            <td>{{ $row->cost }}</td>
            <td>{{ $row->price }}</td>
            <td>
                @if($row->image)
                    <img src="{{ asset('storage/' . $row->image) }}" alt="Product Image" style="width:70px">
                @else
                    <span>No Image</span>
                @endif
            </td>

            <td>
                <a href="{{ route('product.edit', $row->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('product.destroy', $row->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>

          </tr>
          @endforeach
        </tbody>
    </table>
</div>
@endsection
