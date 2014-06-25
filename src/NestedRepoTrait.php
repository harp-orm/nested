<?php

namespace Harp\Nested;

use Harp\Harp\Rel;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait NestedRepoTrait
{
    public function initializeNested()
    {
        return $this
            ->addRel(new Rel\BelongsTo('parent', $this, $this))
            ->addRel(new Rel\HasMany('children', $this, $this, ['foreignKey' => 'parentId']));
    }
}
