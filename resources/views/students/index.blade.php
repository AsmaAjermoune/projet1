@extends('layout')
@section('content')
<div class="container">
  <a href="{{ route('students.create') }}" class="btn btn-primary my-3">Add Student</a>

  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered" >
    <thead>g
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
    </thead>
  
    <tbody id="studentsTable">

    </tbody>
    
 </table>

<script>
        const tbody = document.getElementById('studentsTable');
        const students =JSON.parse( @json($data));
        console.log(students);
        students.forEach(elem => {
          const tr = document.createElement('tr')
          tr.innerHTML =`
              <td>${elem.id}</td>
              <td>${elem.nom }</td>
              <td><img src="/storage/${elem.file}" height="50px"/>
                <a href="/storage/${elem.file}"  height="50px" class="btn btn-primary" download>download</a>
              </td>
      
              <td>
                <a class="btn btn-warning btn-sm" href="/students/${elem.id}/edit">Edit</a>
                <form action="/students/${elem.id}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
          `
          tbody.appendChild(tr)
        })
    </script>
