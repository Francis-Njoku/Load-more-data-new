<?php
defined('BASEPATH') OR exit('No direct script access allowed');



    class Person extends CI_Controller
    {


        public function __construct()
        {
            parent::__construct();
            $this->load->model('person_model', 'person');
        }

        public function index()
        {
            $this->load->helper('url');
            $this->load->view('person_view');
        }

        public function ajax_list()
        {
            $list = $this->person->get_datatables();
            $data = array();
            $no = $_POST['start'];
            foreach ($list as $person) {
                $no++;
                $row = array();
                $row[] = $person->nscho_name;
                $row[] = $person->nscho_provider;
                $row[] = $person->nscho_display;
                $row[] = $person->nscho_country;
                $row[] = $person->nscho_currency;
                $row[] = $person->nscho_amount;


                $row[] = $person->nscho_deadline;

                $row[] = $person->nscho_essay;
                $row[] = $person->nscho_elig;

                //add html for action
                $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(' . "'" . $person->nscho_id . "'" . ')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person(' . "'" . $person->nscho_id . "'" . ')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

                $data[] = $row;
            }

            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->person->count_all(),
                "recordsFiltered" => $this->person->count_filtered(),
                "data" => $data,
            );
            //output to json format
            echo json_encode($output);
        }

        public function ajax_edit($id)
        {
            $data = $this->person->get_by_id($id);
            echo json_encode($data);
        }

        public function ajax_add()
        {
            $data = array(
                'nscho_name' => $this->input->post('nscho_name'),
                'nscho_provider' => $this->input->post('nscho_provider'),
                'nscho_display' => $this->input->post('nscho_display'),
                'nscho_country' => $this->input->post('nscho_country'),
                'nscho_currency' => $this->input->post('nscho_currency'),
                'nscho_amount' => $this->input->post('nscho_amount'),
                'nscho_purpose' => $this->input->post('nscho_purpose'),
                'nscho_overview' => $this->input->post('nscho_overview'),
                'nscho_deadline' => $this->input->post('nscho_deadline'),
                'nscho_website' => $this->input->post('nscho_website'),
                'nscho_essay' => $this->input->post('nscho_essay'),
                'nscho_elig' => $this->input->post('nscho_elig'),
            );
            $insert = $this->person->save($data);
            echo json_encode(array("status" => TRUE));
        }

        public function ajax_update()
        {
            $data = array(
                'nscho_name' => $this->input->post('nscho_name'),
                'nscho_provider' => $this->input->post('nscho_provider'),
                'nscho_display' => $this->input->post('nscho_display'),
                'nscho_country' => $this->input->post('nscho_country'),
                'nscho_currency' => $this->input->post('nscho_currency'),
                'nscho_amount' => $this->input->post('nscho_amount'),
                'nscho_purpose' => $this->input->post('nscho_purpose'),
                'nscho_overview' => $this->input->post('nscho_overview'),
                'nscho_deadline' => $this->input->post('nscho_deadline'),
                'nscho_website' => $this->input->post('nscho_website'),
                'nscho_essay' => $this->input->post('nscho_essay'),
                'nscho_elig' => $this->input->post('nscho_elig'),
            );
            $this->person->update(array('nscho_id' => $this->input->post('nscho_id')), $data);
            echo json_encode(array("status" => TRUE));
        }

        public function ajax_delete($id)
        {
            $this->person->delete_by_id($id);
            echo json_encode(array("status" => TRUE));
        }

    }

