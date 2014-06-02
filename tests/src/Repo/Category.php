<?php

namespace Harp\Nested\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\Nested\NestedRepoTrait;
use Harp\Nested\Test\Model;

class Category extends AbstractRepo
{
    use NestedRepoTrait;

    private static $instance;

    /**
     * @return Category
     */
    public static function get()
    {
        if (self::$instance === null) {
            self::$instance = new Category('Harp\Nested\Test\Model\Category');
        }

        return self::$instance;
    }

    public function initialize()
    {
        $this->initializeNested();
    }
}
