<?php

namespace App\Http\Controllers;

use App\Models\SubCriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCriteriaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SubCriteria::create($request->all());
        return redirect()->route('criteria.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCriteria = SubCriteria::all()->find($id);
        return view('subcriteria.edit', compact('subCriteria'));
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
        SubCriteria::find($id)->update($request->all());
        return redirect()->route('criteria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCriteria::destroy($id);
        return redirect()->route('criteria.index');
    }
}
