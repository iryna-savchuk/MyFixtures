<?php

abstract class AbstractAR {

    protected $className;
    protected $db;
    protected $tableName;
    protected $fields = array("id" => ''); //the array of fields in model

    protected function __construct() {
        $this->className = get_class($this);
        $this->db = DB::getInstance();
        $this->tableName = strtolower($this->className);
    }

    /**
     * Function to create new object of class
     */
    abstract static function create();

    /**
     * Funnction that returns object by ID
     */
    public static function find($id = null) {
        $object = static::create();
        if ($id == null) {
            return $object;
        } elseif (is_int($id)) {
            $this->load($id);
            return $object;
        } else {
            static::setId($id);
            return $object;
        }
    }

    /**
     * Function to load data from table to object parametrs. Is used by function find()
     */
    private function load($id = null) {
        //$this->id = $id;
        $result = $this->db->getRow("SELECT * FROM ?n WHERE id = ?i LIMIT 1", $this->tableName, $id);
        if (empty($result)) {
            $this->fields['id'] = $id;
            return;
        }
        foreach ($result as $key => $value) {
            $this->fields[$key] = $value;
        }
    }

    /**
     * Function to delete object (record) from the table.
     * @return true on success, false on failure
     */
    public function delete() {
        $id = $this->fields['id'];
        if (is_numeric($id)) {
            $result = $this->db->query("DELETE FROM ?n WHERE id=?i", $this->tableName, $id);
            if (!$result) {
                return false;
            }
        }
        return true;
    }

    public function getFields() {
        return array_keys($this->fields);
    }

    /**
     * Oveloading some nonexistent methods
     */
    public function __call($name, $arguments) {
        $method = substr($name, 0, 3);
        $field = strtolower(substr($name, 3));
        if ($method == 'get') {
            return $this->fields[$field];
        }
        if ($method == 'set') {
            if (!array_key_exists($field, $this->fields)) {
                throw new Exception("Error: Underfined fields detected!");
            }
            $this->fields[$field] = $arguments[0];
        }
    }

    /**
     * Function to save object in table: updates/creates corresponding table record. 
     * @return: true on successful save, false - on failure.
     */
    public function save() {
        try {
            $this->verifySave();
            $idsearch = $this->db->getRow("SELECT * FROM ?n WHERE id = ?i LIMIT 1", $this->tableName, $this->fields['id']);
            if (empty($idsearch)) {  // if the record doesn't exist, it should be created
                $sql = "INSERT INTO ?n SET ?u";
                $result = $this->db->query($sql, $this->tableName, $this->fields);
                if (!$result) {
                    return false;
                }
                $this->fields['id'] = $this->db->insertId();
                return true;
            }
            //if the record exists it should be updated
            $result = $this->db->query("UPDATE ?n SET ?u WHERE id = ?i", $this->tableName, $this->fields, $this->fields['id']);
            if (!$result) {
                return false;
            }
            return true;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

    /**
     * Verifies data before saving. Is used by save()   
     * @return true when $fields is correct for saving
     * @throws Exception
     */
    private function verifySave() {
        $id = $this->fields['id'];
        if (!( is_int($id) || ctype_digit($id) || ($id) == null )) {
            throw new Exception("Error: Object ID is incorrect!");
        }
        $this->fields['id'] = intval($id);
        foreach ($this->fields as $key => $value) {
            if (empty($value) && ($key !== 'id')) {
                throw new Exception("Error: Object contains some empty fields!");
            }
        }
        return true;
    }

}