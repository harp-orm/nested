<?php

namespace Harp\Nested\Test;

use Harp\Harp\AbstractModel;
use Harp\Nested\NestedTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Category extends AbstractModel
{
    const REPO = 'Harp\Nested\Test\CategoryRepo';

    use NestedTrait;

    public $id;
    public $name;
}
