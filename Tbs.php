<?php

/**
 * Tbs is a PHP class to generate Html components for twitter bootstrap layouts.
 *
 * @license MIT (see LICENSE for more info)
 *
 * @author Manuel Tancoigne
 */
class Tbs {

	/**
	 * @var string Icon pack name (glyphicon, fa, icon,...)
	 *
	 * Link to glyphicons: http://glyphicons.com/examples-of-use/
	 * Link to FontAwesome icons: http://fontawesome.io/
	 */
	public $iconPack = 'glyphicon';

	/**
	 * Defines the current form style.
	 * @var string
	 */
	public $formStyle = 'default';

	/**
	 * Default label width in a horizontal form. Can be overriden by formOpen()
	 * @var int
	 */
	public $formWidth = 3;

	/**
	 * CSS grid size
	 * @var int
	 */
	public $gridSize = 12;

	/**
	 * Current navbar id
	 * @var string
	 */
	private $_navbarId = null;

	/**
	 * Counter for some element's Ids.
	 * @var integer
	 */
	private $_idCounter = 0;

	/**
	 * Creates a button
	 *
	 * @param string $content Button content
	 * @param string $url target url
	 * @param array $options List of options
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#buttons Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the dropdown element
	 *  - size:  string, big|*standard|small|xsmall
	 *           Button size
	 *  - type:  string, *standard|primary|success|info|warning|danger|link|submit|reset
	 *           Button type
	 *  - tag:   string, *a|button|input
	 *           Button tag
	 *  - Other attributes that can apply to the "a" or "button" elements
	 *
	 * If no $url is provided, a button element is created instead of a link.
	 * Additionnal classes can be seen on the TBS CSS page: btn-block, active, disabled,...
	 * If tag is different than "a" and $url is set, tag will be "a"
	 */
	public function button($content, $url = null, $options = array()) {
		$defaults = array(
				'class' => null,
				'size' => 'standard',
				'type' => 'standard',
				'tag' => 'a',
		);
		// Get options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Base class
		$attributesList['class'] = 'btn ' . $optionsList['class'];

		// Size
		switch (strtolower($optionsList['size'])) {
			case 'big':
				$attributesList['class'].=' btn-lg';
				break;
			case 'small':
				$attributesList['class'].=' btn-sm';
				break;
			case 'xsmall':
				$attributesList['class'].=' btn-xs';
				break;
		}

		// Type
		switch ($optionsList['type']) {
			case 'primary':
				$attributesList['class'].=' btn-primary';
				break;
			case 'success':
				$attributesList['class'].=' btn-success';
				break;
			case 'info':
				$attributesList['class'].=' btn-info';
				break;
			case 'warning':
				$attributesList['class'].=' btn-warning';
				break;
			case 'danger':
				$attributesList['class'].=' btn-danger';
				break;
			case 'submit':
				$attributesList['class'].=' btn-primary';
				$optionsList['tag'] = 'input';
				$attributesList['type'] = 'submit';
				$url = null;
				break;
			case 'reset':
				$attributesList['class'].=' btn-danger';
				$optionsList['tag'] = 'input';
				$attributesList['type'] = 'reset';
				$url = null;
				break;
			default:
				$attributesList['class'].=' btn-default';
		}

		// Passing some options as attributes
		$attributesList['href'] = $url;
		// HTML Attributes
		// Special button type for standard inputs
		if ($optionsList['tag'] == 'input' && !isset($attributesList['type'])) {
			$attributesList['type'] = 'button';
		}
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		switch ($optionsList['tag']) {
			case 'a':
				return "<a{$attributes}>{$content}</a>";
				break;
			case 'input':
				return "<input{$attributes}/>";
				break;
			case 'button':
				return "<button{$attributes}>{$content}</button>";
		}
	}

	/**
	 * Creates a dropdown menu to be used with dropdown buttons, or alone...
	 * This method does not generate a button, just the dropdwon menu.
	 *
	 * @param array $list List of elements from dropdownItem()
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#dropdowns Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - align: string, *right|left
	 *           Toggles the dropdown orientation
	 *  - class: string, *null
	 *           Additionnal classes for the dropdown element
	 *  - Other attributes that can apply to the "ul" element
	 */
	public function dropdown($list, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'align' => 'right',
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "dropdown-menu {$optionsList['class']}";

		// Align
		$attributesList['class'] .= " dropdown-menu-{$optionsList['align']}";

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<ul{$attributes}>\n\t".implode("\n\t", $list)."</ul>\n";
	}

	/**
	 * Creates a dropdown menu item
	 *
	 * @param string $title
	 * @param string $url
	 * @param array $options
	 *
	 * @return string Item to pass in dropdown()'s $list
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the dropdown element
	 *  - type:  string, *default|divider|header
	 */
	public function dropdownItem($title = null, $url = '#', $options = array()) {
		$defaults = array(
				'class' => null,
				'type' => 'default',
		);
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = $optionsList['class'];

		// Type
		switch ($optionsList['type']) {
			case 'divider':
				$attributesList['class'].=' divider';
				$title = null;
				break;
			case 'header':
				$attributesList['class'].=' dropdown-header';
				break;
			default:
				$title = $this->link($title, $url, array('tabindex' => '-1'));
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<li{$attributes}>{$title}</li>";
	}

	/**
	 * Creates a group of buttons
	 *
	 * @param array $buttons List of buttons elements from button() or buttonDropdown()
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#btn-groups Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:         string    *null
	 *                   Additionnal classes for the button group
	 *  - size:          string    big|*standard|small|xsmall
	 *                   Button sizes. Don't define custom styles for the buttons, but define one for dropdowns.
	 */
	public function buttonGroup($buttons, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'size' => 'standard',
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "btn-group {$optionsList['class']}";

		// Size
		switch ($optionsList['size']) {
			case 'big':
				$attributesList['class'].=' btn-group-lg';
				break;
			case 'small':
				$attributesList['class'].=' btn-group-sm';
				break;
			case 'xsmall':
				$attributesList['class'].=' btn-group-xs';
				break;
			default:
				break;
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<div{$attributes}>";
		foreach ($buttons as $b) {
			$out.="\n$b";
		}
		$out.="\n</div>";

		return $out;
	}

	/**
	 * Creates a thumbnail
	 *
	 * @param string $src Image url
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#thumbnails Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:        string    *null
	 *                  Additionnal classes for the button group
	 *  - url           string, *null
	 *                  Destination url
	 *  - caption       string, *null
	 *                  Image description
	 *  - title         string, *file name
	 *                  Title attribute
	 *  - alt           string, *title option
	 *                  Alt attribute
	 *
	 */
	public function thumbnail($src, $options = array()) {
		$defaults = array(
				'class' => null,
				'url' => null,
				'caption' => null,
				'title' => null,
				'alt' => null,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "thumbnail {$optionsList['class']}";

		// Title
		if (!empty($optionsList['title'])) {
			$title = $optionsList['title'];
		} else {
			$title = pathinfo($src, PATHINFO_FILENAME);
		}

		// Alt
		if (!empty($optionsList['alt'])) {
			$alt = $optionsList['alt'];
		} else {
			$alt = $title;
		}

		// Image:
		$content = "<img data-src=\"{$src}\" title=\"{$title}\" alt=\"$alt\" />";

		// Url
		if (!empty($optionsList['url'])) {
			$content = "<a href=\"{$optionsList['url']}\">$content</a>";
		}

		if (!empty($optionsList['caption'])) {
			$content.='<div class="caption">' . $optionsList['caption'] . '</div>';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);
		return "<div{$attributes}>{$content}</div>";
	}

	/**
	 * Creates a thumbnails list
	 *
	 * @param string $thumbnails List of thumbnails from thumbnail()
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#thumbnails Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - mobileWidth:  int, *6
	 *                  Grid size for mobile display
	 *  - desktopWidth: int, *3
	 *                  Grid size for desktop displays
	 *  - tabletWidth:  int, *3
	 */
	public function thumbList($thumbnails, $options = array()) {
		$defaults = array(
				'mobileWidth' => 6,
				'desktopWidth' => 3,
				'tabletWidth' => 3,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);

		$content = null;
		foreach ($thumbnails as $t) {
			$content.="\n\t<div class=\"col-sm-{$optionsList['mobileWidth']} col-md-{$optionsList['tabletWidth']} col-lg-{$optionsList['desktopWidth']}\">\n\t\t$t\n\t</div>";
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<div class=\"row\"{$attributes}>\n\t{$content}\n</div>";
	}

	/**
	 * Creates a toolbar
	 *
	 * @param array $buttonGroups List of buttonGroup() items
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/components/#btn-groups-toolbar Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 * - class:         string    *null
	 *                   Additionnal classes for the button group
	 * - Other attributes that can apply to a "div" element.
	 *
	 */
	public function toolbar($buttonGroups, $options = array()) {
		$defaults = array(
				'class' => null,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "btn-toolbar {$optionsList['class']}";

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<div{$attributes}>";
		foreach ($buttonGroups as $v) {
			$out.="\n$v";
		}
		$out.="\n</div>";

		return $out;
	}

	/**
	 * Creates a button with a dropdown menu
	 *
	 * @param string title Button title
	 * @param array $dropdown Dropdown content from dropdown()
	 * @param array $buttonOptions List of options for the button (same as button())
	 * @param array $options List of options for the button wrapper
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#btn-dropdowns Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the button
	 *  - size:  string, big|*standard|small|xsmall
	 *           Button size
	 *  - type:  string, *standard|primary|success|info|warning|danger|link
	 *           Button type
	 *  - tag:   string, *a|button|submit|input
	 *           Button tag
	 *  - url:   string, *null
	 *           Button's URL
	 *  - split  bool, *false
	 *           Creates a split button dropdown
	 *  - dropup bool, *false
	 *           Creates a dropup variation.
	 *  - disabled bool, *false
	 *             Disables the button
	 * - Other attributes that can apply to a "div" element.
	 * If you want to make a split button with an URL, pass the "url" option in the $buttonOptions array
	 *
	 */
	public function buttonDropdown($title, $dropdown, $options = array()) {
		$defaults = array(
				'class' => null,
				'size' => 'standard',
				'type' => 'standard',
				'tag' => 'a',
				'url' => null,
				'split' => false,
				'dropup' => false,
				'disabled' => false
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = $optionsList['class'];
		// Prepare button options
		$btnOptions = array('class' => $optionsList['class']);

		// Type will be passed to button();
		$btnOptions['type'] = $optionsList['type'];

		// Tag will be passed to button();
		$btnOptions['tag'] = $optionsList['tag'];

		// Url will be passed to button()
		$url = $optionsList['url'];


		// Disabled will be passed to button()
		$btnOptions['disabled'] = $optionsList['disabled'];

		// Split
		$split = $optionsList['split'];

		// Dropup
		if ($optionsList['dropup'] === true) {
			$attributesList['class'].=' dropup';
		}

		$buttons = array();

		// Creating button
		if ($split) {
			$buttons[] = $this->button($title, $url, $btnOptions);
			$caretOptions = $btnOptions;
			$caretOptions['class'].=' dropdown-toggle';
			$caretOptions['data-toggle'] = 'dropdown';
			$buttons[] = $this->button('<span class="caret"></span><span class="sr-only">Toggle Dropdown</span>', null, $caretOptions);
		} else {
			// Updating button class and attributes:
			$btnOptions['class'].=' dropdown-toggle';
			$btnOptions['data-toggle'] = 'dropdown';
			$buttons[] = $this->button($title . ' <span class="caret"></span>', $url, $btnOptions);
		}

		// Creating dropdown
		$buttons[] = $dropdown;

		return $this->buttonGroup($buttons, array('class' => $optionsList['class'], 'size' => $optionsList['size']));
	}

	/**
	 * Creates an input element to be used in forms
	 *
	 * @param string $name Input name
	 * @param string $type Input type in text|password|datetime|datetime-local|date|month|time|week|number|email|url|search|tel|color|button|submit|checkbox|radio|select|static
	 * @param string $value Value
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#forms-controls Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:      string, *null
	 *                Additionnal class for the element
	 *  - default     bool, *false
	 *                Default state for a radio or checkbox element
	 *  - help        string, *null
	 *                Input description (useful for radios/checkboxes)
	 *  - disabled    bool, *false
	 *                Defines if the element is disabled.
	 *  - required    bool, *false
	 *                Defines if the field is required
	 *  - value       string, *null
	 *                Input value
	 *  - label       string, *$name
	 *                Label caption
	 *  - caption     string, *null
	 *                Radio/checkbox caption
	 *
	 * To create a select, use "inputSelect()" instead
	 *
	 */
	public function input($name, $type, $options = array()) {
		// Defaults:
		$defaults = array(
				'label' => $name,
				'class' => null,
				'default' => false,
				'help' => null,
				'disabled' => false,
				'required' => false,
				'value' => null,
				'caption' => null,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		$attributesList['id'] = $name;

		// Help/Description
		$help = $optionsList['help'];

		// Disabled state
		$disabled = null;
		if ($optionsList['disabled']) {
			$disabled = ' disabled';
		}

		// Required state
		$required = null;
		if ($optionsList['required']) {
			$required = ' required';
		}

		// Value
		$value = trim($optionsList['value']);

		// Value as attribute, to use only in some cases
		$attrValue = $this->_cleanAttribute('value', $value);

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Checked state (radio/checkbox)
		$checked = null;
		if ($optionsList['default']) {
			$checked = ' checked="checked"';
		}

		// Element
		$element = null;
		$textInputs = array('text', 'password', 'datetime', 'datetime-local', 'date', 'month', 'time', 'week', 'number', 'email', 'url', 'search', 'tel', 'color');
		if (in_array($type, $textInputs)) {
			// Input field
			$class = $this->_cleanStrings(array('form-control', $optionsList['class']));
			$element = "\n<input type=\"{$type}\" name=\"{$name}\" class=\"{$class}\"{$disabled}{$attrValue}{$attributes} />";
		} elseif ($type === 'static') {
			// Static field
			$class = $this->_cleanStrings(array('form-control-static', $optionsList['class']));
			$element = "\n<p class=\"{$class}\"$attributes>$value</p>";
		} elseif ($type === 'checkbox') {
			// Checkbox
			$class = $this->_cleanStrings(array('checkbox', $optionsList['class']));
			$element = "\n<div class=\"{$class}\">\n\t<label for=\"{$attributesList['id']}\">\n\t\t<input type=\"checkbox\" name=\"$name\"{$checked}{$attrValue}{$disabled}{$attributes} />{$optionsList['caption']}\n\t</label>\n</div>";
		} elseif ($type === 'radio') {
			// radio
			$class = $this->_cleanStrings(array('radio', $optionsList['class']));
			$element = "\n<div class=\"{$class}\">\n\t<label for=\"{$attributesList['id']}\">\n\t\t<input type=\"radio\" name=\"$name\"{$checked}{$attrValue}{$disabled}{$attributes} />{$optionsList['caption']}\n\t</label>\n</div>";
		} elseif ($type === 'textarea') {
			// Textareas
			$class = $this->_cleanStrings(array('form-control', $optionsList['class']));
			$element = "\n<textarea class=\"{$class}\" name=\"$name\"{$disabled}{$attributes}>$value</textarea>";
		} elseif ($type === 'submit') {
			// Updating options
			$options['tag'] = 'input';
			$options['type'] = 'submit';
			$options['name'] = $name;
			$options['value'] = $value;
			$element = $this->button($value, null, $options);
		} elseif ($type === 'reset') {
			$options['tag'] = 'input';
			$options['type'] = 'reset';
			$options['name'] = $name;
			$options['value'] = $value;
			$optionsList['label'] = null;
			$element = $this->button($value, null, $options);
		} elseif ($type === 'button') {
			$options['tag'] = 'input';
			$options['type'] = 'standard';
			$options['name'] = $name;
			$options['value'] = $value;
			$optionsList['label'] = null;
			$element = $this->button($value, null, $options);
		} elseif ($type === 'file') {
			// Files
			$element = "\n<input type=\"file\" name=\"$name\"{$disabled}{$attributes}/>";
		} else {
			// Default
			$class = $this->_cleanStrings(array('form-control', $optionsList['class']));
			$element = "\n<input type=\"text\" name=\"$name\" class=\"{$class}\"{$disabled}{$attrValue}{$attributes} />";
		}

		if (!empty($optionsList['label']) && !in_array($type, array('radio', 'checkbox', 'submit', 'reset', 'button'))) {
			$out = "<div class=\"form-group\">\n";
			$out.="\t<label for=\"{$attributesList['id']}\">{$optionsList['label']}</label>\n";
			$out.=$element . '</div>';
			return $out;
		} else {
			return $element;
		}
	}

	/**
	 * Creates a select input
	 *
	 * @param string $name Input name
	 * @param array $list List of elements. Should be like array('caption'=>'value', 'caption'=>'value')
	 * @param array $options List of options for the select element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#forms-controls Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:    string, *null
	 *              Additionnal classes for the button
	 *  - default:  string, *null
	 *              Default element's value.
	 *  - multiple: boolean, *false
	 *              Defines if the list is multiple or not
	 * If you want to make a split button with an URL, pass the "url" option in the $buttonOptions array
	 *
	 */
	public function inputSelect($name, $list, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'default' => null,
				'multiple' => false,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "form-control{$optionsList['class']}";

		$default = $optionsList['default'];

		// Multiple
		$multiple = null;
		if ($optionsList['multiple']) {
			$multiple = ' multiple';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "\n<select name=\"$name\"{$attributes}{$multiple}>";
		$out.= $this->_makeSelectList($list, $default);
		$out.="\n</select>";
		return $out;
	}

	/**
	 * Creates a list of options for a select element. Can be really recursive, but to be valid,
	 * you can't have sub-option groups...
	 *
	 * @param array $list List of elements (array(group=>array(element1=>val1), element2=>val2,...)
	 * @param string $default Default value to be selected
	 *
	 * @return string Html code for the options list
	 */
	private function _makeSelectList($list, $default = null) {
		$out = null;
		foreach ($list as $c => $v) {
			if (is_array($v)) {
				$out.="\n<optgroup label=\"$c\">";
				$out.=$this->_makeSelectList($v, $default);
				$out.="\n</optgroup>";
			} else {
				$selected = null;
				if ($v === $default) {
					$selected = ' selected="selected"';
				}
				$out.="\n\t<option value=\"$v\"$selected>$c</option>";
			}
		}
		return $out;
	}

	/**
	 * Opens a form
	 *
	 * @param array $name Form name
	 * @param array $options List of options for the button wrapper
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/css/#forms Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:       string, *null
	 *                 Additionnal classes for the button
	 *  - style:       string, *null|inline|horizontal
	 *                 Form display style
	 *  - width        int, *3|[1-11]
	 *                 Label width for horizontal forms
	 *  - file:        bool, *false
	 *                 Defines if the form contains a upload field.
	 *  - method:      string, *POST
	 *                 Default send method
	 *
	 */
	public function formOpen($name, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'style' => $this->formStyle,
				'width' => $this->formWidth,
				'file' => false,
				'method' => 'POST',
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "{$optionsList['class']}";

		// Style
		switch ($optionsList['style']) {
			case 'horizontal':
				$attributesList['class'].=' form-horizontal';
				break;
			case 'inline':
				$attributesList['class'].=' form-inline';
				break;
			default:
				break;
		}
		$this->formStyle = $optionsList['style'];

		// File
		if ($optionsList['file']) {
			$attributesList['enctype'] = 'multipart/form-data';
		}

		// Default method
		$attributesList['method'] = $optionsList['method'];

		// Horizontal forms: label width
		$this->formWidth = $optionsList['width'];

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);
		// Output
		return "<form{$attributes} role=\"form\">\n";
	}

	/**
	 * Closes an opened form. You can add a submit and a reset button in the $option array
	 *
	 * @param array $options A list of options
	 *
	 * @return string HTML code to display
	 *
	 * ---
	 * Options:
	 * --------
	 *  - submit    bool, *false
	 *              If true, a submit button will be created
	 *  - reset     bool, *false
	 *              If true, a reset button will be created
	 *
	 */
	public function formClose($options = array()) {
		// Defaults:
		$defaults = array(
				'submit' => false,
				'reset' => false,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);

		$out = null;
		// Submit
		if ($optionsList['submit']) {
			$out.=$this->input(null, 'submit');
		}
		// Reset
		if ($optionsList['reset']) {
			$out.=$this->input(null, 'reset');
		}

		return $out . "\n</form>";
	}

	/**
	 * Creates a form group : a label + an element. No need to use it for checkboxes.
	 * @param string $label Input label
	 * @param string $input Output from input() or inputSelect()
	 * @param array $options List of options
	 *
	 * @return string Html code to display
	 *
	 * @link  http://getbootstrap.com/css/#forms Link to the TBS documentation about this element
	 * ---
	 * Options:
	 * --------
	 *  - class:       string, *null
	 *                 Additionnal classes for the button
	 *  - style:       string, *null|inline|horizontal
	 *                 Form display style
	 *  - labelWidth : int, *2|[1-12]
	 *                 For horizontal display, the label width. Should be between 1 and 11
	 *                 in standard grid system.
	 */
	public function formGroup($label, $input, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'style' => $this->formStyle,
				'labelWidth' => $this->formWidth,
		);
	}

	/**
	 * Creates an input group
	 *
	 * @param string $input Input Html element from input()
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#input-groups Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function inputGroup($input, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
		);
	}

	/**
	 * Creates a nav item.
	 *
	 * @param type $content
	 * @param type $url
	 * @param type $options
	 * @return type
	 *
	 * ---
	 *
	 * Options
	 * -------
	 * - class:           string, *null
	 *                    Additionnal classes for the ol element
	 * - disabled:        bool, *false
	 *                    Defines if the item is enabled or not
	 * - active:          bool, *false
	 *                    Defines an item as the current item
	 * - url              string *#
	 *                    Url for this items
	 * - dropdown:        bool, *false
	 *                    Defines is the item is a dropdown item. If so, define the dropdownContent option.
	 * - dropdownContent: string *null
	 *                    Dropdown content from dropdown(). Use only if dropdown is set to true
	 *
	 */
	public function navItem($content, $options = array()) {
		$defaults = array(
				'class' => null,
				'disabled' => false,
				'active' => false,
				'url' => '#',
				'dropdown' => false,
				'dropdownContent' => null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = $optionsList['class'];

		// Enabled
		if ($optionsList['disabled']) {
			$attributesList['class'] .= ' disabled';
		}

		// Active
		if ($optionsList['active']) {
			$attributesList['class'] .= ' active';
		}

		// Dropdown & dropdown content
		$isDropdown = false;
		if ($optionsList['dropdown'] && !empty($optionsList['dropdownContent'])) {
			$attributesList['class'].=' dropdown';
			$content = "<a class=\"dropdown-toggle\" data-toggle=\"dropdown\" href=\"#\">\n\t$content<span class=\"caret\"></span></a>\n{$optionsList['dropdownContent']}";
			$isDropdown = true;
		}
		if (!$isDropdown) {
			$content = "<a href=\"{$optionsList['url']}\">{$content}</a>";
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<li{$attributes}>{$content}</li>";
	}

	/**
	 * Creates a tab list
	 *
	 * @param array $tabs List of elements like array('title'=>$title, 'content'=>$content)
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#nav Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 * - class:     string, *null
	 *              Additionnal classes for the ol element
	 * - type:      string *tabs|pills|stacked
	 *              Item type
	 * - justified: bool *false
	 *              Justify the items across the page
	 *
	 */
	public function nav($tabs, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'type' => 'tabs',
				'justified' => false,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "nav {$optionsList['class']}";

		switch ($optionsList['type']) {
			case 'pills':
				$attributesList['class'].=' nav-pills';
				break;
			case 'stacked':
				$attributesList['class'].= ' nav-pills nav-stacked';
				break;
			default:
				$attributesList['class'].=' nav-tabs';
				break;
		}

		// Align
		if ($optionsList['justified']) {
			$attributesList['class'].= ' nav-justified';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<ul{$attributes}>\n";
		foreach ($tabs as $t) {
			$out.="\t$t\n";
		}
		$out.="</ul>\n";
		return $out;
	}

	/**
	 * Creates a navbar element
	 *
	 * @param array $elements List of elements
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#navbar Link to the TBS documentation about this element
	 * ---
	 * Elements should be an array of navBrand(), navLink(), navForm(), navButton(), navText(), navTextLink()
	 *
	 * Options:
	 * --------
	 *  - class:         string, *null
	 *                   Additionnal classes for the ol element
	 *  - position:      string *default|fixedtop|fixedbottom|statictop
	 *                   Defines the navbar position. Remember to set a 60px padding to the body for fixed navbars.
	 *  - width:         string, *null|full
	 *                   Defines if the navbar takes the page width
	 *  - collapse:      bool, *true
	 *                   Defines if the navbar is responsive and collapses on small displays
	 *  - collapseTitle: string, *null, see _navBarCollapse()
	 *                   Alternative text for the collapse button
	 *  - inverse        bool, *false
	 *                   Defines the navbar color
	 *  - title          string *null
	 *                   Brand name
	 *  - url            string *#
	 *                   Link on brand name
	 *  - id             string , *null
	 *                   Id for the menu on responsive design. Leave it blank and it will create a "navbar-<number>" id
	 *
	 */
	public function navbar($elements, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'position' => 'default',
				'width' => null,
				'collapse' => true,
				'collapseTitle' => 'Toggle menu',
				'inverse' => false,
				'title' => $this->icon('home'),
				'url' => null,
				'id'=>null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = 'navbar ' . $optionsList['class'];

		// Generate id if none is provided
		if (is_null($optionsList['id'])) {
			$this->_navbarId = 'navbar-' . $this->_idCounter;
		} else {
			$this->_navbarId = $optionsList['id'];
		}

		// Position
		switch ($optionsList['position']) {
			case 'fixedtop':
				$attributesList['class'].=' navbar-fixed-top';
				break;
			case 'fixedbottom':
				$attributesList['class'].=' navbar-fixed-bottom';
				break;
			default:
		}

		// Width:
		switch ($optionsList['width']) {
			case 'full':
				$attributesList['class'].= ' navbar-static-top';
				break;
			default:
		}

		// Collapse
		$collapseButton = null;
		if ($optionsList['collapse']) {
			$collapseButton = $this->_navbarCollapse($optionsList['collapseTitle']);
		}

		// Inverse
		if ($optionsList['inverse'] === true) {
			$attributesList['class'].=' navbar-inverse';
		} else {
			$attributesList['class'].=' navbar-default';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Opening the navbar and container
		$out = "<nav{$attributes} role=\"navigation\">\n\t<div class=\"container-fluid\">";
		// Header (brand)
		$out.="\t\t<div class=\"navbar-header\">{$collapseButton}<a class=\"navbar-brand\" href=\"{$optionsList['url']}\">{$optionsList['title']}</a>\n</div>";
		// Elements
		if (!empty($elements)) {
			$collapse = ($optionsList['collapse']) ? ' class="collapse navbar-collapse"' : null;
			$out.="<div{$collapse} id=\"{$this->_navbarId}\">\n";
			foreach ($elements as $e) {
				$out.="\t{$e}\n";
			}
			$out.="</div>\n";
		}

		// End of navbar and container
		$out.="\t</div>\n</nav>";

		// Increment counter
		$this->_idCounter++;
		return $out;
	}

	/**
	 * Creates links to be used in navbars
	 *
	 * @param array $links List of links from link()
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to pass to navbar()
	 * ---
	 * Elements should be an array of navBrand(), navLink(), navForm(), navButton(), navText(), navTextLink()
	 *
	 * Options:
	 * --------
	 *  - class:  string, *null
	 *            Additionnal classes for the alert element
	 * No other options. Everything you pass in the option array will be used as HTML
	 * attribute for the wrapping "div" element.
	 */
	public function navbarLinks($links, $options = array()) {
		$defaults = array(
				'class' => null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "nav navbar-nav{$optionsList['class']}";
		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Output
		$out = "<ul{$attributes}>";
		foreach ($links as $l) {
			$out.="\n\t{$l}";
		}
		return $out . "\n</ul>\n";
	}

	/**
	 * Creates a link wrapped in a "li" tag, to be used in a list of links
	 *
	 * @param string $caption Link caption
	 * @param string $url Destination url
	 * @param array $options Other options for the "li" tag
	 *
	 * @return string HTML code
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:    string, *null
	 *              Additionnal classes for the alert element
	 *  - active:   bool, *null
	 *              Change the state of the link
	 *  - dropdown: string, *null
	 *              Dropdown element from dropdown()
	 *
	 */
	public function navbarLink($caption, $url, $options = array()) {
		$defaults = array(
				'class' => null,
				'active' => false,
				'dropdown' => null,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = $optionsList['class'];

		// Active state
		if ($optionsList['active']) {
			$attributesList['class'].=' active';
		}

		// Dropdown option
		$linkOptions = array();
		if (!empty($optionsList['dropdown'])) {
			$linkOptions['class'] = 'dropdown-toggle';
			$linkOptions['data-toggle'] = 'dropdown';
			$caption.=' <span class="caret"></span>';
			$optionsList['dropdown'] = "\n{$optionsList['dropdown']}\n";
			$url = '#';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<li{$attributes}>" . $this->link($caption, $url, $linkOptions) . $optionsList['dropdown'] . '</li>';
	}

	public function navbarForm($content, $options = array()) {

	}

	/**
	 * Returns a button tu use in navbar(). This is basically a wrapper for button()
	 *
	 * @param string $content Button content
	 * @param string $url target url
	 * @param array $options List of options
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#buttons Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the dropdown element
	 *  - size:  string, big|*standard|small|xsmall
	 *           Button size
	 *  - type:  string, *standard|primary|success|info|warning|danger|link|submit|reset
	 *           Button type
	 *  - Other attributes that can apply to the "a" or "button" elements
	 *
	 * If no $url is provided, a button element is created instead of a link.
	 * Additionnal classes can be seen on the TBS CSS page: btn-block, active, disabled,...
	 * If tag is different than "a" and $url is set, tag will be "a"
	 */
	public function navbarButton($content, $url=null, $options = array()) {
		$defaults = array(
				'class' => null, // this is the only parameter we change
		);
		// Get options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Base class
		$attributesList['class'] = 'navbar-btn' . $optionsList['class'];
		// Button tag
		$attributesList['tag']='button';

		return $this->button($content, $url, $attributesList);
	}

	/**
	 * Returns some... text to put in navbars.
	 *
	 * @param string $content The text
	 * @param array $options List of options
	 *
	 * @return string The HTML code to use in navbar()'s $content
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the dropdown element
	 *  - type:  string, *standard|primary|success|info|warning|danger|link|submit|reset
	 *           Button type
	 *  - Other attributes that can apply to the "a" or "button" elements
	 *
	 *
	 */
	public function navbarText($content, $options = array()) {
		$defaults=array(
				'class'=>null,
				'type'=>'standard',
		);
		// Get options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Base class
		$attributesList['class'] = 'navbar-text ' . $optionsList['class'];

		// Type
		switch($optionsList['type']){
			case 'primary':
				$attributesList['class'].=' text-primary';
				break;
			case 'info':
				$attributesList['class'].=' text-info';
				break;
			case 'success':
				$attributesList['class'].=' text-success';
				break;
			case 'warning':
				$attributesList['class'].=' text-warning';
				break;
			case 'danger':
				$attributesList['class'].=' text-danger';
				break;
		}

		// HTML attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<p{$attributes}>$content</p>";

	}

	/**
	 * Creates a navbar button that appears when the navbar is collapsed
	 *
	 * @param string $title Button title (appears on mouse over)
	 * @return string Button
	 */
	private function _navbarCollapse($title = null) {
		if (!$title) {
			$title = 'Toggle navigation';
		}
		return '<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#'.$this->_navbarId.'">
        <span class="sr-only">' . $title . '</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>';
	}

	/**
	 * Creates pagination links
	 *
	 * @param array $links List of links to display
	 * @param integer $current Key of the current link
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#pagination Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for this element
	 *  - size:  string, *default|big|small
	 *           Size variation
	 */
	public function paginator($links, $options = array()) {
		$defaults = array(
				'class' => null,
				'size' => 'default',
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "pagination {$optionsList['class']}";
		// Size
		switch ($optionsList['size']) {
			case 'small':
				$attributesList['class'].=' pagination-sm';
				break;
			case 'big':
				$attributesList['class'].=' pagination-lg';
				break;
		}
		// HTML attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<ul{$attributes}>\n";
		$out.=implode("\n\t", $links);
		$out.="</ul>\n";

		return $out;
	}

	/**
	 * Creates a link to use in paginator()
	 *
	 * @param string $title
	 * @param string $url
	 * @param array $options
	 *
	 * @return string HTML link
	 *
	 *
	 * @link  http://getbootstrap.com/components/#pagination Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:    string, *null
	 *              Additionnal classes for this element
	 *  - current:  int, *false
	 *              Defines if the element is the current element in list
	 *  - disabled: int, *false
	 *              Defines if the element is disabled or not.
	 */
	public function paginatorLink($title, $url, $options = array()) {
		$defaults = array(
				'class' => null,
				'current' => false,
				'disabled' => false,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = $optionsList['class'];

		// Current
		if ($optionsList['current']) {
			$attributesList['class'].=' active';
		}

		// Disabled
		if ($optionsList['disabled']) {
			$attributesList['class'].=' disabled';
		}

		// HTML attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);
		return "<li{$attributes}>" . $this->link($title, $url) . "</li>";
	}

	/**
	 * Creates pager links
	 *
	 * @param array $links List of the two links
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#pagination-pager Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function pager($links, $options = array()) {

	}

	/**
	 * Creates an icon
	 *
	 * @param string $icon Icon code
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#glyphicons Link to the TBS documentation about this element
	 * ---
	 *
	 * $icon depends on the icon pack you are using. I.e:
	 *       Glyphicon examples: http://glyphicons.com/examples-of-use/
	 *       FontAwesome examples: http://fontawesome.io/examples/
	 *
	 * Options:
	 * --------
	 * - class string *null
	 *         additionnal list of styles.
	 * - other attributes, as id, title,...
	 *
	 */
	public function icon($icon, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
		);
		// Icon pack
		$iPack = $this->iconPack;

		// Options
		$options = $this->_getOptions($defaults, $options);
		// Attributes
		$attributesList = $this->_getAttributes($defaults, $options);

		// Additionnal classes
		$attributesList['class'] = trim("{$iPack} {$iPack}-{$icon} {$options['class']}");
		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<span{$attributes}></span>";
	}

	/**
	 * Creates a label
	 *
	 * @param string $title Label title
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#labels Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the label element
	 *  - type:  string, *default|primary|success|info|warning|danger
	 *           label type
	 *
	 */
	public function label($content, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'type' => 'default',
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "label {$optionsList['class']}";

		switch (strtolower($optionsList['type'])) {
			case 'primary':
				$attributesList['class'].=' label-primary';
				break;
			case 'success':
				$attributesList['class'].=' label-success';
				break;
			case 'info':
				$attributesList['class'].=' label-info';
				break;
			case 'warning':
				$attributesList['class'].=' label-warning';
				break;
			case 'danger':
				$attributesList['class'].=' label-danger';
				break;
			default:
				$attributesList['class'].=' label-default';
				break;
		}
		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<span{$attributes}>$content</span>";
	}

	/**
	 * Creates a jumbotron element
	 *
	 * @param string $title Title
	 * @param string $content Content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#jumbotron Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class      string, *null
	 *               Additionnal classes for the main div
	 *
	 */
	public function jumbotron($title, $content, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "jumbotron {$optionsList['class']}";

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<div{$attributes}>\n";
		$out.="\t<div class=\"container\">\n";
		$out.="\t\t<h1>{$title}</h1>\n{$content}";
		$out.="\t</div>\n</div>\n";
		return $out;
	}

	/**
	 * Creates a header (H element)
	 *
	 * @param string $content Header content
	 * @param string $subtext Sub-text
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#page-header Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class      string, *null
	 *               Additionnal classes
	 *
	 */
	public function header($content, $subtext = null, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "page-header {$optionsList['class']}";

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		if (!is_null($subtext)) {
			$subtext = " <small>$subtext</small>";
		}
		return "\n<div{$attributes}>\n\t<h1>{$content}{$subtext}</h1></div>";
	}

	/**
	 * Creates a img element
	 *
	 * @param string $path Path to the image
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#thumbnails Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class      string, *null
	 *               Additionnal classes
	 *  - type       string, *null|round|circle|thumb
	 *               Image type
	 *  - responsive bool *false
	 *               Defines if the image is responsive or not. Use it for big pics
	 */
	public function image($path, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'type' => null,
				'responsive' => false,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "{$optionsList['class']}";

		// Type
		switch ($optionsList['type']) {
			case 'round':
				$attributesList['class'].=' img-rounded';
				break;
			case 'circle':
				$attributesList['class'].=' img-circle';
				break;
			case 'thumb':
				$attributesList['class'].=' img-thumbnail';
				break;
		}

		// Responsive
		if ($optionsList['responsive']) {
			$attributesList['class'].=' img-responsive';
		}

		// HTML Attributes
		$attributesList['class'] = trim($attributesList['class']);
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<img src=\"$path\"{$attributes}/>";
	}

	/**
	 * Creates an alert element. See jAlert() for a javascript one.
	 *
	 * @param string $content Alert content
	 * @param array $options List of options for this element
	 * @param string $dismisible Add a dismiss button to the element
	 * 			the text of $dismisible will be added to the button tag.
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#alerts Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:       string, *null
	 *                 Additionnal classes for the alert element
	 *  - type:        string, *success|info|warning|danger
	 *                 Alert type
	 *  - dismiss:     string, *null
	 *                 Makes the alert dismissible, and ads it the 'dismis' value as title
	 *
	 */
	public function alert($content, $options = array()) {
		$defaults = array(
				'class' => null,
				'type' => 'success',
				'dismiss' => null
		);

		// Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Attributes
		$attributesList = $this->_getAttributes($defaults, $options);

		// Base class:
		$attributesList['class'] = 'alert';
		// Additionnal class:
		$attributesList['class'] .= " {$optionsList['class']}";

		// Type
		switch ($optionsList['type']) {
			case 'success':
				$attributesList['class'] .= ' alert-success';
				break;
			case 'info':
				$attributesList['class'] .= ' alert-info';
				break;
			case 'warning':
				$attributesList['class'] .= ' alert-warning';
				break;
			case 'danger':
				$attributesList['class'] .= ' alert-danger';
				break;
		}

		// Dismissable state
		$dismiss = null;
		if (!is_null($optionsList['dismiss'])) {
			$attributesList['class'] .= ' alert-dismissible';
			$dismiss = "\n\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" title=\"{$optionsList['dismiss']}\"><span aria-hidden=\"true\">&times;</span><span class=\"sr-only\">{$optionsList['dismiss']}</span></button>";
		}

		// HTML attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<div{$attributes} role=\"alert\">$dismiss\n\t$content</div>";
	}

	/**
	 * Creates a badge
	 *
	 * @param string $content Badge content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#badges Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 * - class : string *null : additionnal list of styles.
	 *
	 */
	public function badge($content, $options = array()) {
		$defaults = array(
				'class' => null,
		);

		// Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Attributes
		$attributesList = $this->_getAttributes($defaults, $options);


		// Additionnal classes
		$attributesList['class'] = "badge {$optionsList['class']}";
		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<span{$attributes}>$content</span>";
	}

	/**
	 * Creates breadcrumb list. The last element will be the current active element
	 *
	 * @param array $elements List of elements
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#breadcrumbs Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:       string, *null
	 *                 Additionnal classes for the ol element
	 *
	 */
	public function breadcrumbs($elements, $options = array()) {
		// Defaults
		$defaults = array(
				'class' => null,
		);

		// Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Attributes
		$attributesList = $this->_getAttributes($defaults, $options);

		// Additionnal classes
		$attributesList['class'] = "breadcrumb {$optionsList['class']}";
		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Preparting output
		$lastOne = count($elements);
		$i = 1;
		$out = "<ol{$attributes}>";
		$itemClass = null;
		foreach ($elements as $e => $l) {
			$itemLink = $e;
			if ($i === $lastOne) {
				$itemClass = ' class="active"';
			}
			if (!empty($l)) {
				$itemLink = "<a href=\"$l\">$e</a>";
			}
			$out.="\t<li{$itemClass}>{$itemLink}</li>";
			$i++;
		}
		$out.="</ol>\n";
		return $out;
	}

	/**
	 * Creates a progress bar
	 *
	 * @param int $percentage Value
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#progress Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:   string, *null
	 *             Additionnal classes for the alert element
	 *  - label:   string, *null
	 *             Label
	 *  - min:     int, *0
	 *             Min value
	 *  - max:     int *100
	 *             Max value
	 *  - type:    string, *default|success|info|warning|danger
	 * 	           Color
	 *  - striped: bool, *false
	 *             Defines if the bar is stripped or not.
	 *  - animated: bool, *false
	 *              Defines if the bar is animated (and stripped, by the way)
	 *  - stacked:  bool, *false
	 *              Define it to true if this bar is in a stack
	 *
	 * If you want to create stacked bars, use progressBarStacked() and feed it with some bars.
	 */
	public function progressBar($percentage, $options = array()) {
		// Defaults
		$defaults = array(
				'class' => null,
				'label' => null,
				'min' => 0,
				'max' => 100,
				'type' => 'default',
				'striped' => false,
				'animated' => false,
				'stacked' => false,
		);
		// Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Additionnal classes
		$attributesList['class'] = "progress-bar {$optionsList['class']}";

		// Some base attributes:
		$attributesList['role'] = 'progressbar';
		$attributesList['aria-valuenow'] = $percentage;
		$attributesList['aria-valuemin'] = $optionsList['min'];
		$attributesList['aria-valuemax'] = $optionsList['max'];
		$attributesList['style'] = "width: {$percentage}%";

		// Screen reader additionnal string
		$srType = null;
		// Type
		switch ($optionsList['type']) {
			case 'success':
				$attributesList['class'].=' progress-bar-success';
				$srType = ' (success)';
				break;
			case 'info':
				$attributesList['class'].=' progress-bar-info';
				$srType = ' (info)';
				break;
			case 'warning':
				$attributesList['class'].=' progress-bar-warning';
				$srType = ' (warning)';
				break;
			case 'danger':
				$attributesList['class'].=' progress-bar-danger';
				$srType = ' (danger)';
				break;
		}

		// Label
		if (empty($optionsList['label'])) {
			$label = "<div class=\"sr-only\">{$percentage}%{$srType}</div>\n";
		} elseif ($optionsList['label'] === true) {
			$label = $percentage . '%';
		} else {
			$label = $optionsList['label'];
		}

		// Stripped
		if ($optionsList['striped'] || $optionsList['animated']) {
			$attributesList['class'].=' progress-bar-striped';
		}

		// Animated
		if ($optionsList['animated']) {
			$attributesList['class'] .= ' active';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$bar = "<div{$attributes}>\n\t{$label}\n</div>";
		if (!$optionsList['stacked']) {
			return $this->progressBarStack(array($bar));
		} else {
			return $bar;
		}
	}

	public function progressBarStack($bars) {
		$bars = implode("\n", $bars);
		return "<div class=\"progress\">{$bars}</div>";
	}

	/**
	 * Creates a media element
	 *
	 * @param string $source Path to the image
	 * @param string $content Media text
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#media Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:   string, *null
	 *             Additionnal classes for the alert element
	 *  - url:     string, *null
	 *             Target url
	 *  - alt:     string, *null
	 *             Alt. text for the image
	 *  - title:   string, *null
	 *             Media title (will be used as header too)
	 *  - list:    bool, *false
	 *             Defines if the media is in a list or not.
	 *
	 */
	public function mediaItem($source, $content, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'url' => null,
				'alt' => null,
				'title' => null,
				'list' => false,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add class to attributes
		$attributesList['class'] = "media {$optionsList['class']}";

		// Title
		$title = null;
		$blockTitle = null;
		if (!empty($optionsList['title'])) {
			$title = " title=\"{$optionsList['title']}\"";
			$blockTitle = "\n\t\t<h4 class=\"media-heading\">{$optionsList['title']}</h4>";
		}

		// List
		if ($optionsList['list']) {
			$tag = 'li';
		} else {
			$tag = 'div';
		}

		// Url
		$url = null;
		if (!empty($optionsList['url'])) {
			$url = " href=\"{$optionsList['url']}\"";
		}

		// Url
		$alt = null;
		if (!empty($optionsList['alt'])) {
			$alt = " href=\"{$optionsList['alt']}\"";
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<$tag{$attributes}>\n";
		$out.="\t<a class=\"pull-left\"><img class=\"media-object\" src=\"$source\"{$alt}{$title}></a>\n";
		$out.="\t<div class=\"media-body\">{$blockTitle}\n\t\t$content\n\t</div>\n";
		$out.="</$tag>\n";
		return $out;
	}

	/**
	 * Creates a media element
	 *
	 * @param array $list List of items and sub-items
	 * @param string $content Media text
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#media Link to the TBS documentation about this element
	 * ---
	 *
	 * Define your $list as follow:
	 * $list = array(
	 *   // Item 1
	 *   array('source'=>$source, 'content'=>$content, 'options'=$options),
	 *   // Item 2, with sub-list
	 *   array('source'=>$source, 'content'=>$content, 'options'=$options, 'list'=>array(
	 *       array('source'=>$source, 'content'=>$content, 'options'=$options),
	 *       array('source'=>$source, 'content'=>$content, 'options'=$options),
	 *       array('source'=>$source, 'content'=>$content, 'options'=$options, 'list'=>array(
	 *         ...
	 *       ),
	 *       ...
	 *     )
	 *     ...
	 *   ),
	 * 	 // Item 3
	 *   array('source'=>$source, 'content'=>$content, 'options'=$options),
	 *   ...
	 * );
	 *
	 * Options:
	 * --------
	 *  - class:   string, *null
	 *             Additionnal classes for the alert element
	 *
	 */
	public function mediaList($list, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "media-list{$optionsList['class']}";

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		$out = "<ul{$attributes}>\n";
		foreach ($list as $item) {
			$subList = null;
			// Forcing item to be a list item
			$item['options']['list'] = true;

			// Search for a sub list
			if (key_exists('list', $item)) {
				$subList = $this->mediaList($item['list'], $options);
			}
			$out.=$this->mediaItem($item['source'], $item['content'] . $subList, $item['options']);
		}
		$out.="</ul>\n";
		return $out;
	}

	/**
	 * Creates a list group
	 *
	 * @param array $items List of items with their options
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#list-group Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:   string, *null
	 *             Additionnal classes for the list main element
	 *  - linked:  bool, *false
	 *             Creates a linked items list
	 *
	 */
	public function listGroup($items, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'linked' => false,
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "list-group {$optionsList['class']}";

		// Tag choice
		if ($optionsList['linked']) {
			$tag = 'div';
		} else {
			$tag = 'ol';
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Output
		$out = "<{$tag}{$attributes}>\n";
		foreach ($items as $i) {
			$i[1]['linked'] = $optionsList['linked'];
			$out.="\t" . $this->_listItem($i[0], $i[1]);
		}
		$out.="</{$tag}>";
		return $out;
	}

	/**
	 *
	 * @param type $title
	 * @param type $options
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#list-group Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:    string, *null
	 *              Additionnal classes for the list element
	 *  - badge:    string, *null
	 *              HTML string for a badge (you should use badge() output)
	 *  - linked:   bool, *false
	 *              creates 'a' elements instead of 'li'
	 *  - url:      string, *#
	 *              Url for the link, if any
	 *  - disabled  bool, *false
	 *              Toggle the disabled state
	 *  - type      string, *default|success|info|warning|danger
	 *              Contextual class
	 *  - content   srting, *null
	 *              Custom content
	 */
	private function _listItem($title, $options = array()) {
		$defaults = array(
				'class' => null,
				'badge' => null,
				'linked' => false,
				'url' => '#',
				'disabled' => false,
				'type' => 'default',
				'content' => null,
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "list-group-item {$optionsList['class']}";


		// Linked
		if ($optionsList['linked']) {
			$tag = 'a';
		} else {
			$tag = 'li';
		}

		// Disabled
		if ($optionsList['disabled']) {
			$attributesList['class'].=' disabled';
		}

		// Type
		switch ($optionsList['type']) {
			case 'success':
				$attributesList['class'] .= ' list-group-item-success';
				break;
			case 'info':
				$attributesList['class'] .= ' list-group-item-info';
				break;
			case 'warning':
				$attributesList['class'] .= ' list-group-item-warning';
				break;
			case 'danger':
				$attributesList['class'] .= ' list-group-item-danger';
				break;
		}

		// Content
		if (!empty($optionsList['content'])) {
			$content = "\t\t{$optionsList['badge']}<h4 class=\"list-group-item-heading\">{$title}</h4>\n";
			$content .= "\t\t<p class=\"list-group-item-text\">{$optionsList['content']}</p>\n";
		} else {
			$content = $optionsList['badge'] . $title;
		}

		// Url
		if (!empty($optionsList['url'])) {
			if ($tag === 'a') {
				$attributesList['href'] = $optionsList['url'];
			} else {
				$title = "<a href=\"{$optionsList['url']}\">{$content}</a>";
			}
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Output
		return "<{$tag}{$attributes}>$content</$tag>";
	}

	/**
	 * Creates a panel element
	 *
	 * @param string $content Panel content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#panels Link to the TBS documentation about this element
	 * ---
	 *
	 * In your content, you can add lists (listGroup()) or tables in addition to your content.
	 *
	 * Options:
	 * --------
	 *  - class:   string    *null
	 *             Additionnal classes for the button group
	 *  - header:  string, *null
	 *             Adds a header string. Overides title.
	 *  - title:   string, *null
	 *             Adds a big header
	 *  - footer:  string, *null
	 *             Adds a footer note
	 *  - type:    string, *default|primary|success|info|warning|danger
	 *             Contextual variations
	 *
	 */
	public function panel($content, $options = array()) {
		$defaults = array(
				'class' => null,
				'header' => null,
				'title' => null,
				'footer' => null,
				'type' => 'default',
		);

		// Get options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Base class
		$attributesList['class'] = 'panel ' . $optionsList['class'];

		// Header/Title
		$title = null;
		if (!empty($optionsList['header']) && empty($optionsList['title'])) {
			$title = '<div class="panel-heading">' . $optionsList['header'] . '</div>';
		} elseif (!empty($optionsList['title'])) {
			$title = '<div class="panel-heading"><h3 class="panel-title">' . $optionsList['title'] . '</h3></div>';
		}

		// Footer
		$footer = null;
		if (!empty($optionsList['footer'])) {
			$footer = '<div class="panel-footer">' . $optionsList['footer'] . '</div>';
		}

		// Type
		switch ($optionsList['type']) {
			case 'primary':
				$attributesList['class'].=' panel-primary';
				break;
			case 'success':
				$attributesList['class'].=' panel-success';
				break;
			case 'info':
				$attributesList['class'].=' panel-info';
				break;
			case 'warning':
				$attributesList['class'].=' panel-warning';
				break;
			case 'danger':
				$attributesList['class'].=' panel-danger';
				break;
			default:
				$attributesList['class'].=' panel-default';
				break;
		}

		// Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		// Output
		return "<div{$attributes}>\n{$title}\n\t<div class=\"panel-body\">{$content}</div>\n{$footer}\n</div>";
	}

	/**
	 * Creates a responsive embedded element
	 *
	 * @param string $content Content of the embedded element (URL)
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#responsive-embed Link to the TBS documentation about this element
	 * ---
	 * It's nice to add a title in your options, in order to facilitate identification and navigation:
	 *   WCAG2 4.1.2 (A) http://www.w3.org/TR/WCAG20-TECHS/H64.html
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the alert element
	 *  - size:  string, *4:3|16:9
	 *           Element ratio
	 *
	 */
	public function embed($content, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'size' => '4:3',
		);
		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "embed-responsive {$optionsList['class']}";

		switch ($optionsList['size']) {
			case '16:9':
				$attributesList['class'].=' embed-responsive-16by9';
				break;
			case '4:3':
				$attributesList['class'].=' embed-responsive-4by3';
				break;
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);
		$out = "<div{$attributes}>\n";
		$out.="\t<iframe class=\"embed-responsive-item\" src=\"{$content}\"></iframe>\n";
		$out.='</div>';

		return $out;
	}

	/**
	 * Creates a well element
	 *
	 * @param string $content Well content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#wells Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the alert element
	 *  - size:  string *default|small|big
	 *           Well size
	 *
	 */
	public function well($content, $options = array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				'size' => 'standard',
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "well {$optionsList['class']}";

		switch ($optionsList['size']) {
			case 'big':
				$attributesList['class'].=' well-lg';
				break;
			case 'small':
				$attributesList['class'].=' well-sm';
				break;
		}

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<div{$attributes}>{$content}</div>\n";
	}

	// ---------------------------------------------------------------------------
	//
	// Javascript components
	//
	// ---------------------------------------------------------------------------

	/**
	 * Creates a modal javascript element.
	 *
	 * @param string $content Modal content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/javascript/#modals Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function jModal($content, $options = array()) {

	}

	/**
	 * @todo find how to write this.
	 *
	 * @link http://getbootstrap.com/javascript/#scrollspy Link to the TBS documentation about this element
	 */
	public function jScrollspy() {

	}

	/**
	 * Creates a javascript tabbed display element
	 *
	 * @param array $items List of items with their content.
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#tabs Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jTab($items, $options = array()) {

	}

	/**
	 * Creates a tooltip element
	 *
	 * @param string $content Content of the tooltip
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#tooltips Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jTooltip($content, $options = array()) {

	}

	/**
	 * Creates a popover element
	 *
	 * @param string $title Title
	 * @param string $content popover content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#popovers Link to the TBS documentation about this element
	 *  ---
	 */
	public function jPopover($title, $content, $options = array()) {

	}

	/**
	 * Creates a javascript alert (hum, not the javascript 'alert()' thing ^^)
	 *
	 * @param string $content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#alerts Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jAlert($content, $options = array()) {

	}

	/**
	 * Creates a javascript button
	 *
	 * @param string $content Button content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#buttons Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jButton($content, $options = array()) {

	}

	/**
	 * Creates a collapsable item list with content
	 *
	 * @param array $items List of items with their content
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#collapse Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jCollapse($items, $options = array()) {

	}

	/**
	 * Creates slides
	 *
	 * @param array $slides list of slides
	 * @param array $options List of options for this element
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/javascript/#carousel Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jCarousel($slides, $options = array()) {

	}

	/**
	 * @todo find how to write this.
	 *
	 * @link http://getbootstrap.com/javascript/#affix Link to the TBS documentation about this element
	 */
	public function jAffix() {

	}

	// ---------------------------------------------------------------------------
	//
	// Class methods
	//
	// ---------------------------------------------------------------------------

	/**
	 * Helper method to create links
	 *
	 * @param string $caption Link caption
	 * @param string $url Destination url
	 * @param array $options Other attributes for the "a" tag
	 *
	 * @return string Html code.
	 */
	public function link($caption, $url, $options = array()) {
		// Convert all the options as attributes
		$attributes = $this->_prepareHTMLAttributes($options);

		return "<a href=\"{$url}\"{$attributes}>{$caption}</a>";
	}

	/**
	 * Returns an array of html attributes
	 *
	 * @param array $defaults Defaults for the method
	 * @param array $defined Options passed to the method
	 *
	 * @return array List of attributes
	 */
	private function _getAttributes($defaults, $defined) {
		$options = array();
		$merge = array_merge($defaults, $defined);
		foreach ($defaults as $k => $u) {
			$options[$k] = $merge[$k];
		}
		return array_diff_key($defined, $options);
	}

	/**
	 * Returns a string to be added in an HTML tag, containing attributes.
	 *
	 * @param array $attributesList List of attributes
	 * @return string HTML attributes, as ' attr1="val1" attr2="val2" ...'
	 */
	private function _prepareHTMLAttributes($attributesList) {
		$attributes = null;
		foreach ($attributesList as $k => $v) {
			$attributes.=$this->_cleanAttribute($k, $v);
		}
		return $attributes;
	}

	/**
	 * Cleans attributes values. If not empty, returns the attributes and its values,
	 * to be added in a tag.
	 *
	 * @param string $name Attribute name
	 * @param string $value Value
	 *
	 * @return null|string
	 */
	private function _cleanAttribute($name, $value) {
		$value = preg_replace('/\s+/', ' ', trim($value));
		if (empty($value)) {
			return null;
		} else {
			$value = $value;
			return " $name=\"$value\"";
		}
	}

	/**
	 * Returns the list of options with their updated values
	 * @param array $defaults Default options for the method
	 * @param array $defined Defined options
	 * @return array An array of updated options
	 */
	private function _getOptions($defaults, $defined) {
		$options = array();
		$merge = array_merge($defaults, $defined);
		foreach ($defaults as $k => $u) {
			$options[$k] = $merge[$k];
		}
		return $options;
	}

	/**
	 * Implodes an array of strings and cleans extra spaces
	 *
	 * @param string $strings
	 *
	 * @return string Clean chain.
	 */
	private function _cleanStrings($strings = array()) {
		return $this->_cleanString(implode(' ', $strings));
	}

	/**
	 * Removes extra spaces in a string
	 *
	 * @param string $string String to clean
	 *
	 * @return string Clean string
	 */
	private function _cleanString($string) {
		$string = preg_replace('/\s+/', ' ', trim($string));
		return (empty($string)) ? null : $string;
	}

}
