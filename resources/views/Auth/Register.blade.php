@extends('layout')
@section('main')
<div class="container">
    <form action="{{route('storedata')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" name="name">

          </div>
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email">

        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>
@endsection
