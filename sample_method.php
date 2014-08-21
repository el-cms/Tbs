// This is a sample method to speed up the class development.

/**
 * Creates a button with a dropdown menu
 *
 * @param <type> <var> <desc>
 * @param array $options List of options for the button wrapper
 *
 * @return Html code to be displayed
 *
 * @link  http://getbootstrap.com/components/#<component> Link to the TBS documentation about this element
 * ---
 *
 * Options:
 * --------
 *  - class: string, *null
 *           Additionnal classes for the button
 *  - <otherComponents>
 * If you want to make a split button with an URL, pass the "url" option in the $buttonOptions array
 *
 */
public function <method>($var, $options=array()) {
		// Defaults:
		$defaults = array(
				'class' => null,
				<other defaults for the options>
		);

		// Get Options
		$optionsList = $this->_getOptions($defaults, $options);
		// Get Attributes
		$attributesList = $this->_getAttributes($defaults, $options);
		// Add classes to attributes
		$attributesList['class'] = "<base class> {$optionsList['class']}";

		/*
		 * Your logic goes here
		 */

		// HTML Attributes
		$attributes = $this->_prepareHTMLAttributes($attributesList);

		return "<span{$attributes}>{$content}</span>";
	}
}
