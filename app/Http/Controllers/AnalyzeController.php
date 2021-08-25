<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\Alternatives;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\SubCriteria;

class AnalyzeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::all();
        $subCriteria = SubCriteria::all();
        $alternative_values = DB::table('alternative_values')
            ->join('alternatives', 'alternative_values.alternative_id', '=', 'alternatives.id')
            ->join('criterias', 'alternative_values.criteria_id', '=', 'criterias.id')
            ->join('sub_criterias', 'alternative_values.sub_criteria_id', '=', 'sub_criterias.id')
            ->get();
        $alternatives = Alternatives::all();

        $data_value = [];
        foreach ($criterias as $c) {
            $a = DB::table('alternative_values')
                ->join('alternatives', 'alternative_values.alternative_id', '=', 'alternatives.id')
                ->join('criterias', 'alternative_values.criteria_id', '=', 'criterias.id')
                ->join('sub_criterias', 'alternative_values.sub_criteria_id', '=', 'sub_criterias.id')
                ->where('criterias.id', $c->id)
                ->get('value')->toArray();
            array_push($data_value, $a);
        }

        $benefit = [];
        foreach ($data_value as $dv) {
            array_push($benefit, max($dv));
        }

        $cost = [];
        foreach ($data_value as $dv) {
            array_push($cost, min($dv));
        }

        $alt_attribute = [];
        foreach ($criterias as $c) {
            $a = DB::table('alternative_values')
                ->join('alternatives', 'alternative_values.alternative_id', '=', 'alternatives.id')
                ->join('criterias', 'alternative_values.criteria_id', '=', 'criterias.id')
                ->join('sub_criterias', 'alternative_values.sub_criteria_id', '=', 'sub_criterias.id')
                ->where('criterias.id', $c->id)
                ->get('attribute')->toArray();
            array_push($alt_attribute, $a);
        }

        $normalisasi = [];
        for ($i = 0; $i < $criterias->count(); $i++) {
            for ($j = 0; $j < $alternatives->count(); $j++) {
                if ($alt_attribute[$i][$j]->attribute == 'Benefit') {
                    $normalisasi[$i][$j] = $data_value[$i][$j]->value / $benefit[$i]->value;
                } elseif ($alt_attribute[$i][$j]->attribute == 'Cost') {
                    $normalisasi[$i][$j] = $cost[$i]->value / $data_value[$i][$j]->value;
                }
            }
        }

        $preferensi = [];
        $data_weight = Criteria::get('weight')->toArray();
        for ($i = 0; $i < $criterias->count(); $i++) {
            for ($j = 0; $j < $alternatives->count(); $j++) {
                $preferensi[$i][$j] = $normalisasi[$i][$j] * $data_weight[$i]['weight'];
            }
        }

        $preferensi_sum = [];
        for ($i = 0; $i < $criterias->count(); $i++) {
            for ($j = 0; $j < $alternatives->count(); $j++) {
                $preferensi_sum[$j][$i] = $normalisasi[$i][$j] * $data_weight[$i]['weight'];
            }
        }

        $sum = [];
        for ($i = 0; $i < $alternatives->count(); $i++) {
            $sum[$i] = array_sum($preferensi_sum[$i]);
        }

        $rangking = [];
        $rank = $sum;
        rsort($rank);
        foreach ($sum as $s) {
            array_push($rangking, (array_search($s, $rank) + 1));
        }

        return view('analyze.index', compact(['criterias', 'alternatives', 'alternative_values', 'normalisasi', 'preferensi', 'sum', 'rangking']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
