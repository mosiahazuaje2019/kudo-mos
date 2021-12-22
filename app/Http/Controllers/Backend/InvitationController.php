<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Invitation;

use App\Http\Resources\Invitation as InvitationResources;
use App\Http\Resources\InvitationCollection;
use App\Http\Requests\InvitationRequest\Invitation as InvitationRequest;

class InvitationController extends Controller
{
    protected $invitation;

    public function __construct(Invitation $invitation){
        $this->invitation = $invitation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new InvitationCollection(
                $this->invitation->orderBy('id','desc')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationRequest $request)
    {
        $invitation = $this->invitation->create($request->all());
        return response()->json(new InvitationResources($invitation), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function show(Invitation $invitation)
    {
        return response()->json(
            new InvitationResources($invitation)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function update(InvitationRequest $request, Invitation $invitation)
    {
        $invitation->update($request->all());
        return response()->json(new InvitationResources($invitation));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invitation  $invitation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invitation $invitation)
    {
        $invitation->delete();
        return response()->json(null, 204);
    }
}
