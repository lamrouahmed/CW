<?php
    class Validate
    {
        private $errors = [],
                $db,
                $valid = false;

        public function __construct()
        {
            $this->db = DB::connect();
        }


        public function check($method, $fields)
        {
            $regExps = [
                "discover" => "^(?:6011|65\\d{0,2}|64[4-9]\\d?)\\d{0,12}",
                "mastercard" => "^(5[1-5]\\d{0,2}|22[2-9]\\d{0,1}|2[3-7]\\d{0,2})\\d{0,12}",
                "maestro" => "^(?:5[0678]\\d{0,2}|6304|67\\d{0,2})\\d{0,12}",
                "visa" => "^4\\d{0,15}",
                "unionpay" => "^62\\d{0,14}",
            ];




















            foreach ($fields as $field => $rules) {
                foreach ($rules as $ruleName => $rule) {
                    $value =  escape(Input::get($field));
                    if(empty($value) && $ruleName === "name") {
                        $this->setError("{$rules["name"]} is required", $field);
                    } else if(!empty($value)) {
                        switch ($ruleName) {

                            case "min":
                                if(strlen($value) < $rule) $this->setError("{$rules["name"]} must have at least {$rule} characters", $field);
                                break;

                            case "max":
                                if(strlen($value) > $rule) $this->setError("{$rules["name"]} must be less than {$rule} characters", $field);
                                break;

                            case "mail":
                                if(!filter_var($value, FILTER_VALIDATE_EMAIL)) $this->setError("please enter a valid {$rules["name"]}", $field);
                                break;

                            case "match":
                                if(Input::get($field) !== Input::get($rule)) $this->setError("the password must match", $field);
                                break;

                            case "regexp":
                                if(!preg_match($rules[$ruleName], $value)) {
                                    $this->setError("invalid {$rules["name"]}", $field);
                                }
                                break;  
                            case "unique":
                                if($this->db->getOne("username", "'".$value."'", "user")->count() && preg_match("/^[a-zA-Z0-9]*$/", $value))
                                {
                                    $this->setError("{$rules["name"]} is already taken", $field);
                                }
                                break;
                            case "update":
                                if($this->db->getOne("username", "'".$value."'", "user")->count() && preg_match("/^[a-zA-Z0-9]*$/", $value) && $rule !== $this->db->getOne("username", "'".$value."'", "user")->results()[0]->u_id)
                                {
                                    $this->setError("{$rules["name"]} is already taken", $field);
                                }
                            break;
                            case "exists":
                                if($this->db->getOne("type_lavage", "'".$value."'", "lavage")->count())
                                {
                                    $this->setError("{$rules["name"]} doesn't exists", $field);
                                }
                            break;
                            case "date":
                                if($value < explode(' ', Config::getDate())[0])
                                {
                                    $this->setError("{$rules["name"]} invalide", $field);
                                }
                            break;
                            case "credit_card":            
                                    if(!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|6(?:011|5[0-9]{2})[0-9]{12}(?:2131|1800|35\d{3})\d{11})$/", str_replace(' ', '', $rules[$ruleName]))) 
                                    {
                                        $this->setError("invalid {$rules["name"]}", $field);
                                    }                               
                            break;
                            case "cvv":            
                                    if(!preg_match("/^[0-9]{3,4}$/", str_replace(' ', '', $rules[$ruleName]))) 
                                    {
                                        $this->setError("invalid {$rules["name"]}", $field);
                                    }                               
                            break;
                            case "expiry":   
                                    if(!preg_match("/^(0[1-9]|1[0-2])\/?([0-9]{2})$/", str_replace(' ', '', $rules[$ruleName]))) 
                                    {
                                        $this->setError("invalid {$rules["name"]}", $field);
                                    }                               
                            break;
                            
                         

                        }
                    }
                }
            }
            if(empty($this->errors)) $this->valid = true;
            return $this;
        }


        public function isValid()
        {
            return $this->valid;
        }

        public function setError($error, $errorName)
        {
            $this->errors +=  [$errorName => $error];
        }
        public function getErrors()
        {
            return $this->errors;
        }
    }



                                  
    
    /*
        !password_verify(Input::get($field),$this->db->getOne("username", "'".$value."'", "user")->results()[0]->password)
*/