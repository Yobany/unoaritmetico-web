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
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['group', 'played', 'stadistics'];

    /**
     * @param Student $entity
     * @return array
     */
    public function transform($entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name,
            'age' => $entity->age
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

    /**
     * @param Student $student
     * @return array
     */
    public function includeStadistics(Student $student)
    {
        $playedCount = $student->games()->get()->count();
        $winnedCount = count($student->gamesWinned());
        $lostCount = $playedCount - $winnedCount;
        return [
            'game' => [
                'playedCount' => $playedCount,
                'winnedCount' => $winnedCount,
                'lostCount' => $lostCount
            ],
            'move' => [
                'matchByColorCount' => $student->moves()->getBaseQuery()->where('by_color' , true)->get()->count()
            ],
            'operation' => [
                'additionCount' => $student->cardsPlayed()->getBaseQuery()->where('operation_id', ADDITION_OPERATION)->get()->count(),
                'substractionCount' => $student->cardsPlayed()->getBaseQuery()->where('operation_id', SUBSTRACTION_OPERATION)->get()->count(),
                'multiplicationCount' => $student->cardsPlayed()->getBaseQuery()->where('operation_id', MULTIPLICATION_OPERATION)->get()->count(),
                'divisionCount' => $student->cardsPlayed()->getBaseQuery()->where('operation_id', DIVISION_OPERATION)->get()->count()
            ]
        ];
    }
}