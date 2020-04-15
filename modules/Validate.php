<?php
    class Validate
    {
        private $errors,
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
                        $this->setError("{$rules["name"]} is required");
                    } else if(!empty($value)) {
                        switch ($ruleName) {

                            case "min":
                                if(strlen($value) < $rule) $this->setError("{$rules["name"]} must have at least {$rule} characters");
                                break;

                            case "max":
                                if(strlen($value) > $rule) $this->setError("{$rules["name"]} must be less than {$rule} characters");
                                break;

                            case "mail":
                                if(!filter_var($value, FILTER_VALIDATE_EMAIL)) $this->setError("please enter a valid {$rules["name"]}");
                                break;

                            case "match":
                                if($ruleName !== $rule) $this->setError("the {$rules["name"]} must match");
                                break;

                            case "regexp":
                                if(!preg_match($rules[$ruleName], $value)) {
                                    $this->setError("invalid {$rules["name"]}");
                                }

                            case "unique":
                                if($this->db->getOne("username", "'".$value."'", "user")->count() && preg_match("/^[a-zA-Z0-9]*$/", $value))
                                {
                                    $this->setError("{$rules["name"]} is already taken");
                                }
                                break;
                        }
                    }
                }
            }
            if(empty($this->errors)) $valid = true;
            return $this;
        }


        public function isValid()
        {
            return $this->valid;
        }

        private function setError($error)
        {
            $this->errors[] = $error;
        }
        public function getErrors()
        {
            return $this->errors;
        }
    }