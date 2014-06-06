<?php

namespace Harp\Nested\Test;

/**
 * @coversDefaultClass Harp\Nested\NestedModelTrait
 */
class NestedModelTraitTest extends AbstractTestCase
{
    /**
     * @covers ::getParent
     * @covers ::isRoot
     */
    public function testParent()
    {
        $cat1 = Repo\Category::get()->find(1);
        $cat2 = Repo\Category::get()->find(3);
        $cat3 = Repo\Category::get()->find(4);

        $this->assertTrue($cat1->getParent()->isVoid());
        $this->assertFalse($cat2->isRoot());

        $this->assertSame($cat1, $cat2->getParent());
        $this->assertSame($cat2, $cat3->getParent());
        $this->assertSame($cat1, $cat3->getParent()->getParent());
    }

    /**
     * @covers ::setParent
     */
    public function testSetParent()
    {
        $cat1 = Repo\Category::get()->find(1);
        $cat3 = Repo\Category::get()->find(4);

        $cat3->setParent($cat1);

        $id = $cat3->getParent()->getId();

        $this->assertEquals(1, $id);
    }

    /**
     * @covers ::getChildren
     */
    public function testChildren()
    {
        $cat1 = Repo\Category::get()->find(1);
        $cat2 = Repo\Category::get()->find(2);
        $cat3 = Repo\Category::get()->find(3);

        $this->assertInstanceOf('Harp\Core\Repo\LinkMany', $cat1->getChildren());
        $this->assertSame([$cat2, $cat3], $cat1->getChildren()->toArray());
    }

    /**
     * @covers ::getRecursionTable
     */
    public function testGetRecursionTable()
    {
        $cat2 = Repo\Category::get()->find(2);

        $table = $cat2->getRecursionTable();

        $expected = 'SELECT Category.*, @row AS _id, (SELECT @row := parentId FROM Category WHERE id = _id), @l := @l + 1 AS lvl FROM Category, (SELECT @row := ?, @l := 0) AS vars WHERE (@row != ?)';

        $this->assertEquals($expected, $table->sql());
        $this->assertEquals([1, 0], $table->getParameters());
    }

    /**
     * @covers ::getParents
     */
    public function testGetParents()
    {
        $cat1 = Repo\Category::get()->find(1);
        $cat2 = Repo\Category::get()->find(3);
        $cat3 = Repo\Category::get()->find(4);

        $parents = $cat3->getParents();

        $this->assertInstanceOf('Harp\Core\Model\Models', $parents);
        $this->assertSame([$cat1, $cat2], $parents->toArray());

        $parents = $cat1->getParents();

        $this->assertInstanceOf('Harp\Core\Model\Models', $parents);
        $this->assertCount(0, $parents->toArray());
    }
}
