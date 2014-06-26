<?php

namespace Harp\Nested\Test;

/**
 * @coversDefaultClass Harp\Nested\NestedRepoTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class NestedRepoTraitTest extends AbstractTestCase
{
    /**
     * @covers ::initializeNested
     */
    public function testParent()
    {
        $cat = new CategoryRepo();

        $this->assertInstanceOf('Harp\Harp\Rel\BelongsTo', $cat->getRel('parent'));
        $this->assertInstanceOf('Harp\Harp\Rel\HasMany', $cat->getRel('children'));
    }
}
