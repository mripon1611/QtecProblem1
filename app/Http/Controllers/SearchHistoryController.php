<?php

namespace App\Http\Controllers;

use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Carbon;

class SearchHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::all();
        $data['searchValues'] = SearchHistory::select('key_words',DB::raw("COUNT(key_words) as total_count"))->groupBy('key_words')->get();
        return view('index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = SearchHistory::select('search_histories.*');

        if($request->key_words){
            $query = $query->where("key_words","LIKE","%".$request->key_words."%");
        }
        if($request->user_id){
            $query = $query->where("user_id",$request->user_id);
        }
        if($request->from_date && $request->to_date){
            $query = $query->whereBetween("created_at",[$request->from_date,$request->to_date]);
        }
        if($request->time_range){
            $today = Carbon::now()->format("Y-m-d");
            $dateBefore = Carbon::now()->subDays($request->time_range)->format("Y-m-d");

            $query = $query->whereBetween("created_at",[$dateBefore,$today]);
        }

        $data = $query->get();

        if(count($data)>0){
            $result['status'] = 200;
            $result['data'] = json_decode($data,true);
        }else{
            $result['status'] = 404;

        }

        return $result;
    }

    /**
     * Display the specified resource.
     */
    public function show(SearchHistory $searchHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SearchHistory $searchHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SearchHistory $searchHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SearchHistory $searchHistory)
    {
        //
    }
}
