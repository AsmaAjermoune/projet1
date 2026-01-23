@extends('layout')
@section('content')
<div class="container">
  <h2>Add Student</h2>
  <form method="POST" action="{{ route('students.store') }}" enctype ="multipart/form-data">
    @csrf
    <input class="form-control my-2" type="text" name="nom" placeholder="nom">
    @error("nom")
      <div class="text text-danger">{{$message}}</div>
    @enderror
    <input class="form-control my-2" type="file" name="file" accept="image/*">
    @error("file")
      <div class="text text-danger">{{$message}}</div>
    @enderror
    <button class="btn btn-success">Save</button>
  </form>
</div>
@endsection