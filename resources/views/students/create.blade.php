@extends('layout')
@section('content')
<div class="container">
  <h2>Add Student</h2>
  <form method="POST" action="{{ route('students.store') }}">
    @csrf
    <input class="form-control my-2" type="text" name="nom" placeholder="nom">
    <button class="btn btn-success">Save</button>
  </form>
</div>
@endsection