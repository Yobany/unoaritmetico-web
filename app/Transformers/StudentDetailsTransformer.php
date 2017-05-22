<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 22/05/2017
 * Time: 01:26 PM
 */

namespace App\Transformers;

use App\Student;
use League\Fractal\TransformerAbstract;

class StudentDetailsTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['group', 'played'];

    /**
     * @param Student $entity
     * @return array
     */
    public function transform(Student $entity)
    {
        $playedCount = $entity->games()->get()->count();
        $winnedCount = count($entity->gamesWinned());
        $lostCount = $playedCount - $winnedCount;
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'age' => $entity->age,
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
            ]
        ];
    }

    /**
     * @param Student $student
     * @return \League\Fractal\Resource\Item
     */
    public function includeGroup(Student $student)
    {
        return $this->item($student->group, new GroupTransformer());
    }

    /**
     * @param Student $student
     * @return \League\Fractal\Resource\Collection
     */
    public function includePlayed(Student $student)
    {
        return $this->collection($student->games, new GameTransformer());
    }
}