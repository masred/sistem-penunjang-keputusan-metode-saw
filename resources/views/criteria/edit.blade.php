@extends('layouts.main')

@section('header', 'Edit Kriteria')

@section('section', 'Kriteria')

@section('current-section', 'Edit Kriteria')

@section('kriteria', 'active')

@section('content')
<form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama Kriteria</label>
        <input type="text" class="form-control" name="criteria_name" value="{{ old('criteria_name', $criteria->criteria_name) }}" required>
    </div>
    <div class="form-group">
        <label>Atribut</label>
        <select class="form-control" name="attribute">
            <option value="Benefit" {{ old('attribute', $criteria->attribute) == 'Benefit' ? 'selected' : '' }}>
                Benefit</option>
            <option value="Cost" {{ old('attribute', $criteria->attribute) == 'Cost' ? 'selected' : '' }}>Cost
            </option>
        </select>
    </div>
    <div class="form-group">
        <label>Bobot</label>
        <input type="text" min="0" class="form-control" name="weight" value="{{ old('weight', $criteria->weight) }}" required>
    </div>
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
</form>
@endsection