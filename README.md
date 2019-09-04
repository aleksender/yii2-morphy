yii2-morphy
============

[![GitHub tag](https://img.shields.io/github/tag/aleksender/yii2-morphy.svg?label=latest)](https://packagist.org/packages/aleksender/yii2-morphy)

Morphological analyze package for Yii2 Framework based on phpMorphy


## Installation

To install the library in your project using `Composer`, first add the following to your `composer.json`
config file:
```
{
    "require": {
        "aleksender/yii2-morphy": "~1.0"
    }
}
```
Then run Composer's install or update commands to complete installation.

Or you can install from a command line:
```
composer require aleksender/yii2-morphy
```

## Usage

Completely similar phpMorphy.

```php
$morphy = new \aleksender\yii2-morphy\PhpMorphy();
$word = "КОТ";

if ($paradigms = $morphy->findWord($word)) {
    foreach ($paradigms as $paradigm) {
        foreach ($paradigm as $form) {
            echo $form->getWord() . "\n";
        }
    }
}
```


Or you can use like component:
- config/main.php
```php
[
    ...
    'components' => [
        ...
        'morphy' => [
            'class' => \aleksender\yii2-morphy\PhpMorphy::class,
            'lang' => 'ru',
        ],
        ...
        
    ],
    ...
]
```
```php
$morphy = Yii::$app->morphy;
$word = "КОТ";

if ($paradigms = $morphy->findWord($word)) {
    foreach ($paradigms as $paradigm) {
        foreach ($paradigm as $form) {
            echo $form->getWord() . "\n";
        }
    }
}
```