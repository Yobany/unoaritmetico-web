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

class StudentFromUser extends Criteria
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
        $model = $model->join('groups', 'students.group_id', '=', 'groups.id')->where('user_id', $this->userId);
        return $model;
    }
}