<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employee_model extends CI_Model
{

    public function showAllEmployee()
    {
        // $this->db->order_by('created_at','desc');
        $query = $this->db->get('employee');
        if ($query->num_rows() > 0) {

            return $query->result_array();
        } else {
            return false;
        }
    }

    public function addEmployee()
    {
        $emp_data = array(
            'employe_id' => htmlspecialchars($this->input->post('empid')),
            'employe_name' => htmlspecialchars($this->input->post('empname')),
            'employe_address' => htmlspecialchars($this->input->post('address')),
            'employe_phoneno' => htmlspecialchars($this->input->post('phone'))
        );

        $this->db->insert('employee', $emp_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function editEmployee()
    {
        $emp_id = $this->input->get('id');
        $this->db->where('employe_id', $emp_id);
        $query = $this->db->get('employee');
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function updateEmployee(){
        $emp_id = $this->input->post('empid');
        $emp_data = array(
            'employe_name' => htmlspecialchars($this->input->post('empname')),
            'employe_address' => htmlspecialchars($this->input->post('address')),
            'employe_phoneno' => htmlspecialchars($this->input->post('phone'))
        );
        $this->db->where('employe_id', $emp_id);
        $this->db->update('employee', $emp_data);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
        
    }

    public function deleteEmploye($id)
    {
        $this->db->where('employe_id', $id);
        $this->db->delete('employee');

        $affectedRows = $this->db->affected_rows();
        log_message('debug', 'Rows affected by delete operation: ' . $affectedRows); // Debugging log
        return $affectedRows;
    }

}
?>