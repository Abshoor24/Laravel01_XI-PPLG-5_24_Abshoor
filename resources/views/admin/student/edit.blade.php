@extends('layouts.admin')
@section('title', 'Edit Data Student')
@section('content')
<div class="container-fluid">
  <h2>Edit Data Student</h2>
  <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group mb-3">
      <label>NIS</label>
      <input type="text" name="nis" value="{{ $student->nis }}" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" value="{{ $student->nama_lengkap }}" class="form-control" required>
    </div>
    <div class="form-group mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>
    <div class="form-group mb-3">
      <label>NISN</label>
      <input type="text" name="nisn" value="{{ $student->nisn }}" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Kembali</a>
  </form>
</div>
@endsection
