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
    use NestedTrait;

    public static function initialize($repo)
    {
        NestedTrait::initialize($repo);
    }

    public $id;
    public $name;
}
