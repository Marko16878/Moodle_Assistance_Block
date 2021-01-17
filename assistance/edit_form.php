<?php
 
class block_assistance_edit_form extends block_edit_form {
 
    protected function specific_definition($mform) {
 
        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));
 
        // A sample string variable with a default value.
        $mform->addElement('text', 'config_num', get_string('inputnum', 'block_assistance'));
        $mform->setDefault('config_num', '10');
        $mform->setType('config_num', PARAM_RAW);        
 
    }
}