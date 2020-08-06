<?php


class Validator
{

    private $errors = [];
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field){
        if (!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
    }

    public function isPseudo($field, $errorMsg){
        if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $this->getField($field))){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isPassword($field, $errorMsg){
        if (!preg_match('/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/', $this->getField($field))){
            $this->errors[$field] = $errorMsg;
        }
    }
    public function isConfirmed($field, $errorMsg){
        $value = $this->getField($field);
        if (empty($value) || $value != $this->getField($field . '_confirm')){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isUniq($field, $db, $table, $errorMsg){
        $record = $db->query("SELECT id FROM $table WHERE $field = ?", [$this->getField($field)])->fetch();
        if ($record) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function isValid(){
        return empty($this->errors);
    }

    public function getErrors(){
        return $this->errors;
    }
}