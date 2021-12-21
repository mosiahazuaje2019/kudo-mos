<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KudoBoard;
use App\Http\Resources\KudoBoard as KudoBoardResources;
use App\Http\Resources\KudoBoardCollection;
use App\Http\Requests\KudoBoardRequest\KudoBoard as KudoBoardRequest;

class KudoBoardController extends Controller
{
    protected $kudo_boards;

    public function __construct(KudoBoard $kudo_boards){
        $this->kudo_boards = $kudo_boards;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return response()->json(
            new KudoBoardCollection(
                $this->kudo_boards->orderBy('id','desc')->get()
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KudoBoardRequest $request){
        $kudo_boards = $this->kudo_boards->create($request->all());
        return response()->json(new KudoBoardResources($kudo_boards), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KudoBoard  $kudoBoard
     * @return \Illuminate\Http\Response
     */
    public function show(KudoBoard $kudoBoard)
    {
        return response()->json(
            new KudoBoardResources($kudoBoard)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KudoBoard  $kudoBoard
     * @return \Illuminate\Http\Response
     */
    public function update(KudoBoardRequest $request, KudoBoard $kudoBoard)
    {
        $kudBoard->update($request->all());
        return response()->json(new KudoBoardResources($kudoBoard));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KudoBoard  $kudoBoard
     * @return \Illuminate\Http\Response
     */
    public function destroy(KudoBoard $kudoBoard)
    {
        $kudoBoard->delete();
        return response()->json(null, 204);
    }

    public function getKudos($id) {
        $kudoBoards = KudoBoard::where('categorie_id',$id)->get();
        return response()->json($kudoBoards);
    }
}
