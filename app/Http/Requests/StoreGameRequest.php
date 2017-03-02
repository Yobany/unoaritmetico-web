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
            'winner' => 'sometimes|exists:students,id',
            'moves' => 'required|array',
            'moves.*.duration' => 'required|integer',
            'moves.*.student' => 'required|integer|exists:students,id',
            'moves.*.by_color' => 'required|boolean',
            'moves.*.card_on_deck' => 'required',
            'moves.*.card_on_deck.operation' => 'required_with:result|string',
            'moves.*.card_on_deck.result' => 'required_with:operation|numeric',
            'moves.*.card_on_deck.power' => 'sometimes|integer|exists:card_powers,id',
            'moves.*.card_on_deck.color' => 'sometimes|integer|exists:colors,id',
            'moves.*.card_played' => 'required',
            'moves.*.card_played.operation' => 'required_with:result|string',
            'moves.*.card_played.result' => 'required_with:operation|numeric',
            'moves.*.card_played.power' => 'sometimes|integer|exists:card_powers,id',
            'moves.*.card_played.color' => 'sometimes|integer|exists:colors,id'
        ];
    }
}
