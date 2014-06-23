<?php

namespace Harp\Nested\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Nested\Repo\NestedTrait;
use Harp\Nested\Test\Model;

class Category extends AbstractRepo
{
    use NestedTrait;

    public static function newInstance()
    {
        return new Category('Harp\Nested\Test\Model\Category');
    }

    public function initialize()
    {
        $this->initializeNested();
    }
}
