<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\SubjectRequest;
use App\Http\Requests\TimeRequest;
use App\plan;
use App\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(PlanRequest $request)
    {

//        $requestt = [
//          "schedule" => ["interval" => 45],
//          "times"    => ["sat" => 4],
//          "subjects" => ["arb","eng","math"]
//        ];
//        return json_encode($requestt);

        $userSchedule = new ScheduleController();
        $scheduleRequest = new ScheduleRequest($request->data["schedule"]);
        $userSchedule->store($scheduleRequest);

        $userTimes = new TimeController();
        $timeRequest = $request->data["times"];
        $userTimes->store(new TimeRequest($timeRequest));

        $userSubjects = new SubjectController();
        $subjectRequest = $request->data["subjects"];
        $userSubjects->store(new SubjectRequest($subjectRequest));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(plan $plan)
    {
        //
    }
}



