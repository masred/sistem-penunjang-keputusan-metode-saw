@extends('layouts.main')

@section('header', 'Edit Alternatif')

@section('section', 'Master')

@section('current-section', 'Edit Alternatif')

@section('alternatif', 'active')

@section('content')
    <form action="{{ route('alternative.update', $alternative->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Alternative</label>
            <input type="text" class="form-control" name="alternative_name" value="{{ $alternative->alternative_name }}"
                required>
        </div>
        @foreach ($criterias as $criteria)
            <div class="form-group">
                <label>{{ $criteria->criteria_name }}</label>
                <input type="hidden" name="criteria_id{{ $loop->iteration }}" value="{{ $criteria->id }}">
                @foreach ($altv as $a)
                    @if ($criteria->id == $a->criteria_id)
                        <input type="text" class="form-control" name="real_value{{ $loop->iteration }}"
                            value="{{ $a->real_value }}" required>
                    @endif
                @endforeach
            </div>
        @endforeach
        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
    </form>
@endsection
