<?php
class block_assistance extends block_base {
    public function init() {
        $this->title = get_string('assistance', 'block_assistance');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    public function get_content() {
        if ($this->content !== null) {
          return $this->content;
        }

        $this->content         =  new stdClass;
        
        global $OUTPUT, $USER, $DB;
        $this->page->requires->js('/blocks/assistance/actionscript.js');
        
        
        if(has_capability('block/assistance:studentcap', $this->context)){
            $requested = $DB->record_exists('block_assistance',array('studentid'=>$USER->idnumber));
            if($requested){
                $this->content->text = 'Assistance Requested' . ': ' . $OUTPUT->action_link(new moodle_url('/blocks/assistance/removeajaxscript.php'),'Remove Request',new component_action('click','block_assistance_remassistance',array('studentid'=>$USER->idnumber)));
            }else{
                $this->content->text = $OUTPUT->action_link(new moodle_url('/blocks/assistance/actionajaxscript.php'),'Request Assistance',new component_action('click','block_assistance_reqassistance'));
            }
        }else{
            $num_of_requests_allowed = intval($this->config->num);
  
            $records = $DB->get_records('block_assistance',array(),'id DESC');
            $users='<ul>';
            foreach($records as $record){
                $users .= '<li>' . $record->studentname . ' ' . $record->studentid . ' ';
                $users .= $OUTPUT->action_link(new moodle_url('/blocks/assistance/removeajaxscript.php'),'Remove Request',new component_action('click','block_assistance_remassistance',array('studentid'=>$record->studentid))) . '</li>';
                $num_of_requests_allowed--;
                if($num_of_requests_allowed === 0){ break;}
            } 
            $users .='</ul>';
            $this->content->text = $users;
        }
        
        $this->content->footer = 'Use this block if you need to request assistance from teacher.';
        
        return $this->content;
    }
}