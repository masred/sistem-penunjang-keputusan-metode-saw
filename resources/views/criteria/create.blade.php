@extends('layouts.main')

@section('header', 'Tambah Kriteria')

@section('section', 'Kriteria')

@section('current-section', 'Tambah Kriteria')

@section('kriteria', 'active')

@section('content')
<form action="{{ route('criteria.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Kriteria</label>
        <input type="text" class="form-control" name="criteria_name" required>
    </div>
    <div class="form-group">
        <label>Atribut</label>
        <select class="form-control" name="attribute">
            <option value="Benefit">Benefit</option>
            <option value="Cost">Cost</option>
        </select>
    </div>
    <div class="form-group">
        <label>Bobot</label>
        <input type="text" min="0" class="form-control" name="weight" required>
    </div>
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
</form>
@endsection