<?php

namespace Harp\Nested\Test;

use Harp\Harp\AbstractRepo;
use Harp\Nested\NestedRepoTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
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
