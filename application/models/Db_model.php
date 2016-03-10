<?php class Db_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    public function ejecutar($sql){
        $query = $this->db->query($sql);
        return $query;
    }
}
