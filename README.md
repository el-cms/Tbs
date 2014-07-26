Tbs
===

A php class for Twitter [Bootstrap](http://getbootstrap.com/) components

**THIS IS IN EARLY DEVELOPMENT STAGE** *Help is welcome*

**A testing demo can be found [here](http://experimentslabs.com/test/tbs/index.php)**
## Usage:
Include the class in your project and create a `Tbs` object. Then, call it :)

```PHP
<?php
include 'Tbs.php';

$Tbs = new Tbs;
```

## Tests
The `test.php` file contains tests, you can open it in your browser... (it uses a boilerplate template from [Initializr](http://www.initializr.com/))

## Methods that are ready:

 - [x] icon($icon, $options) **Displays an icon**
 - [x] button($content, $url, $options) **Displays a button**
 - [x] dropdown($content, $options) **Creates a dropdown menu**
 - [x] buttonGroup($buttons, $options) **Creates a group of buttons**
 - [x] dropdownButton($title, $content, $buttonOptions, $dropdownOptions, $options) **Creates a dropdown button**
 - [x] label($content, $options) **Creates a label**
 - [x] badge($content, $options) **Creates a badge**
 - [x] alert($content, $options) **Creates an alert block**