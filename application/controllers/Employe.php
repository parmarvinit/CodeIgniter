<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
    class Employe extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Employee_model',"em");

    }
    public function index() {
        $this->load->view('admin/header');
        $this->load->view('employe/index');
    }


    public function showAllEmployee(){
        $result  = $this->em->showAllEmployee();
        echo json_encode($result);
    }
    public function addEmployee(){
        $result = $this->em->addEmployee();
        $msg = ['success' => false,'type'=> 'add'];
        // $msg = ['type'=> 'add'];
        if ($result) {
            $msg['success'] = true;
        }
    
        log_message('debug', 'Insert operation result: ' . json_encode($msg)); // Debugging log
        echo json_encode($msg);

    }

    public function editEmployee(){
        $result = $this->em->editEmployee();
        echo json_encode($result);
    }
    
    public function updateEmployee(){
        $result = $this->em->updateEmployee();
        $msg = ['success' => false,'type'=> 'update'];
        if ($result) {
            $msg['success'] = true;
        }
    
        log_message('debug', 'Update operation result: ' . json_encode($msg)); // Debugging log
        echo json_encode($msg);
    }
    
    public function deleteEmployee() {
        $id = $this->input->get('id'); // Use GET instead of POST
        log_message('debug', 'Delete request received for ID: ' . $id); // Debugging log
    
        $result = $this->em->deleteEmploye($id);
    
        $msg = ['success' => false];
        if ($result) {
            $msg['success'] = true;
        }
    
        log_message('debug', 'Delete operation result: ' . json_encode($msg)); // Debugging log
        echo json_encode($msg);
    }
    
}
?>