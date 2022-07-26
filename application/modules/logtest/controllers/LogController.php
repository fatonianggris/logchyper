<?php

class LogController extends MX_Controller {

    public function __construct() {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('signapps') == FALSE) {
            redirect('auth');
        }
        $this->load->model('Logmodel');
    }  

    public function list_log() {
        $data['title'] = "Cypher Apps";
        $data['nav'] = "Daftar Log Test";
        $data['act'] = "log";
        $data['list'] = $this->Logmodel->get_all_log();
        $this->template->load('template/template', 'list_log', $data);
    }

    public function list_cypher() {
        $data['title'] = "Cypher Apps";
        $data['nav'] = "Daftar Cypher";
        $data['act'] = "cypher";
        $data['list'] = $this->Logmodel->get_all_cypher();
        $this->template->load('template/template', 'list_cypher', $data);
    }

    public function input_cypher() {
        $data['title'] = "Cypher Apps";
        $data['nav'] = "Tambah Cypher";
        $data['act'] = "cypher";
        $this->template->load('template/template', 'input_cypher', $data);
    }

    public function get_cypher($id = '') {

        $data = array();
        $data['title'] = "Cypher Apps";
        $data['nav'] = "Edit Cypher"; // ???
        $data['cypher'] = $this->Logmodel->get_by_id($id); //?
        $cek = $this->Logmodel->get_by_id($id);
        if (empty($id)) {
            //add new data
            $this->template->load('template/template', 'input_sign', $data);
        } else if ($cek == FALSE) {
            $data['title'] = 'Cyper Apps | Error 404 ';
            $this->load->view('error_404', $data);
        } else {
            //edit data with id
            $this->template->load('template/template', 'edit_cypher', $data);
        }
    }

    public function add_cypher() {
        $this->load->library('form_validation');

        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('type_cypher', 'Type Cypher', 'required');
        $this->form_validation->set_rules('text_cypher', 'Text Cypher', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('logtest/logcontroller/input_cypher'); //folder, controller, method
        } else {

            $input = $this->Logmodel->insert_cypher($data);
            if ($input == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('logtest/logcontroller/input_cypher');
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('logtest/logcontroller/input_cypher');
            }
        }
    }

    public function edit_cypher($id = '') {

        $this->load->library('form_validation');
        $param = $this->input->post();
        $data = $this->security->xss_clean($param);

        $this->form_validation->set_rules('type_cypher', 'Type Cypher', 'required');
        $this->form_validation->set_rules('text_cypher', 'Text Cypher', 'required');

        if ($this->form_validation->run() == FALSE) {
            //
            $this->session->set_flashdata('flash_message', warn_msg(validation_errors()));
            redirect('logtest/logcontroller/get_cypher/' . $id);
        } else {
            // print_r($data);exit;    
            $edit = $this->Logmodel->update_cypher($id, $data);
            if ($edit == true) {
                $this->session->set_flashdata('flash_message', succ_msg('Berhasil, Data Telah Tersimpan..'));
                redirect('logtest/logcontroller/get_cypher/' . $id);
            } else {
                $this->session->set_flashdata('flash_message', err_msg('Maaf, Terjadi kesalahan...'));
                redirect('logtest/logcontroller/get_cypher/' . $id);
            }
        }
    }

    public function delete_cypher() {
        $id = $this->input->post('id');
        $delete = $this->Logmodel->delete_cypher($id);
        if ($delete == true) {
            echo '1|' . succ_msg('Berhasil, Data Telah Terhapus..');
        } else {
            echo '0|' . err_msg('Maaf, Terjadi kesalahan, Coba lagi...');
        }
    }

}
