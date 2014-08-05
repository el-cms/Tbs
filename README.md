Tbs
===

A generic php helper class for [Twitter Bootstrap](http://getbootstrap.com/) components.

**Here is the [demo](http://experimentslabs.com/test/tbs/index.php) for the currently available components**

## Purpose
This helper is designed to be used in a generic PHP application (there is no wrapper for any CMS, but that may come if you want to do it :)).
The class is easily expandable for your own custom components.

## Usage:
Include the class in your project and create a `Tbs` object. Then, call it :)

```PHP
<?php
include 'Tbs.php';

$Tbs = new Tbs;
```

## Tests
The `demo/index.php` file contains tests, you can open it in your browser... (it uses a boilerplate template from [Initializr](http://www.initializr.com/))

## Help in the development/enhancement process
As the class is not totally finished, you are welcome to join the project !

## Methods that are ready:

 - [x] icon($icon, $options) *Displays an icon*
 - **Buttons:**
  - [x] button($content, $url, $options) *Displays a button*
  - [x] buttonGroup($buttons, $options) *Creates a group of buttons*
  - [x] buttonDropdown($title, $content, $buttonOptions, $dropdownOptions, $options) *Creates a dropdown button*
  - [x] toolbar($buttonGroups, $options) * Creates a toolbar*
 - [x] dropdown($content, $options) *Creates a dropdown menu*
 - [x] label($content, $options) *Creates a label*
 - [x] badge($content, $options) *Creates a badge*
 - [x] alert($content, $options) *Creates an alert block*
 - **Forms:**
  - [x] formOpen($name, $options) *Opens a form*
  - [x] input($name, $type, $value, $options) *Creates an input element*
   - [x] inputSelect($name, $list, $options) *Creates a select element*
   - *Help is wanted to find a way to do input groups and form-controls elements...*
   - *input() is not totally completed as it lacks of some bootstrap functionnalities.*
  - [x] formClose($options) *Closes a form*
 - [x] image($path, $options) *Creates a responsive image*
 - [x] breadcrumb($elements, $options) *Creates a breadcrumb*
 - [x] embed($content, $options) *Creates a responsive embed element*
 - [x] header($content, $subtext, $options) *Creates a header (big H1 with possible subtext)
 - [ ] inputGroup()
 - [ ] jAffix()
 - [ ] jAlert()
 - [ ] jButton()
 - [ ] jCarousel()
 - [ ] jCollapse()
 - [ ] jModal()
 - [ ] jPopover()
 - [ ] jScrollspy()
 - [ ] jTooltip()
 - [x] jumbotron($title, $content, $options) *Creates a hero unit*
 - [x] listgroup($items, $options) *Creates nice panels*
 - [x] media() *Creates a media element: an image with some text*
  - [ ] mediaList()
 - [ ] nav()
 - [ ] navBar()
 - [ ] pager()
 - [ ] paginator()
 - [ ] panel()
 - [ ] progressBar()
 - [ ] toolbar()
 - [ ] well()