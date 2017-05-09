<?php

namespace App\Http\Requests;



class StoreGameRequest extends ApiRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'played_at' => 'required|date',
            'name' => 'required|string',
            'winner' => 'sometimes|integer|exists:students,id',
            'moves' => 'required|array',
            'moves.*.turn' => 'required|integer',
            'moves.*.duration' => 'required|integer',
            'moves.*.student' => 'sometimes|integer|exists:students,id',
            'moves.*.by_color' => 'required|boolean',
            'moves.*.cardOnDeck' => 'required',
            'moves.*.cardOnDeck.operation' => 'required_with:result|string',
            'moves.*.cardOnDeck.result' => 'required_with:operation|numeric',
            'moves.*.cardOnDeck.power' => 'sometimes|integer|exists:card_powers,id',
            'moves.*.cardOnDeck.color' => 'sometimes|integer|exists:colors,id',
            'moves.*.cardPlayed' => 'required',
            'moves.*.cardPlayed.operation' => 'required_with:result|string',
            'moves.*.cardPlayed.result' => 'required_with:operation|numeric',
            'moves.*.cardPlayed.power' => 'sometimes|integer|exists:card_powers,id',
            'moves.*.cardPlayed.color' => 'sometimes|integer|exists:colors,id'
        ];
    }
}
