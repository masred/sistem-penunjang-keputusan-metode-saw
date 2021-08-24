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
                    <th>Sub Kriteria (Rentang) (Nilai)</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($criterias as $criteria)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $criteria->criteria_name }}</td>
                        <td>{{ $criteria->attribute }}</td>
                        <td>{{ $criteria->weight }}</td>
                        <td>
                            @foreach ($subCriterias as $subCriteria)
                                @if ($criteria->id == $subCriteria->criteria_id)
                                    {{ $subCriteria->sub_criteria_name }} ({{ $subCriteria->range }})
                                    ({{ $subCriteria->value }})
                                    <a href="{{ route('sub-criteria.edit', $subCriteria->id) }}" class="text-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('sub-criteria.destroy', $subCriteria->id) }}" method="POST"
                                        class="d-inline m-0">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn text-danger m-0 p-0"><i
                                                class="fas fa-trash"></i></button>
                                    </form>
                                    <br>
                                @endif
                            @endforeach
                        </td>
                        <td width="290px">
                            <form action="{{ route('criteria.destroy', $criteria->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('criteria.show', $criteria->id) }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Tambah Sub Kriteria</a>
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
