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
        $this->load->library('pagination');
        $config = [
            'base_url' => base_url('admin/welcome'),
            'per_page' => 3 ,
            'total_rows' => $this->lg->total_rows(),
            'full_tag_open' => "<ul class='pagination justify-content-center'>",
            'full_tag_close' => "</ul>",
            'next_tag_open' => "<li class='page-item'>",
            'next_tag_close' => "</li>",
            'prev_tag_open' => "<li class='page-item'>",
            'prev_tag_close' => "</li>",
            'num_tag_open' => "<li class='page-item'>",
            'num_tag_close' => "</li>",
            'cur_tag_open' => "<li class='page-item active'><a >",
            'cur_tag_close' => "</a></li>"
        ];
        $this->pagination->initialize($config);
        


        $articles = $this->lg->articleList($config['per_page'],$this->uri->segment(3));
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
        $this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
        $this->form_validation->set_rules('username', 'User Name', 'required|alpha');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[10]');
        $this->form_validation->set_error_delimiters("<div class='text-danger'>", "</div>");

        if ($this->form_validation->run()) {

            $this->load->model('loginmodel','user_add');
            $user = $this->input->post();
           
            if($this->user_add->add_user($user)){
                $this->session->set_flashdata('user','User Added Successfully');
                $this->session->set_flashdata('user_class','alert-success');
                return redirect('Admin/register');

            }else{
                $this->session->set_flashdata('user','Opps... User Not Added!');
                $this->session->set_flashdata('user_class','alert-danger');
                return redirect('Admin/register');
            }

            // $this->load->library('email');
            // $this->email->from(set_value('email'), set_value('fname'));

            // $this->email->to(set_value('parmarvinit1129'));
            // $this->email->subject('Registration Successfull');
            // $this->email->message('Thank You');
            // $this->email->send();

            // if (!$this->email->send()) {
            //     show_error($this->email->print_debugger());
            // } else {
            //     echo "mail send";
            // }

           
        }else {
            $this->load->view('admin/register');
        }
        


    }
    public function logout()
    {
        
        if ($this->session->userdata('loginId')) {
            $this->session->unset_userdata('loginId');
            $this->session->sess_destroy();
            return redirect('admin/login');
        }
        

    }


    public function add_articles()
    {
        $this->load->view('admin/add_articles');
        // $this->input()->post();
    }
    public function userValidation(){
        if($this->form_validation->run('add_article_rules')){
            $post = $this->input->post();
            $this->load->model('loginmodel','lg');
            if($this->lg->add_articles($post)){
                $this->session->set_flashdata('msg','Article Added Successfully');
                $this->session->set_flashdata('msg_class','alert-success');
            }
            else{
                $this->session->set_flashdata('msg','Failed to Add Article');
                $this->session->set_flashdata('msg_class','alert-danger');

            } 
            return redirect('Admin/Welcome');  
        }else{
            $this->load->view('Admin/add_articles');
        }
    }

    public function delete_article(){
        $this->load->model('loginmodel','lg');
        $id = $this->input->post('id');
        if($this->lg->delete_article($id)){
            $this->session->set_flashdata('msg','Article Deleted Successfully');
            $this->session->set_flashdata('msg_class','alert-success');
    }else{
        $this->session->set_flashdata('msg','Failed to Delete Article');
        $this->session->set_flashdata('msg_class','alert-danger');

    }
    return redirect('admin/welcome');
    }

    public function edit_article(){
        $this->load->model('loginmodel','lg');
        $id = $this->input->post('id');
        $article = $this->lg->get_article($id);
        // print_r($article);exit;
        $this->load->view('admin/edit_article', ['article' => $article]);
    }

    public function updatearticle(){
        $this->load->model('loginmodel','lg');
        $id = $this->input->post('id');
        $post = $this->input->post();
        // print_r($post);exit;
        if($this->lg->update_article($id,$post)){
            $this->session->set_flashdata('msg','Article Updated Successfully');
            $this->session->set_flashdata('msg_class','alert-success');
        }else{
            $this->session->set_flashdata('msg','Failed to Update Article');
            $this->session->set_flashdata('msg_class','alert-danger');
        }
        return redirect('admin/welcome');
    }

    
}
?>