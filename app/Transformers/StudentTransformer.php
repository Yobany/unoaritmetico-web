<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;


use App\Repositories\StudentRepository;
use App\Student;

class StudentTransformer extends MainTransformer
{

    /**
     * @param Student $entity
     * @return array
     */
    protected function transform($entity)
    {
        $groupTransformer = new GroupTransformer();
        $gameTransformer = new GameTransformer();
        $playedCount = $entity->games()->get()->count();
        $winnedCount = count($entity->gamesWinned());
        $lostCount = $playedCount - $winnedCount;
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'age' => $entity->age,
            'group' => $groupTransformer->transformEntity($entity->group),
            'played' => $gameTransformer->transformCollection($entity->games),
            'stadistics' => [
                'game' => [
                    'playedCount' => $playedCount,
                    'winnedCount' => $winnedCount,
                    'lostCount' => $lostCount
                ],
                'move' => [
                    'matchByColorCount' => $entity->moves()->getBaseQuery()->where('by_color' , true)->get()->count()
                ],
                'operation' => [
                    'additionCount' => $entity->cardsPlayed()->getBaseQuery()->where('operation_id', ADDITION_OPERATION)->get()->count(),
                    'substractionCount' => $entity->cardsPlayed()->getBaseQuery()->where('operation_id', SUBSTRACTION_OPERATION)->get()->count(),
                    'multiplicationCount' => $entity->cardsPlayed()->getBaseQuery()->where('operation_id', MULTIPLICATION_OPERATION)->get()->count(),
                    'divisionCount' => $entity->cardsPlayed()->getBaseQuery()->where('operation_id', DIVISION_OPERATION)->get()->count()
                ]
            ],
        ];
    }
}