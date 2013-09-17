<?php
class NHP_Options_font_family_select extends NHP_Options{	
	
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
		
		
		$fonts =array('1'=>'Metrophobic','2'=>'Arial','3'=>'Racing Sans One','4'=>'Oregano','5'=>'serif','6'=>'sans-serif',
					  '7'=>'cursive','8'=>'fantasy','9'=>'monospace','10'=>'Antiqua','11'=>'Avqest','12'=>'Blackletter','13'=>'Calibri',
						'14'=>'Comic Sans','15'=>'Courier','16'=>'Decorative','17'=>'Fraktur','18'=>'Frosty','19'=>'Garamond','20'=>'Georgia',
						'21'=>'Helvetica','22'=>'Impact','23'=>'Minion','24'=>'Modern','25'=>'Palatino','26'=>'Roman','27'=>'Script','28'=>'Verdana');
		
		echo '<select id="'.$this->field['id'].'" name="'.$this->args['opt_name'].'['.$this->field['id'].']" '.$class.'rows="6" >';
		echo '<option value="'.$fonts->family.':'.$fonts.'" '.selected($this->value, $fonts->family.':'.$fonts, false).'>Default</option>';
			foreach($fonts as $variant){
				
				echo '<option value="'.$variant.'" '.selected($this->value, $variant, false).'>'.$fonts->family.'  '.$variant.'</option>';
			}
		
		echo '</select>';

		echo (isset($this->field['desc']) && !empty($this->field['desc']))?' <span class="description">'.$this->field['desc'].'</span>':'';
	}//function
	
}//class
?>
