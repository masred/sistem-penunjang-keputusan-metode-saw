@extends('layouts.main')

@section('header', 'Analisis')

@section('section', 'Hasil')

@section('current-section', 'Analisis')

@section('analisis', 'active')

@section('content')
    <h3>Data Penilaian</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Alternatif / Kriteria</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->criteria_name }}</th>
                    @endforeach
                </tr>
                @foreach ($alternatives as $alternative)
                    <tr>
                        <th>{{ $alternative->alternative_name }}</th>
                        @foreach ($alternative_values as $altv)
                            @if ($alternative->id == $altv->alternative_id)
                                <td>{{ $altv->real_value }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h3>Rating Kecocokan</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Alternatif / Kriteria</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->criteria_name }}</th>
                    @endforeach
                </tr>
                @foreach ($alternatives as $alternative)
                    <tr>
                        <th>{{ $alternative->alternative_name }}</th>
                        @foreach ($alternative_values as $altv)
                            @if ($alternative->id == $altv->alternative_id)
                                <td>{{ $altv->value }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h3>Normalisasi</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Normalisasi</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->criteria_name }}</th>
                    @endforeach
                </tr>
                @for ($i = 0; $i < $alternatives->count(); $i++)
                    <tr>
                        <th>{{ $alternatives[$i]->alternative_name }}</th>
                        @for ($j = 0; $j < $criterias->count(); $j++)
                            <td>{{ $normalisasi[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <h3>Nilai Preferensi</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Nilai Preferensi</th>
                    @foreach ($criterias as $criteria)
                        <th>{{ $criteria->criteria_name }}</th>
                    @endforeach
                </tr>
                @for ($i = 0; $i < $alternatives->count(); $i++)
                    <tr>
                        <th>{{ $alternatives[$i]->alternative_name }}</th>
                        @for ($j = 0; $j < $criterias->count(); $j++)
                            <td>{{ $preferensi[$j][$i] }}</td>
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <h3>Perangkingan</h3>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm">
            <tbody>
                <tr>
                    <th>Perangkingan</th>
                    <th>Hasil</th>
                    <th>Rangking</th>
                </tr>
                @for ($i = 0; $i < $alternatives->count(); $i++)
                    <tr>
                        <th>{{ $alternatives[$i]->alternative_name }}</th>
                        <td>{{ $sum[$i] }}</td>
                        <td>{{ $rangking[$i] }}</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
