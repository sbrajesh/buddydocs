<?php
class NHP_Options_font_style_select extends NHP_Options{	
	
	/**
	 * Field Constructor.
	 *
	 * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
	 *
	 * @since NHP_Options 1.0
	*/
	function __construct($field = array(), $value ='', $parent){
		
		parent::__construct($parent->sections, $parent->args, $parent->extra_tabs);
		$this->field = $field;
		$this->value = $value;
		
		
		
	
		
	}//function
	/**
	 * Field Render Function.
	 *
	 * Takes the vars and outputs the HTML for the field in the settings
	 *
	 * @since NHP_Options 1.0
	*/
	function render(){

		$class = (isset($this->field['class']))?'class="'.$this->field['class'].'" ':'';
		
		
		$style =array('normal','bold','inherit');
		echo '<select id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" '.$class.'rows="6" >';
		echo '<option value="'.$fonts->style.$style.'" '.selected($this->value, $fonts->style.$style, false).'>Default</option>';
			foreach($style as $variant){
		
				echo '<option value="'.$fonts->style.$variant.'" '.selected($this->value, $fonts->style.$variant, false).'>'.$fonts->style.'  '.$variant.'</option>';
			}
		
		echo '</select>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
	}//function
	
}//class
?>
