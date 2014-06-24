<?php

namespace Harp\Nested\Test\Model;

use Harp\Harp\AbstractModel;
use Harp\Nested\Model\NestedTrait;

class Category extends AbstractModel
{
    const REPO = 'Harp\Nested\Test\Repo\Category';

    use NestedTrait;

    public $id;
    public $name;
}
