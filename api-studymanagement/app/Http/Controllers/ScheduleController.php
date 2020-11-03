<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScheduleRequest;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return JsonResponse
     */
    public function store(ScheduleRequest $request)
    {
        //time subjects -> get plane
        $schedule = Schedule::where([
            "user_id" => 5
        ])->latest()->first();

        if( !$schedule || Carbon::create($schedule->from) != Carbon::create($schedule->to)->subDay("7") ){
             Schedule::create([
                "user_id" => "5",
                "interval" => $request->interval,
                "from"    => Carbon::now()->format("Y-m-d"),
                "to"      => Carbon::now()->addWeek()->format("Y-m-d")
            ]);

        }else{
            return response()->json([
                "error" => "شما برای این هفته برنامه دریافت کرده اید اگر برنامه دیگری میخواهید برنامه قبلی خود را حذف نمایید"],
                409);

         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(schedule $schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, schedule $schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(schedule $schedule)
    {
        //
    }
}
