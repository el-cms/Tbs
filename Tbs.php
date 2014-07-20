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
	 * @param array $options List of options
	 *
	 * @return string Html code to be displayed
	 *
	 * @link http://getbootstrap.com/css/#buttons Link to the TBS documentation about this element
	 * ---
	 *
	 */
	public function button($content, $options = array()) {

	}

	/**
	 * Creates a dropdown menu to be used with dropdown buttons, or alone...
	 *
	 * @param array $content List of elements.
	 * @param array $options List of options for this element
	 *
	 * @return Html code to be displayed
	 *
	 * @link  http://getbootstrap.com/components/#dropdowns Link to the TBS documentation about this element
	 * ---
	 *
	 */
	public function dropdown($content, $options = array()) {

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
	 * @link 	 * ---
	 *
	 */
	public function icon($icon, $options = array()) {

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

	}

}
