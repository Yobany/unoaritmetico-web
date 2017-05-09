<?php
/**
 * Created by PhpStorm.
 * User: pixco
 * Date: 02/02/2017
 * Time: 04:08 PM
 */

namespace App\Repositories;


use App\Group;
use Bosnadev\Repositories\Eloquent\Repository;

class GroupRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Group::class;
    }
}