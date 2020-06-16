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