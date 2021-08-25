<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\Alternatives;
use Illuminate\Http\Request;
use App\Models\AlternativeValues;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::all();
        $alternative_values = DB::table('alternative_values')
            ->join('alternatives', 'alternative_values.alternative_id', '=', 'alternatives.id')
            ->join('criterias', 'alternative_values.criteria_id', '=', 'criterias.id')
            ->get();
        $alternatives = Alternatives::all();
        return view('alternative.index', compact(['criterias', 'alternatives', 'alternative_values']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $criterias = Criteria::all();
        $subCriteria = SubCriteria::all();
        return view('alternative.create', compact(['criterias', 'subCriteria']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $req = $request->all();
        Alternatives::create([
            'alternative_name' => $request->alternative_name
        ]);
        $alternative = Alternatives::all()->sortKeysDesc()->first();
        for ($i = 1; $i <= Criteria::all()->count(); $i++) {
            AlternativeValues::create([
                'alternative_id' => $alternative->id,
                'criteria_id' => $req['criteria_id' . $i],
                'sub_criteria_id' => explode('=', $req['real_value' . $i])[0],
                'real_value' => explode('=', $req['real_value' . $i])[1],
            ]);
        }
        return redirect()->route('alternative.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $criterias = Criteria::all();
        $subCriteria = SubCriteria::all();
        $alternative = Alternatives::all()->find($id);
        $altv = AlternativeValues::all()->where('alternative_id', $id);
        return view('alternative.edit', compact(['criterias', 'alternative', 'altv', 'subCriteria']));
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
        $req = $request->all();
        Alternatives::find($id)->update([
            'alternative_name' => $request->alternative_name
        ]);
        for ($i = 1; $i <= Criteria::all()->count(); $i++) {
            AlternativeValues::where(['alternative_id' => $id, 'criteria_id' => $req['criteria_id' . $i]])->update([
                'alternative_id' => $id,
                'sub_criteria_id' => explode('=', $req['real_value' . $i])[0],
                'real_value' => explode('=', $req['real_value' . $i])[1],
            ]);
        }
        return redirect()->route('alternative.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AlternativeValues::destroy(['alternative_id' => $id]);
        Alternatives::destroy($id);
        return redirect()->back();
    }
}
