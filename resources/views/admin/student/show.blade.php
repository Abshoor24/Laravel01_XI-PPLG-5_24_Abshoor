@extends('layouts.admin')

@section('title', 'Detail Siswa')

@section('content')
<div class="container-fluid">
  <h1 class="mb-3">Detail Siswa</h1>

  <div class="card">
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <td>{{ $student->id }}</td>
        </tr>
        <tr>
          <th>NIS</th>
          <td>{{ $student->nis }}</td>
        </tr>
        <tr>
          <th>Nama Lengkap</th>
          <td>{{ $student->nama_lengkap }}</td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>{{ $student->jenis_kelamin }}</td>
        </tr>
        <tr>
          <th>NISN</th>
          <td>{{ $student->nisn }}</td>
        </tr>
      </table>

      <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Kembali</a>
      <a href="{{ route('admin.students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
    </div>
  </div>
</div>
@endsection
