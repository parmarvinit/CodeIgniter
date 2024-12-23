<?php

class Admin extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        
    }
    
    public function login()
    {
        if ($this->session->userdata('loginId') ) {
            return redirect('admin/welcome');
        }
    
        $this->load->library('form_validation');
        $this->form_validation->set_rules('uname', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('pass', 'Password', 'required|max_length[10]|min_length[6]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        if ($this->form_validation->run()) {
            // echo "validation succesfull";
            $uname = $this->input->post('uname');
            $password = $this->input->post('pass');
            $this->load->model('loginmodel');
            $login_id = $this->loginmodel->isValidate($uname, $password);
            if ($login_id) {
                //echo "Data Matched";

                $this->session->set_userdata('loginId', $login_id);
                $this->session->set_userdata('uname', $uname);

                ///$this->load->view('admin/dashboard');
                return redirect('admin/welcome');
            } else {
                $this->session->set_flashdata('login_failed', 'Invalid Username/Password');
                redirect('admin/login');
                
            }
            
        } else {
            $this->load->view('admin/login');
        }
    }
    public function welcome()
    {

        if (! $this->session->userdata('loginId') ) {
            return redirect('admin/login');
        }
        $this->load->model("loginmodel", "lg");

        $articles = $this->lg->articleList();
        $this->load->view('admin/dashboard', ['articles' => $articles]);


    }
    public function register()
    {
        $this->load->view('admin/register');
    }

    public function sendmail()
    {
        $this->load->library('form_validation');

        // Set validation rules for form fields
        $this->form_validation->set_rules('fname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('uname', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('pass', 'Password', 'required|min_length[6]|max_length[10]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        if ($this->form_validation->run()) {

            $this->load->library('email');
            $this->email->from(set_value('email'), set_value('fname'));

            $this->email->to(set_value('parmarvinit1129'));
            $this->email->subject('Registration Successfull');
            $this->email->message('Thank You');
            $this->email->send();

            if (!$this->email->send()) {
                show_error($this->email->print_debugger());
            } else {
                echo "mail send";
            }


        }
      
        $this->load->view('admin/register');


    }
    public function logout()
    {
        
        if ($this->session->userdata('loginId')) {
            $this->session->unset_userdata('loginId');
            $this->session->sess_destroy();
            return redirect('admin/login');
        }
        

    }


    public function adduser()
    {
        $this->load->view('admin/add_articles');
        // $this->input()->post();
    }
    public function userValidation(){
        if($this->form_validation->run('add_article_rules')){
            echo 'ok';
        }else{
            $this->load->view('admin/add_articles');
        }
    }
}
?>