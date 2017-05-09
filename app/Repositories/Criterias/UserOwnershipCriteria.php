<?php

namespace App\Repositories\Criterias;

use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;

class UserOwnershipCriteria extends Criteria
{

    private $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $model
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        $model = $model->where('user_id', $this->userId);
        return $model;
    }
}