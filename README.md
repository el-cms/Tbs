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
The `demo/index.php` file contains tests, you can open it in your browser... (it uses a boilerplate template from [Initializr](http://www.initializr.com/))

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
 - [x] image($path, $options) *Creates an image*
 - [ ] breadcrumbs()
 - [ ] embed()
 - [x] header($content, $subtext, $options)
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
 - [ ] jumbotron()
 - [ ] listGroup()
 - [ ] media()
 - [ ] nav()
 - [ ] navBar()
 - [ ] pager()
 - [ ] paginator()
 - [ ] panel()
 - [ ] progressBar()
 - [ ] toolbar()
 - [ ] well()