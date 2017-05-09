<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/03/2017
 * Time: 04:26 PM
 */

namespace App\Repositories\Criterias;

use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;
use Illuminate\Database\Query\Builder;

class GroupOwnershipCriteria extends Criteria
{
    private $groupId;

    function __construct($groupId)
    {
        $this->groupId = $groupId;
    }

    /**
     * @param $model Builder
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->where('group_id', $this->groupId);
    }
}