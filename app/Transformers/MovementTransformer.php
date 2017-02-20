<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 19/02/2017
 * Time: 12:00 PM
 */

namespace App\Transformers;
use App\Move;

class MovementTransformer extends MainTransformer
{
    /**
     * @param Move $entity
     * @return array
     */
    protected function transform($entity)
    {
        $studentTransformer = new StudentTransformer();
        $cardTransformer = new CardTransformer();
        return [
            'turn' => $entity->turn,
            'student' => is_null($entity->student) ? null : [
                'id' => $entity->student->id,
                'name' => $entity->student->name
            ],
            'duration' => $entity->duration,
            'by_color' => $entity->by_color,
            'card_played' => $cardTransformer->transformEntity($entity->cardPlayed),
            'card_on_deck' => $cardTransformer->transformEntity($entity->cardOnDeck),
        ];
    }
}