@extends('layouts.main')

@section('header', 'Tambah Sub Kriteria')

@section('section', 'Kriteria')

@section('current-section', 'Tambah Sub Kriteria')

@section('kriteria', 'active')

@section('content')
    <form action="{{ route('sub-criteria.store') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $id }}" name="criteria_id">
        <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" class="form-control" name="sub_criteria_name" required>
        </div>
        <div class="form-group">
            <label>Rentang</label>
            <input type="text" class="form-control" name="range" required>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="text" min="0" class="form-control" name="value" required>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
    </form>
@endsection
