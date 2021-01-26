<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\BehaviourChart;
use App\Http\Resources\BehaviourChartCollection;
use App\Http\Resources\BehaviourChartResource;
use Illuminate\Http\Request;

class BehaviourChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return new BehaviourChartCollection(BehaviourChart::paginate(10));
        
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
     * @param  \App\BehaviourChart  $behaviourChart
     * @return \Illuminate\Http\Response
     */
    public function show(BehaviourChart $behaviourChart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BehaviourChart  $behaviourChart
     * @return \Illuminate\Http\Response
     */
    public function edit(BehaviourChart $behaviourChart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BehaviourChart  $behaviourChart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        BehaviourChart::whereId($request->behave_id)->update($request->except(['_method','_token','behave_id']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BehaviourChart  $behaviourChart
     * @return \Illuminate\Http\Response
     */
    public function destroy(BehaviourChart $behaviourChart)
    {
        //
    }
    public function my_class_behave($class_id, $term_id){
        return  BehaviourChartResource::collection(BehaviourChart::where('term_id',$term_id)->
        where('s5_class_id',$class_id)->get());
    }
}
