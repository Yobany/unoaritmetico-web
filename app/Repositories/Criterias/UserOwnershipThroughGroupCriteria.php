<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 01:01 AM
 */

namespace App\Repositories\Criterias;


use App\Student;
use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;
use Illuminate\Database\Query\Builder;

class UserOwnershipThroughGroupCriteria extends Criteria
{
    private $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $model Builder
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->whereHas('group', function($query) {
            $query->where('user_id', $this->userId);
        });
    }
}