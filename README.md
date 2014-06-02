Nested
======

[![Build Status](https://travis-ci.org/harp-orm/nested.svg?branch=master)](https://travis-ci.org/harp-orm/nested)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/nested/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/nested/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/nested/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/nested/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/nested/v/stable.png)](https://packagist.org/packages/harp-orm/nested)

Adjacency List (parentId column) for Harp ORM

Usage
-----

Add the Traits to your models / Repos

```php
// Model Class
use Harp\Nested\NestedModelTrait;

class Category extends AbstractModel
{
    use NestedModelTrait;
}

// Repo Class
use Harp\Nested\NestedRepoTrait;

class Category extends AbstractRepo
{
    use NestedRepoTrait;

    public function initialize()
    {
        $this->initializeNested();

        // Other initializations
        // ...
    }
}

```

It will add "parent" and "children" Rels to the repo. The model will get the convenience methods:

- ``getParent``
- ``setParent``
- ``getChildren``
- ``getParents``
- ``isRoot``

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
