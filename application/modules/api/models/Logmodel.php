<?php

class Logmodel extends CI_Model {

    private $table = 'log_data';

    public function get_all_log() {
        $sql = $this->db->get($this->table);
        return $sql->result_array();
    }

}
?>

