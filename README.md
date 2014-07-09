Nested
======

[![Build Status](https://travis-ci.org/harp-orm/nested.svg?branch=master)](https://travis-ci.org/harp-orm/nested)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/nested/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/nested/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/nested/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/nested/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/nested/v/stable.png)](https://packagist.org/packages/harp-orm/nested)

Adjacency List (parentId column) for Harp ORM

Usage
-----

Add the Traits to your Model / Repo

```php
// Model Class
use Harp\Nested\NestedTrait;

class Category extends AbstractModel
{
    use NestedTrait;

    public static function initialize($repo)
    {
        NestedTrait::initialize($repo);

        // Other initializations
        // ...
    }
}

```

__Database Table:__

```
┌─────────────────────────┐
│ Table: Category         │
├─────────────┬───────────┤
│ id          │ ingeter   │
│ name        │ string    │
│ parentId*   │ integer   │
└─────────────┴───────────┘
* Required fields
```

Methods
-------

It will add "parent" and "children" Rels to the repo. The model will get the convenience methods:

Method                                    | Description
------------------------------------------|--------------------------------------------------
__getParent__()                           | Return the parent model
__setParent__(AbstractModel $parent)      | Set the parent model
__getChildren__()                         | Get immidiate children. Returns a Models object
__isRoot__()                              | Boolean check if it is root (has parent) or not
__getParents__()                          | Return all the parents, including root. Models object


License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
