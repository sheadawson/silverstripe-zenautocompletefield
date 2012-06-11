<?php
/**
 * Text input field.
 * @package forms
 * @subpackage fields-basic
 */
class  ZenAutoCompleteField extends TextField {
	
	protected $suggestions; 

	/**
	 * Returns an input field, class="text" and type="text" with an optional maxlength
	 */
	function __construct($name, $title = null, $value = "", $maxLength = null, $form = null){
		parent::__construct($name, $title, $value, $form);
	}
	
	/**
	 * @param array
	 */
	function setSuggestions(Array $suggestions) {
		$this->suggestions = $suggestions;
	}
	
	function Field() {
		if($this->suggestions){
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery.ui.core.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery.ui.widget.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery.ui.position.js');
			Requirements::javascript(THIRDPARTY_DIR . '/jquery-ui/jquery.ui.autocomplete.js');
			Requirements::customScript($this->getJavascript());	
		}

		$attributes = array(
			'type' => 'text',
			'class' => 'text' . ($this->extraClass() ? $this->extraClass() : ''),
			'id' => $this->id(),
			'name' => $this->Name(),
			'value' => $this->Value(),
			'tabindex' => $this->getTabIndex(),
			'maxlength' => ($this->maxLength) ? $this->maxLength : null,
			'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null 
		);
		
		if($this->disabled) $attributes['disabled'] = 'disabled';
		
		return $this->createTag('input', $attributes);
	}
	
	protected function getJavascript(){
		$suggestions = implode('","', $this->suggestions);
		$suggestions = '"' . $suggestions . '"';
		return '(function($){
			$(function() {
				var ' . $this->id() .'_suggestions = [
					'. $suggestions .'
				];
				$( "#'.$this->id().'" ).autocomplete({
					source: ' . $this->id() .'_suggestions
				});
			});
		})(jQuery);';	
	}
	
}
