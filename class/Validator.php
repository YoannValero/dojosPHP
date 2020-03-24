<?php

class Validator
{

    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }
    private function getField($field) 
    {
        if (!isset($this->data[$field])) {
            return null;
        }
        return $this->data[$field];
    }
    public function isAlpha($field, $errorMsg)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field)) ){
            $this->errors[$field] = $errorMsg;
        }
    }
    public function isUniq($field, $db, $table,$errorMsg)
    {
        $record = $db->query("SELECT id_user FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
            
        if ($record) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isEmail($field, $errorMsg) {
        // function filter_var qui test si c'est un émail second paramètre qui détermine le filtre à utiliser 
        // return true ou false
        if(!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isConfirmed($field, $errorMsg = '') {
        if(empty($this->getField($field)) || $this->getField($field) != $this->getField($field . "_confirm")) {
            $this->errors[$field] = $errorMsg;
            
        }
    }

    public function isValid() {
        // Si tableau vide return true donc pas de message d'erreurs
        return empty($this->errors);
    }
    public function getErrors() {
        // Si tableau vide return true donc pas de message d'erreurs
        return $this->errors;
    }
}
