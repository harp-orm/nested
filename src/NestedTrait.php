<?php

namespace Harp\Nested;

use Harp\Harp\AbstractModel;
use Harp\Harp\Config;
use Harp\Harp\Model\Models;
use Harp\Query\SQL\SQL;
use Harp\Harp\Rel;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait NestedTrait
{
    public static function initialize(Config $config)
    {
        $class = $config->getModelClass();

        $config
            ->addRel(new Rel\BelongsTo('parent', $config, $class::getRepo()))
            ->addRel(new Rel\HasMany('children', $config, $class::getRepo(), ['foreignKey' => 'parentId']));
    }

    public $parentId;

    /**
     * @return AbstractModel
     */
    public function getParent()
    {
        return $this->get('parent');
    }

    /**
     * @return AbstractModel $this
     */
    public function setParent(AbstractModel $parent)
    {
        $this->set('parent', $parent);

        return $this;
    }

    /**
     * @return \Harp\Core\Repo\LinkMany
     */
    public function getChildren()
    {
        return $this->all('children');
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
        $repo = static::getRepo();

        return static::selectAll()
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
            $repo = static::getRepo();

            return static::findAll()
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
