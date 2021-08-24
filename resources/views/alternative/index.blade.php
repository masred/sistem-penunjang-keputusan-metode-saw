@extends('layouts.main')

@section('header', 'Alternatif')

@section('section', 'Master')

@section('current-section', 'Alternatif')

@section('alternatif', 'active')

@section('content')
    <a href="{{ route('alternative.create') }}" class="btn btn-primary mb-3 d-block float-right">
        <i class="fas fa-plus"></i> Tambah
    </a>
    <div class="table-responsive">
        <table class="table table-striped table-md">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Nama Alternatif</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->criteria_name }}</th>
                    @endforeach
                    <th width="120px">Aksi</th>
                </tr>
                @foreach ($alternatives as $alternative)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $alternative->alternative_name }}</td>
                        @foreach ($alternative_values as $altv)
                            @if ($alternative->id == $altv->alternative_id)
                                <td>{{ $altv->real_value }}</td>
                            @endif
                        @endforeach
                        <td>
                            <form action="{{ route('alternative.destroy', $alternative->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('alternative.edit', $alternative->id) }}"
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
