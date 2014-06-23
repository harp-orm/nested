<?php

namespace Harp\Nested\Test\Repo;

use Harp\Nested\Test\Repo;
use Harp\Nested\Test\AbstractTestCase;


/**
 * @coversDefaultClass Harp\Nested\Repo\NestedTrait
 */
class NestedTraitTest extends AbstractTestCase
{
    /**
     * @covers ::initializeNested
     */
    public function testParent()
    {
        $cat = new Repo\Category('Harp\Nested\Test\Model\Category');

        $this->assertInstanceOf('Harp\Harp\Rel\BelongsTo', $cat->getRel('parent'));
        $this->assertInstanceOf('Harp\Harp\Rel\HasMany', $cat->getRel('children'));
    }
}
