<?php

namespace Harp\Nested\Test;

/**
 * @coversDefaultClass Harp\Nested\NestedRepoTrait
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
