<?php

class Dashboardmodel extends CI_Model {

    public function get_all() {
        $sql = $this->db->query('select (select count(id_log) from log_data) as log');
        return $sql->result();
    }

}

?>