<?php

/**
 * Tbs is a PHP class to generate Html components for twitter bootstrap layouts.
 *
 * @license MIT (see LICENSE for more info)
 *
 * @author Manuel Tancoigne
 */
class Tbs {

	// ---------------------------------------------------------------------------
	//
	// Configuration
	//
	// ---------------------------------------------------------------------------
	/**
	 * @var string Icon pack name (glyphicon, fa, icon,...)
	 *
	 * Link to glyphicons: http://glyphicons.com/examples-of-use/
	 * Link to FontAwesome icons: http://fontawesome.io/
	 */
	public $iconPack = 'glyphicon';

	// ---------------------------------------------------------------------------
	//
	// Buttons-related components
	//
	// ---------------------------------------------------------------------------

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
	 *  - type:  string, *standard|primary|success|info|warning|danger|link
	 *           Button type
	 *  - tag:   string, *a|button|submit|input
	 *           Button tag
	 *  - url:   string, *null
	 *           Button's URL
	 *  - Other attributes that can apply to the "a" or "button" elements
	 *
	 * If no $url is provided, a button element is created instead of a link.
	 * Additionnal classes can be seen on the TBS CSS page: btn-block, active, disabled,...
	 * If tag is different than "a" and $url is set, tag will be "a"
	 */
	public function button($content, $url = null, $options = array()) {
		//Class
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		// Size
		if ($this->_optionCheck($options, 'size')) {
			switch (strtolower($options['size'])) {
				case 'big':
					$class.=' btn-lg';
					break;
				case 'small':
					$class.=' btn-sm';
					break;
				case 'xsmall':
					$class.=' btn-xs';
					break;
				default:
					break;
			}
			unset($options['size']);
		}

		// Type:
		if ($this->_optionCheck($options, 'type')) {
			switch (strtolower($options['type'])) {
				case 'primary':
					$class.=' btn-primary';
					break;
				case 'success':
					$class.=' btn-success';
					break;
				case 'info':
					$class.=' btn-info';
					break;
				case 'warning':
					$class.=' btn-warning';
					break;
				case 'danger':
					$class.=' btn-danger';
					break;
			}
			unset($options['type']);
		} else {
			// Default
			$class.=' btn-default';
		}

		// Tag
		$inputType = null;
		$tag = null;
		if ($this->_optionCheck($options, 'tag')) {
			$tag = $options['tag'];
			unset($options['tag']);

			// Check for type and value option with "submit" or "input" tag
			if ($this->_optionCheck($options, 'type')) {
				if (in_array($tag, array('submit', 'input'))) {
					unset($options['type']);
					$options['value'] = $content;
				}
			}
		}

		// Atrtibutes
		$attributes = $this->_getAttributes($options);

		// Choose between link or button
		if (!is_null($url) || $tag === 'a') {
			return "<a href=\"$url\" class=\"btn$class\"$attributes>$content</a>";
		} else {
			$tag = 'button';
		}
		switch (strtolower($tag)) {
			case 'button':
				return "<button class=\"btn{$class}\"$attributes>$content</button>";
			case 'submit':
				return "<input type=\"submit\" class=\"$class\"$attributes/>";
			case 'input':
				return "<input type=\"button\" class=\"$class\"$attributes/>";
		}
	}

	/**
	 * Creates a dropdown menu to be used with dropdown buttons, or alone...
	 * This method does not generate a button, just the dropdwon menu.
	 *
	 * @param array $content List of elements. Should be links or %separator% or a
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
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
	 *
	 * Elements should be like "'title' => 'url'"
	 * To add a divider, add a "'someItem' => '%divider%'" item
	 * To add a menu header, add a "'headerTitle' => '%header%'" item
	 *
	 */
	public function dropdown($content, $options = array()) {
		// Additionnal classes
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		// Align
		if ($this->_optionCheck($options, 'align')) {
			$class .= " dropdown-menu-${$options['align']}";
			unset($options['align']);
		}

		// Attributes
		$attributes = $this->_getAttributes($options);

		// Opening list
		$list = "<ul class=\"dropdown-menu$class\"$attributes>\n\t";
		// Links list
		foreach ($content as $t => $l) {
			if ($l == "%divider%") {
				$list.="\t<li class=\"divider\"></li>\n";
			} elseif ($l == "%header%") {
				$list.="\t<li class=\"dropdown-header\">$t</li>\n";
			} else {
				$list.="\t<li><a tabindex=\"-1\" href=\"$l\">$t</a></li>\n";
			}
		}
		// Closing list
		$list.="</ul>\n";

		return $list;
	}

	/**
	 * Creates a group of buttons
	 *
	 * @param array $buttons List of buttons elements from button() or buttonDropdown()
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#btn-groups Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class:         string    *null
	 *                   Additionnal classes for the button group
	 *  - size:          string    *null|big|standard|small|xsmall
	 *                   Button sizes. Don't define custom styles for the buttons, but define one for dropdowns.
	 */
	public function buttonGroup($buttons, $options = array()) {
		//Class
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		// Size
		if ($this->_optionCheck($options, 'size')) {
			switch (strtolower($options['size'])) {
				case 'big':
					$class.=' btn-group-lg';
					break;
				case 'small':
					$class.=' btn-group-sm';
					break;
				case 'xsmall':
					$class.=' btn-group-xs';
					break;
				default:
					break;
			}
			unset($options['size']);
		}

		// Attributes
		$attributes = $this->_getAttributes($options);

		$out = "<div class=\"btn-group{$class}\"$attributes>";
		foreach ($buttons as $b) {
			$out.="\n$b";
		}
		$out.="\n</div>";

		return $out;
	}

	/**
	 * Creates a toolbar
	 *
	 * @param array $buttonGroups List of buttonGroup() items
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
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
		// Class
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		// Atrtibutes
		$attributes = $this->_getAttributes($options);

		$out = "<div class=\"btn-toolbar{$class}\"$attributes>";
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
	 * @return Html code to be displayed
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
	 * If you want to make a split button with an URL, pass the "url" option in the $buttonOptions array
	 *
	 */
	public function buttonDropdown($title, $dropdown, $options = array()) {
		// wrapper class
		// button class
		$btnClass = null;
		$btnOptions = array('class'=>null, 'url'=>null, 'tag'=>null, 'type'=>null);
		$url=null;

		// Type will be passed to button();
		if ($this->_optionCheck($options, 'type')) {
			$btnOptions['type'] = $options['type'];
			unset($options['type']);
		}

		// Tag will be passed to button();
		if ($this->_optionCheck($options, 'tag')) {
			$btnOptions['tag'] = $options['tag'];
			unset($options['tag']);
		}

		// Url will be passed to button()
		if ($this->_optionCheck($options, 'url')) {
			$url = $options['url'];
			unset($options['url']);
		}
		// Disabled will be passed to button()
		if ($this->_optionCheck($options, 'disabled')) {
			$btnOptions['disabled'] = $options['disabled'];
			unset($options['disabled']);
		}
		// Split
		$split = false;
		if ($this->_optionCheck($options, 'split') && $options['split'] === true) {
			$split = true;
			unset($options['split']);
		}

		// Dropup
		if ($this->_optionCheck($options, 'dropup') && $options['dropup'] === true) {
			if(!empty($options['class'])){
				$options['class'].='dropup';
			}else{
				$options['class']='dropup';
			}
			$options['class'].=' dropup';
			unset($options['dropup']);
		}

		// Attributes
		$attributes = $this->_getAttributes($options);

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

		return $this->buttonGroup($buttons, $options);
	}

	// ---------------------------------------------------------------------------
	//
	// Forms-related components
	//
	// ---------------------------------------------------------------------------

	/**
	 * Creates an input element to be used in forms
	 *
	 * @param string $name Input name
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#forms-example Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function input($name, $options = array()) {

	}


	public function form($inputs, $options){

	}

	/**
	 * Creates an input group
	 *
	 * @param string $input Input Html element from input()
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
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

	}

	// ---------------------------------------------------------------------------
	//
	// Navigation-related components
	//
	// ---------------------------------------------------------------------------

	/**
	 * Creates a tab list
	 *
	 * @param array $tabs List of elements
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#nav Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function nav($tabs, $options = array()) {

	}

	/**
	 * Creates a navbar element
	 *
	 * @param type $elements
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#navbar Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function navBar($elements, $options = array()) {

	}

	/**
	 * Creates breadcrumb
	 *
	 * @param array $elements List of elements
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#breadcrumbs Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function breadcrumbs($elements, $options = array()) {

	}

	/**
	 * Creates pagination links
	 *
	 * @param array $links List of links to display
	 * @param integer $current Key of the current link
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#pagination Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function paginator($links, $current, $options = array()) {

	}

	/**
	 * Creates pager links
	 *
	 * @param array $links List of the two links
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
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

	// ---------------------------------------------------------------------------
	//
	// Misc components
	//
	// ---------------------------------------------------------------------------

	/**
	 * Creates an icon
	 *
	 * @param string $icon Icon code
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#glyphicons Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 * - class string *null : additionnal list of styles. List depends on the icon pack you are using.
	 *         Glyphicon examples: http://glyphicons.com/examples-of-use/
	 *         FontAwesome examples: http://fontawesome.io/examples/
	 * - other attributes, as id, title,...
	 *
	 */
	public function icon($icon, $options = array()) {
		// Icon pack
		$iPack = $this->iconPack;

		// Additionnal classes
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class = ' ' . $options['class'];
			unset($options['class']);
		}

		// Other attributes
		$attributes = $this->_getAttributes($options);

		return "<span class=\"$iPack $iPack-$icon$class\"$attributes></span>";
	}

	/**
	 * Creates a label
	 *
	 * @param string $title Label title
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#labels Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the label element
	 *  - type:  string, *primary|success|info|warning|danger
	 *           label type
	 *
	 */
	public function label($content, $options = array()) {
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		if ($this->_optionCheck($options, 'type')) {
			switch (strtolower($options['type'])) {
				case 'primary':
					$class.=' label-primary';
					break;
				case 'success':
					$class.=' label-success';
					break;
				case 'info':
					$class.=' label-info';
					break;
				case 'warning':
					$class.=' label-warning';
					break;
				case 'danger':
					$class.=' label-danger';
					break;
			}
			unset($options['type']);
		} else {
			// Default
			$class.=' label-default';
		}

		return "<span class=\"label{$class}\">$content</span>";
	}

	/**
	 * Creates a badge
	 *
	 * @param string $content Badge content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
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
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class.=" ${options['class']}";
			unset($options['class']);
		}

		return "<span class=\"badge{$class}\">$content</span>";
	}

	/**
	 * Creates a jumbotron element
	 *
	 * @param string $title Title
	 * @param string $content Content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#jumbotron Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function jumbotron($title, $content, $options = array()) {

	}

	/**
	 * Creates a header (H element)
	 *
	 * @param string $content Header content
	 * @param int $level Header level (1,2,3,4,5 or 6)
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#page-header Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function header($content, $level, $options = array()) {

	}

	/**
	 * Creates a thumbnail element
	 *
	 * @param string $path Path to the image
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#thumbnails Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function thumbnail($path, $options = array()) {

	}

	/**
	 * Creates an alert element. See jAlert() for a javascript one.
	 *
	 * @param string $content Alert content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#alerts Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *  - class: string, *null
	 *           Additionnal classes for the alert element
	 *  - type:  string, *success|info|warning|danger
	 *           alert type
	 * - dismiss: string, *null
	 *            If not null, a dismiss button will be create.
	 *            The string value will be added to the button tag.
	 *
	 */
	public function alert($content, $options = array()) {
		$class = null;
		if ($this->_optionCheck($options, 'class')) {
			$class .= " ${options['class']}";
			unset($options['class']);
		}

		if ($this->_optionCheck($options, 'type')) {
			switch (strtolower($options['type'])) {
				case 'success':
					$class .= ' alert-success';
					break;
				case 'info':
					$class .= ' alert-info';
					break;
				case 'warning':
					$class .= ' alert-warning';
					break;
				case 'danger':
					$class .= ' alert-danger';
					break;
			}
			unset($options['type']);
		}

		$dismiss = null;
		if ($this->_optionCheck($options, 'dismiss')) {
			$dismiss .= " ${options['dismiss']}";
			unset($options['dismiss']);
		}

		if ($dismiss != '') {
			$class .= ' alert-dismissible';
			$dismiss = '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">' . $dismiss . '</span></button>';
		}

		return "<div class=\"alert{$class}\" role=\"alert\">
			$dismiss
			$content</div>";
	}

	/**
	 * Creates a progress bar
	 *
	 * @param float $percent Percentage
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#progress Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function progressBar($percent, $options = array()) {

	}

	/**
	 * Creates a media element
	 *
	 * @param string $source Path to the media
	 * @param string $content Media text
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#media Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function media($source, $content, $options = array()) {

	}

	/**
	 * Creates a list group
	 *
	 * @param array $items List of items
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#list-group Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function listGroup($items, $options) {

	}

	/**
	 * Creates a panel element
	 *
	 * @param string $content Panel content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#panels Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function panel($content, $options) {

	}

	/**
	 * Creates a responsive embedded element
	 *
	 * @param string $content Content of the embedded element
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#responsive-embed Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function embed($content, $options) {

	}

	/**
	 * Creates a well element
	 *
	 * @param string $content Well content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#wells Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function well($content, $options) {

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
	 * @return Html code to be displayed
	 *
	 * @link http://getbootstrap.com/javascript/#modals Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function jModal($content, $options) {

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
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#tabs Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jTab($items, $options) {

	}

	/**
	 * Creates a tooltip element
	 *
	 * @param string $content Content of the tooltip
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#tooltips Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jTooltip($content, $options) {

	}

	/**
	 * Creates a popover element
	 *
	 * @param string $title Title
	 * @param string $content popover content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#popovers Link to the TBS documentation about this element
	 *  ---
	 */
	public function jPopover($title, $content, $options) {

	}

	/**
	 * Creates a javascript alert (hum, not the javascript 'alert()' thing ^^)
	 *
	 * @param string $content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#alerts Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jAlert($content, $options) {

	}

	/**
	 * Creates a javascript button
	 *
	 * @param string $content Button content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#buttons Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jButton($content, $options) {

	}

	/**
	 * Creates a collapsable item list with content
	 *
	 * @param array $items List of items with their content
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link 	http://getbootstrap.com/javascript/#collapse Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jCollapse($items, $options) {

	}

	/**
	 * Creates slides
	 *
	 * @param array $slides list of slides
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link http://getbootstrap.com/javascript/#carousel Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 */
	public function jCarousel($slides, $options) {

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
	 * Return true if a given option is defined in the $options list. Else, returns false.
	 *
	 * @param array $options List of options given to the method
	 * @param string $option Option to check
	 *
	 * @return bool
	 */
	private function _optionCheck($options, $option) {
		return (isset($options[$option]) && !empty($options[$option]));
	}

	private function _getAttributes($options) {
		$attributes = null;
		foreach ($options as $k => $v) {
			$attributes.=" $k=\"$v\"";
		}
		return $attributes;
	}

}
