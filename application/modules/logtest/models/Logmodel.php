<?php

class Logmodel extends CI_Model {

    private $table_log = 'log_data';
    private $table_cypher = 'cyper';

    public function get_all_log() {
        $sql = $this->db->get($this->table_log);
        return $sql->result();
    }

    public function get_all_cypher() {
        $sql = $this->db->get($this->table_cypher);
        return $sql->result();
    }

    public function get_by_id($id = '') {
        $this->db->where('id_cypher', $id);
        $sql = $this->db->get($this->table_cypher);
        return $sql->result();
    }

    public function insert_cypher($value = '') {
        $this->db->trans_begin();

        $data = array(
            'type' => $value['type_cypher'],
            'cypher' => $value['text_cypher'],
        );
        $this->db->insert($this->table_cypher, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function update_cypher($id = '', $value = '') {
        $this->db->trans_begin();

        $data = array(
            'type' => $value['type_cypher'],
            'cypher' => $value['text_cypher'],
        );

        $this->db->where('id_cypher', $id);
        $this->db->update($this->table_cypher, $data);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function delete_cypher($value) {
        $this->db->trans_begin();

        $this->db->where('id_cypher', $value);
        $this->db->delete($this->table_cypher);

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

}
?>

