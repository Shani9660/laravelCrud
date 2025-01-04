@extends('layout')
@section('main')
<div class="container">
    <form action="{{route('logindata')}}" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label">Email address</label>
          <input type="email" class="form-control" name="email">

        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" class="form-control" name="password" >
        </div>
        <div class="container">
            <a href="{{route('registerview')}}" class="btn btn-secondary">Register New User</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
</div>
@endsection
