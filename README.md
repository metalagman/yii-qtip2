# qTip2 component for Yii

By Alexey Samoylov (<alexey.samoylov@gmail.com>).
Based on [Parcouss qTip2 extension](http://www.yiiframework.com/extension/qtip2).

## Requirements

- **PHP 5.4**
- **Yii 1.x**

### Examples

Global component configuration example:

```php
`components' => [
	'qTip2' => [
	    'class' => 'ext.qTip2.qTip2',
	    'options' => [
	        'position' => [
	            'my' => 'middle left',
	            'at' => 'middle right',
	        ]
	    ],
	],
]
```

Usage example:

```php
Yii::import('ext.qTip2.qTip2');
qTip2::apply('input[title], textarea[title], select[title]');

echo $form->fileField($model, 'example_field', [
    'title' => 'Example tooltip.',
]);
```
### Links

<https://github.com/russianlagman/yii-qtip2>
