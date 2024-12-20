<?php

    class Users extends MY_Controller{

        public function index(){
            $this->load->helper('html');
            
           $this->load->view('users/articlesList');
        }
        public function search(){
            $this->load->view('users/search');
        }
    }
?>