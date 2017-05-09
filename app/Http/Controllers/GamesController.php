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
