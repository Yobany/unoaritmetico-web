<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 04/02/2017
 * Time: 01:17 PM
 */

namespace App\Repositories\Criterias;


use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;

class FromGroup extends Criteria
{

    private $groupId;

    function __construct($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('group_id', $this->groupId);
        return $model;
    }
}