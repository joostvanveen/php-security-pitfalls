<?php
/**
 * This code is part of the Tutsplus course PHP Security Pitfalls. 
 * It is meant for demonstration purposes only. 
 * Do not use this code in a production environment!
 */
 
 class Validation {
    
    public $errors = array();
    
    public function validate($data, $rules) {
        
        $valid = TRUE;
        
        foreach ($rules as $fieldname => $rule) {
            // Extract rules to callbacks
            $callbacks = explode('|', $rule);
            
            // Call the validation callbacks
            foreach ($callbacks as $callback) {
                $value = isset($data[$fieldname]) ? $data[$fieldname] : NULL;
                if ($this->$callback($value, $fieldname) == FALSE) $valid = FALSE;
            }
        }
        
       return $valid;
    }
    
    public function email($value, $fieldname) {
        $valid = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($valid  == FALSE) $this->errors[] = "The $fieldname needs to be a valid email";
        return $valid;
    }
    
    public function required($value, $fieldname) {
        $valid = !empty($value);
        if ($valid  == FALSE) $this->errors[] = "The $fieldname is required";
        return $valid;
    }
    
    public function environment($value, $fieldname) {
        $values = array('admin', 'frontend');
        $valid = in_array($value, $values);
        if ($valid  == FALSE) $this->errors[] = "The $fieldname was not correct";
        return $valid;
    }
    
    public function example($value, $fieldname) {
        $string = '@example.com';
        $valid = $string == substr($value, strrpos($value, $string));
        if ($valid  == FALSE) $this->errors[] = "The $fieldname was not a valid email";
        return $valid;
    }
}