@extends('layouts.main')

@section('header', 'Kriteria')

@section('section', 'Master')

@section('current-section', 'Kriteria')

@section('content')
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
                <tr>
                    <td>1</td>
                    <td>Irwansyah Saputra</td>
                    <td>2017-01-09</td>
                    <td>Active</td>
                    <td><a href="#" class="btn btn-secondary">Detail</a></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
