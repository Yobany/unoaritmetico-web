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
use Illuminate\Database\Query\Builder;

class NameCriteria extends Criteria
{

    private $name;
    private $table;

    function __construct($name, $table = null)
    {
        $this->name = $name;
        $this->table = $table;
    }

    /**
     * @param $model Builder
     * @param Repository $repository
     * @return mixed
     */
    public function apply($model, Repository $repository)
    {
        if(is_null($this->table)){
            return $model->where('name','ILIKE', '%' . $this->name . '%');
        }
        return $model->where($this->table . '.name','ILIKE', '%' . $this->name . '%');
    }
}