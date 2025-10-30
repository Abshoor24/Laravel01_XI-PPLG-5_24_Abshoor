@extends('layouts.admin')
@section('title', 'Tambah Siswa')

@section('content')
<div class="container">
  <h1>Tambah Data Siswa</h1>
  <form action="{{ route('admin.students.store') }}" method="POST">
    @csrf
    <div class="mb-3">
      <label>NIS</label>
      <input type="text" name="nis" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="">-- Pilih --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
      </select>
    </div>
    <div class="mb-3">
      <label>NISN</label>
      <input type="text" name="nisn" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
  </form>
</div>
@endsection
