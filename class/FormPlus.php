<?php
require_once("Form.php");

class FormPlus extends Form
{
    public function __construct() {
        parent::__construct();
    }

    public function checkbox_radio($label, $name, $id=false, $type="checkbox", $checked=false)
    {
        $checked = $checked ? "checked" : "";
        $id = $id ? $id : "";
        $type = $type == "checkbox" ? "checkbox" : "radio";
        $this->_form_html .= "<label for='$name'>$label</label>";
        $this->_form_html .= "<input type='$type' name='$name' id='$id' $checked><br>";
    }
}
/*
$form = new FormPlus();
$form->checkbox_radio("checkbox 1 label", "checkbox", "id=3", "radio");
$form->checkbox_radio("checkbox 2 label", "checkbox", "id=3", "radio", True);
echo $form->getForm();
*/
