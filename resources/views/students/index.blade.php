@extends('layout')
@section('content')
<div class="container">
  <a href="{{ route('students.create') }}" class="btn btn-primary my-3">Add Student</a>

  @if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <table class="table table-bordered" id ="example">
    <tr>
      <th>ID</th><th>Name</th><th>Actions</th>
    </tr>
    @foreach($students as $s)
    <tr>
      <td>{{ $s->id }}</td>
      <td>{{ $s->nom }}</td>
      <td>
        <a class="btn btn-warning" href="{{ route('students.edit',$s->id) }}">Edit</a>
        <form action="{{ route('students.destroy',$s->id) }}" method="POST" style="display:inline" class="delete-form">
           @csrf @method('DELETE')
           <button class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
<script>
//   $(document).ready(function() {
//   $('#example').DataTable({
//   "columns":[
//     {"data":"id"},
//     {"data":"nom"},
//   ]
// });
// });

// $(document).ready(function() {
//   $('#example').DataTable();
// });
$('#example').DataTable({
    columnDefs: [
        { orderable: false, targets: 2 } // colonne 2 = Actions
    ]
});

$('.delete-form').on('submit', function(e) {
    e.preventDefault();
    const form = this;

    Swal.fire({
        title: "Supprimer ?",
        text: "Voulez-vous vraiment supprimer cet étudiant ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Annuler"
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
});
</script>
@endsection