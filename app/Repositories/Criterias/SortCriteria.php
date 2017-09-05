<?php
/**
 * Created by IntelliJ IDEA.
 * User: pixco
 * Date: 04/09/2017
 * Time: 11:44 PM
 */

namespace App\Repositories\Criterias;


use Bosnadev\Repositories\Contracts\RepositoryInterface as Repository;
use Bosnadev\Repositories\Criteria\Criteria;
use Illuminate\Database\Query\Builder;

class SortCriteria extends Criteria
{
    private $column;

    function __construct($column)
    {
        $this->column = $column;
    }

    /**
     * @param $model Builder
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        return $model->orderBy($this->column);
    }
}