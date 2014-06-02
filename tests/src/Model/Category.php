<?php

namespace Harp\Nested\Test\Model;

use Harp\Harp\AbstractModel;
use Harp\Nested\Test\Repo;
use Harp\Nested\NestedModelTrait;

class Category extends AbstractModel
{
    use NestedModelTrait;

    public $id;
    public $name;

    public function getRepo()
    {
        return Repo\Category::get();
    }
}
