# Actions

Common action based coupled to components:
* [The HttpFoundation Component](http://symfony.com/doc/current/components/form/introduction.html)
* [The Form Component](http://symfony.com/doc/current/components/http_foundation/introduction.html)

Allows you to quickly create CRUD actions.

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Codifico/Actions/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Codifico/Actions/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/codifico/actions/v/stable)](https://packagist.org/packages/codifico/actions)
[![Latest Unstable Version](https://poser.pugx.org/codifico/actions/v/unstable)](https://packagist.org/packages/codifico/actions)
[![Total Downloads](https://poser.pugx.org/codifico/actions/downloads)](https://packagist.org/packages/codifico/actions)

## Instalation

```bash
php composer.phar require codifico/actions:dev-master
```

## Usage

Prepare your repository to be able to work with *actions*:

```php

class MyRepository implements ActionRepository
{
    //(...)
}

### Basic

If you want to use the basic version (based on Form and HttpFoundation Components), create your own classes:

```php
use Codifico\Component\Actions\Action\Basic\CreateAction;
use Codifico\Component\Actions\Action\Basic\IndexAction;
use Codifico\Component\Actions\Action\Basic\RemoveAction;
use Codifico\Component\Actions\Action\Basic\UpdateAction;

class MyEntityCreateAction extends CreateAction 
{
    //(...)
}

class MyEntityIndexAction extends IndexAction
{
    //(...)
}

class MyEntityRemoveAction extends RemoveAction
{
    //(...)
}

class MyEntityUpdateAction extends UpdateAction
{
    //(...)
}
```

and at last, but not at least use then:

```php
//Create:
$create = new MyEntityCreateAction($repository, $formFactory, $myEntityType);
$create->execute();

//Index:
$index = new MyEntityIndexAction($repository);
$index->setCriteria($criteria)->execute();

//Remove:
$remove = new MyEntityRemoveAction($repository);
$remove->setObject($object)->execute();

//Update:
$update = new MyEntityUpdateAction($formFactory, $myEntityType);
$update->setObject($object)->execute();
```


### Custom

Otherwise, you might want to use interfaces:

* Codifico\Component\Actions\Action\CreateAction
* Codifico\Component\Actions\Action\RemoveAction
* Codifico\Component\Actions\Action\UpdateAction

or even:

* Codifico\Component\Actions\Action\Action

## Copyright

Copyright (c) 2015 Marcin Dryka (drymek). See LICENSE for details.

## Contributors

* Marcin Dryka [drymek](http://github.com/drymek) [lead developer]
* Other [awesome developers](https://github.com/Codifico/Actions/graphs/contributors)
