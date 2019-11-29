<?php
class Validate{
    private $_passed = false,
        $_errors = array(),
        $_db = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public  function check($source, $items = array()){
        foreach ($items as $item => $rules){
            foreach ($rules as $rule => $rule_value){

                //$value is the data entered by the user
                $value = trim($source[$item]);
                $item = escape($item);

                if ($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } else if (!empty($value)){
                    switch ($rule){
                        case 'min':
                            if (strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters");
                            }
                            break;

                        case 'max':
                            if (strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters");
                            }
                            break;
                        case 'matches':
                            if ($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match {$item}");
                            }

                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if ($check->count()){
                                $this->addError("{$item} already registered");
                            }
                            break;
//                        case 'format':
////                            $profile_pic = Input::get('profile_pic');
//                            $profile_pic_type = Input::get($_FILES['profile_pic']['type']);
//                            $profile_pic_size = Input::get($_FILES['profile_pic']['size']);
//                            if ((($profile_pic_type != 'image/gif') || ($profile_pic_type != 'image/jpeg') || ($profile_pic_type != 'image/pjpeg') || ($profile_pic_type != 'image/png')) && ($profile_pic_size > 0) && ($profile_pic_size <= GW_MAXFILESIZE)) {
//                                $this->addError("{$item} invalid format");
//                            }
//                            break;
                    }
                }
            }
        }

        if (empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error){
        $this->_errors[] = $error;
    }

    public function errors(){
        return $this->_errors;
    }

    public function passed(){
        return $this->_passed;
    }
}