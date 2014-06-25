<?php

namespace Harp\Nested\Test;

use Harp\Harp\AbstractRepo;
use Harp\Nested\NestedRepoTrait;

class CategoryRepo extends AbstractRepo
{
    use NestedRepoTrait;

    public function initialize()
    {
        $this
            ->setModelClass('Harp\Nested\Test\Category')
            ->initializeNested();
    }
}
