<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 08/05/2017
 * Time: 10:35 PM
 */

namespace App\Repositories\Criterias;

use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class NameCriteria extends Criteria
{

    private $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param $model Builder
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->where('name','like', $this->name);
    }
}