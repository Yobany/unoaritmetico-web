<?php
namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\ConsultRequest;
use App\Http\Requests\StoreGameRequest;
use App\Services\GameService;
use App\Transformers\GameDetailsTransformer;
use App\Transformers\GameTransformer;

class GamesController extends Controller
{
    private $service;

    /**
     * GamesController constructor.
     * @param $gameService
     */
    public function __construct(GameService $gameService)
    {
        $this->service = $gameService;
    }


    /**
     * @SWG\Get(
     *     path="/games",
     *     summary="Obtains games",
     *     tags={"Games"},
     *     description="Obtains games",
     *     operationId="getGames",
     *     consumes={"application/json"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         name="page",
     *         in="query",
     *         type="integer",
     *         description="Page requested, default is 1",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="size",
     *         in="query",
     *         type="integer",
     *         description="Items per page, default is 10",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="name",
     *         in="query",
     *         type="string",
     *         description="search by game name",
     *         required=false
     *     ),
     *     @SWG\Parameter(
     *         name="group",
     *         in="query",
     *         type="integer",
     *         description="search by group id",
     *         required=false
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="Groups created by user",
     *          @SWG\Schema(ref="#/definitions/GetGamesResponse")
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
     * @param ConsultRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ConsultRequest $request)
    {
        return fractal($this->service->get($request), new GameTransformer())->respond();
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
     *         response=400,
     *         description="Request format isn't valid",
     *         @SWG\Schema(ref="#/definitions/Error"),
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
        return fractal($this->service->save($request), new GameTransformer())->respond();
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
     * @param Game $game
     * @return
     */
    public function show(Game $game)
    {
        return fractal($game, new GameDetailsTransformer())->respond();
    }

    /**
     * @SWG\Get(
     *     path="/games/{gameId}/export",
     *     summary="Exports a single game",
     *     tags={"Games"},
     *     description="Display a single game",
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
     *         description="File retrieved"
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
    public function export(Game $game)
    {
        return $this->service->export($game);
    }
}
