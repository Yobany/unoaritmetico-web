<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 11:39 PM
 */

namespace App\Transformers;

use App\Student;
use League\Fractal\TransformerAbstract;

class StudentTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['group'];

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
            'playedCount' => count($entity->games),
            'winnedCount' => $winnedCount,
            'lostCount' => $lostCount
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
}