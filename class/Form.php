<?php

class Form
{
    /**
     * Attributs
     */
    protected $_form_html = "";

    /**
     * Form constructor.
     * @param string $action
     * @param string $method
     */
    public function __construct($action="#", $method="POST")
    {
        $this->_form_html = "<form action='$action' method='$method'><fieldset>";
    }

    /**
     * return HTML form
     * @return string
     */
    public function getForm()
    {
        $this->_form_html .= "</fieldset></form>";
        return $this->_form_html;
    }

    /**
     * Add new text area to form
     */
    public function setText($name, $label, $required=false, $password=false, $value="", $readonly=false)
    {
        $readonly = $readonly ? "readonly" : "";
        $type = $password ? "password" : "text";
        $required = $required ? "required" : "";

        $this->_form_html .= "<div class=\"form-group\"><label for='$name'>$label</label>";
        $this->_form_html .=  "<input type='$type' name='$name' class=\"form-control\" value='$value' $readonly $required></div>";
    }

    public function setDropdown($array_value, $label, $name)
    {
        $this->_form_html .= "<div class=\"form-group\"><label for='$name'>$label</label>";
        $this->_form_html .= "<select class='form-control' name='$name'>";
        foreach($array_value as $value)
        {
            $option_value = trim(strtolower($value));
            $this->_form_html .= "<option value='$option_value'>$value</option>";
        }
        $this->_form_html .= "</select></div>";
    }

    public function setTextArea($name, $label, $required=false, $value="", $readonly=false)
    {
        $readonly = $readonly ? "readonly" : "";
        $required = $required ? "required" : "";

        $this->_form_html .= "<div class=\"form-group\"><label for='$name'>$label</label>";
        $this->_form_html .=  "<textarea name='$name' class=\"form-control\" value='$value' $readonly $required></textarea></div>";
    }


    /**
     * Add submit button
     */
    public function setSubmit($value="Submit")
    {
        $this->_form_html .= "<input type='submit' class='btn btn-primary' value='$value'>";
    }

    public function setLegend($legend)
    {
        $this->_form_html .= "<legend>$legend</legend>";
    }

}

/*
$form = new Form();
$form->setLegend("Formulaire calendrier");
$form->setDropdown(["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"]);

$years = [];
for($i=2014; $i<=2024; $i++)
{
    $years[] = $i;
}
$form->setDropdown($years);
$form->setSubmit("Envoyer");
echo $form->getForm();
*/