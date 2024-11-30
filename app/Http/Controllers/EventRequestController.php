<?php

namespace App\Http\Controllers;

use App\Models\EventRequest;
use App\Http\Requests\StoreEventRequestRequest;
use App\Http\Requests\UpdateEventRequestRequest;

class EventRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventsRequest = EventRequest::all();
        return view('events.eventsRequest', compact('eventsRequest'));
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
    public function store(StoreEventRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EventRequest $eventRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventRequest $eventRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequestRequest $request, EventRequest $eventRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventRequest $eventRequest)
    {
        //
    }
}
