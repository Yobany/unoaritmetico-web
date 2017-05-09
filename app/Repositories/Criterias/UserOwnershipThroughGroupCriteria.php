<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 09/05/2017
 * Time: 01:01 AM
 */

namespace App\Repositories\Criterias;


use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;

class UserOwnershipThroughGroupCriteria extends Criteria
{
    private $userId;

    function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @param $model
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->join('groups', function($join)  {
            $join->on('students.group_id','=','groups.id')->where('groups.user_id', $this->userId);
        });
    }
}