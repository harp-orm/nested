<?php

namespace Harp\Nested\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Nested\Repo\NestedTrait;

class Category extends AbstractRepo
{
    use NestedTrait;

    public function initialize()
    {
        $this
            ->setModelClass('Harp\Nested\Test\Model\Category')
            ->initializeNested();
    }
}
