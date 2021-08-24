@extends('layouts.main')

@section('header', 'Tambah Alternatif')

@section('section', 'Master')

@section('current-section', 'Tambah Alternatif')

@section('alternatif', 'active')

@section('content')
    <form action="{{ route('alternative.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama Alternative</label>
            <input type="text" class="form-control" name="alternative_name" required>
        </div>
        @foreach ($criterias as $criteria)
            <div class="form-group">
                <label>{{ $criteria->criteria_name }}</label>
                <input type="hidden" name="criteria_id{{ $loop->iteration }}" value="{{ $criteria->id }}">
                <input type="text" class="form-control" name="real_value{{ $loop->iteration }}" required>
            </div>
        @endforeach
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
    </form>
@endsection
