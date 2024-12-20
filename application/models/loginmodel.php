<?php 
    class loginmodel extends CI_Model 
    {
        public function isValidate($username,$password)
        {
            $q = $this->db->where(["username"=>$username,"password"=>$password])
                          ->get('users');
             //echo "<pre>";
             //print_r($q->row());exit;
            if($q->num_rows() > 0)
            {
                return $q->row()->id;
            }else{
                return false;
            }
                     

        }
        public function articleList(){
            $id = $this->session->userdata('loginId');
            $q=$this->db->select("*")
                ->from('articles')
                ->where(['user_id'=>$id])
                ->get();
            return $q->result();
        }
        

    }
?>