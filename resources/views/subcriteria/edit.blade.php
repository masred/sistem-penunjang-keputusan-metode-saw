@extends('layouts.main')

@section('header', 'Edit Sub Kriteria')

@section('section', 'Kriteria')

@section('current-section', 'Edit Sub Kriteria')

@section('kriteria', 'active')

@section('content')
    <form action="{{ route('sub-criteria.update', $subCriteria->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Sub Kriteria</label>
            <input type="text" class="form-control" name="sub_criteria_name"
                value="{{ old('sub_criteria_name', $subCriteria->sub_criteria_name) }}" required>
        </div>
        <div class="form-group">
            <label>Nilai</label>
            <input type="text" min="0" class="form-control" name="value" value="{{ old('value', $subCriteria->value) }}"
                required>
        </div>
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
    </form>
@endsection
