@extends('layouts.admin')

@section('title', 'Data Siswa')

@section('content')
<div class="container">
  <h1 class="mb-4">Data Siswa</h1>
  <a href="{{ route('admin.students.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>NIS</th>
        <th>Nama Lengkap</th>
        <th>Jenis Kelamin</th>
        <th>NISN</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->nis }}</td>
        <td>{{ $student->nama_lengkap }}</td>
        <td>{{ $student->jenis_kelamin }}</td>
        <td>{{ $student->nisn }}</td>
        <td>
          <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
