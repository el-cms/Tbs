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
	 *  - Other attributes that can apply to the "a" or "button elements
	 *
	 * If no $url is provided, a button element is created instead of a link.
	 * Additionnal classes can be seen on the TBS CSS page: btn-block, active, disabled,...
	 *
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
		}else{
			// Default
			$class.=' btn-default';
		}

		// Atrtibutes
		$attributes = '';
		foreach ($options as $k => $v) {
			$attributes.=" $k=\"$v\"";
		}

		if (!is_null($url)) {
			return "<a href=\"$url\" class=\"btn$class\"$attributes>$content</a>";
		}
		return "<button class=\"btn$class\"$attributes>$content</button>";
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

		if ($this->_optionCheck($options, 'align')) {
			$class .= " dropdown-menu-${$options['align']}";
			unset($options['align']);
		}

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
	 * @param array $buttons List of buttons elements from button()
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#btn-groups Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function buttonGroup($buttons, $options = array()) {

	}

	/**
	 * Creates a button with a dropdown menu
	 *
	 * @param string $button Button element from button()
	 * @param string $dropdown Dropdown element from dropdown()
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#btn-dropdowns Link to the TBS documentation about this element
	 * ---
	 *
	 * Options:
	 * --------
	 *
	 *
	 */
	public function buttonDropdown($button, $dropdown, $options = array()) {

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
	 *
	 *
	 */
	public function label($title, $options = array()) {

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
	 *
	 *
	 */
	public function badge($content, $options = array()) {

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
	 *
	 *
	 */
	public function alert($content, $options = array()) {

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
