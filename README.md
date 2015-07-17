yii2-fancytree-widget
=====================
The yii2-fancytree-widget is a Yii 2 wrapper for [Fancytree](http://wwwendt.de/tech/fancytree/demo/), a JavaScript dynamic tree view plugin for jQuery with support for persistence, keyboard, checkboxes, tables, drag'n'drop, and lazy loading.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist bluezed/yii2-fancytree-widget "*"
```

or add

```
"bluezed/yii2-fancytree-widget": "*"
```

to the require section of your `composer.json` file.

How to use
----------

On your view file.

```php

<?php
// Example of data.
$data = [
	['title' => 'Node 1', 'key' => 1],
	['title' => 'Folder 2', 'key' => '2', 'folder' => true, 'children' => [
		['title' => 'Node 2.1', 'key' => '3'],
		['title' => 'Node 2.2', 'key' => '4']
	]]
];

echo \bluezed\fancytree\FancytreeWidget::widget([
	'options' =>[
		'id' => 'my-fancy-tree',
		'htmlOptions' => ['style' => 'margin-bottom: 15px;'],
		'source' => $data,
		'extensions' => ['dnd'],
		'dnd' => [
			'preventVoidMoves' => true,
			'preventRecursiveMoves' => true,
			'autoExpandMS' => 400,
			'dragStart' => new JsExpression('function(node, data) {
				return true;
			}'),
			'dragEnter' => new JsExpression('function(node, data) {
				return true;
			}'),
			'dragDrop' => new JsExpression('function(node, data) {
				data.otherNode.moveTo(node, data.hitMode);
			}'),
		],
	]
]);
?>

```

Attribution
-----------

Originally created by Wanderson Bragança (https://github.com/wbraganca/yii2-fancytree-widget)
