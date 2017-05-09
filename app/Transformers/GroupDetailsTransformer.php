<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/03/2017
 * Time: 02:07 PM
 */

namespace App\Transformers;


use App\Group;
use Illuminate\Database\Eloquent\Model;
use League\Fractal\TransformerAbstract;

class GroupDetailsTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['students', 'games'];

    /**
     * @param Group $entity
     * @return array
     */
    public function transform(Group $entity)
    {
        return [
            'id' => $entity->id,
            'name' => $entity->name
        ];
    }

    public function includeStudents(Group $group)
    {
        return $this->collection($group->students, new StudentTransformer());
    }

    public function includeGames(Group $group)
    {
        return $this->collection($group->getGames(), new GameTransformer());
    }
}