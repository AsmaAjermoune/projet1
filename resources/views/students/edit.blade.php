@extends('layout')
@section('content')
<div class="container">
  <h2>Edit Student</h2>
  <form method="POST" action="{{ route('students.update',$student->id) }}">
    @csrf @method('PUT')
    <input class="form-control my-2" type="text" name="nom" value="{{ $student->nom }}">
    <button class="btn btn-primary">Update</button>
  </form>
</div>
@endsection