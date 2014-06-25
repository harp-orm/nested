<?php

namespace Harp\Nested\Test;

use Harp\Harp\AbstractModel;
use Harp\Nested\NestedTrait;

class Category extends AbstractModel
{
    const REPO = 'Harp\Nested\Test\CategoryRepo';

    use NestedTrait;

    public $id;
    public $name;
}
