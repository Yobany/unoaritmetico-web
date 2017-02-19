<?php

namespace App\Http\Controllers;

use App\Game;
use App\Http\Requests\StoreGameRequest;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;

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


}
