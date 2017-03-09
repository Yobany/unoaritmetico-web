<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreGameRequest;
use App\Repositories\GameRepository;
use App\Transformers\GameDetailsTransformer;
use App\Transformers\GameFileTransformer;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\App;


class GamesController extends Controller
{
    private $gameRepository;

    /**
     * GamesController constructor.
     * @param $gameRepository
     */
    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    /**
     * @SWG\Post(
     *     path="/games",
     *     summary="Create a game",
     *     tags={"Games"},
     *     description="Create a game",
     *     operationId="storeGame",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Account to register",
     *         required=true,
     *         @SWG\Schema(ref="#/definitions/StoreGameRequest")
     *     ),
     *     @SWG\Response(
     *         response=201,
     *         description="Game was saved"
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Invalid Fields",
     *          @SWG\Schema(ref="#/definitions/Validation"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function store(StoreGameRequest $request)
    {
        $this->gameRepository->saveFromRequest($request->all());
        return $this->response->noContent();
    }

    /**
     * @SWG\Get(
     *     path="/games/{gameId}",
     *     summary="Display a single game",
     *     tags={"Games"},
     *     description="Display a single game",
     *     operationId="getGame",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="gameId",
     *         in="path",
     *         description="Id of game to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Game retrieved",
     *          @SWG\Schema(ref="#/definitions/DetailGameResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function show($gameId)
    {
        return $this->responseTransformed($this->gameRepository->find($gameId), new GameDetailsTransformer());
    }


    /**
     * @SWG\Get(
     *     path="/games/{gameId}/export",
     *     summary="Exports a single game",
     *     tags={"Games"},
     *     description="Exports a single game",
     *     operationId="exportGame",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="gameId",
     *         in="path",
     *         description="Id of game to retrieve",
     *         required=true,
     *         type="integer"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Game retrieved",
     *          @SWG\Schema(ref="#/definitions/ExportGameResponse")
     *     ),
     *     @SWG\Response(
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *    @SWG\Response(
     *         response=401,
     *         description="Token is invalid",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=405,
     *         description="Invalid Method",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     *     @SWG\Response(
     *         response=500,
     *         description="Internal Error",
     *          @SWG\Schema(ref="#/definitions/Error"),
     *     ),
     * )
     */
    public function export($gameId)
    {
        $pdf = PDF::loadView('report.game', ['game' => $this->gameRepository->find($gameId)]);
        return $this->responseTransformed($pdf->stream(), new GameFileTransformer());
    }
}
