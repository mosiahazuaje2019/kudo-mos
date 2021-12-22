<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KudoCard;
use Illuminate\Http\Request;
use App\Http\Resources\KudoCard as KudoCardResources;
use App\Http\Resources\KudoCardCollection;
use App\Http\Requests\KudoCardRequest\KudoCard as KudoCardRequest;

class KudoCardController extends Controller
{
    protected $kudo_cards;

    public function __construct(KudoCard $kudo_cards){
        $this->kudo_cards = $kudo_cards;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new KudoCardCollection(
                $this->kudo_cards->orderBy('id','desc')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KudoCardRequest $request)
    {
        $kudo_cards = $this->kudo_cards->create($request->all());
        return response()->json(new KudoCardResources($kudo_cards), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KudoCard  $kudoCard
     * @return \Illuminate\Http\Response
     */
    public function show(KudoCard $kudoCard)
    {
        return response()->json(
            new KudoCardResources($kudoCard)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KudoCard  $kudoCard
     * @return \Illuminate\Http\Response
     */
    public function update(KudoCardRequest $request, KudoCard $kudoCard)
    {
        $kudoCard->update($request->all());
        return response()->json(new KudoCardResources($kudoCard));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KudoCard  $kudoCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(KudoCard $kudoCard)
    {
        $kudoCard->delete();
        return response()->json(null, 204);
    }

    public function getKudos($id) {
        $kudos = KudoCard::where('kudo_board_id', $id)->get();
        return response()->json($kudos);
    }
}
