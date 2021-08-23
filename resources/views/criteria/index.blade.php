@extends('layouts.main')

@section('header', 'Kriteria')

@section('section', 'Master')

@section('current-section', 'Kriteria')

@section('kriteria', 'active')

@section('content')
    <a href="{{ route('criteria.create') }}" class="btn btn-primary mb-3 d-block float-right"><i class="fas fa-plus"></i>
        Tambah</a>
    <div class="table-responsive">
        <table class="table table-striped table-md">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Nama Kriteria</th>
                    <th>Atribut</th>
                    <th>Bobot</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($criterias as $criteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $criteria->criteria_name }}</td>
                        <td>{{ $criteria->attribute }}</td>
                        <td>{{ $criteria->weight }}</td>
                        <td>
                            <form action="{{ route('criteria.destroy', $criteria->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('criteria.edit', $criteria->id) }}"
                                    class="btn btn-success d-inline-block"><i class="fas fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger d-inline-block"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
