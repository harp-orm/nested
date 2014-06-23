<?php

namespace Harp\Nested\Model;

use Harp\Harp\AbstractModel;
use Harp\Core\Model\Models;
use Harp\Query\SQL\SQL;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait NestedTrait
{
    public $parentId;

    /**
     * @return AbstractModel
     */
    public function getParent()
    {
        return $this->getRepo()->loadLink($this, 'parent')->get();
    }

    /**
     * @return AbstractModel $this
     */
    public function setParent(AbstractModel $parent)
    {
        $this->getRepo()->loadLink($this, 'parent')->set($parent);

        return $this;
    }

    /**
     * @return \Harp\Core\Repo\LinkMany
     */
    public function getChildren()
    {
        return $this->getRepo()->loadLink($this, 'children');
    }

    /**
     * @return boolean
     */
    public function isRoot()
    {
        return empty($this->parentId);
    }

    /**
     * @return \Harp\Harp\Query\Select;
     */
    public function getRecursionTable()
    {
        $repo = $this->getRepo();

        return $repo->selectAll()
            ->column('@row', '_id')
            ->column("(SELECT @row := parentId FROM {$repo->getTable()} WHERE {$repo->getPrimaryKey()} = _id)")
            ->column('@l := @l + 1', 'lvl')
            ->from(new SQL('(SELECT @row := ?, @l := 0)', [$this->parentId]), 'vars')
            ->whereNot('@row', 0);
    }

    /**
     * @return Models
     */
    public function getParents()
    {
        if (empty($this->parentId)) {
            return new Models();
        } else {
            $repo = $this->getRepo();

            return $repo->findAll()
                ->joinAliased(
                    $this->getRecursionTable(),
                    'RecursionTable',
                    ['RecursionTable._id' => "{$repo->getTable()}.{$repo->getPrimaryKey()}"]
                )
                ->order('RecursionTable.lvl', 'DESC')
                ->load();
        }

    }
}
