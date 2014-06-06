<?php

namespace Harp\Nested\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Nested\NestedRepoTrait;
use Harp\Nested\Test\Model;

class Category extends AbstractRepo
{
    use NestedRepoTrait;

    public static function newInstance()
    {
        return new Category('Harp\Nested\Test\Model\Category');
    }

    public function initialize()
    {
        $this->initializeNested();
    }
}
