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
     <select name="gestionnaire" class="form-control my-2" id="gestionnaire">
        <option value="">-- Sélectionnez un gestionnaire --</option>
        @foreach($gestionnaires as $gestionnaire)
            <option value="{{ $gestionnaire->id }}">{{ $gestionnaire->nom }}</option>
        @endforeach
    </select>

    @error('gestionnaire')
      <div class="text text-danger">{{ $message }}</div>
    @enderror
    
     <label>Modules</label>
    <div class="mb-2">
        @foreach($modules as $module)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="modules[]" value="{{ $module->id }}" id="module{{ $module->id }}">
                <label class="form-check-label" for="module{{ $module->id }}">
                    {{ $module->nom }}
                </label>
            </div>
        @endforeach
    </div>
    @error('modules')
      <div class="text text-danger">{{ $message }}</div>
    @enderror
    
    <button class="btn btn-success">Save</button>
  </form>
</div>
@endsection