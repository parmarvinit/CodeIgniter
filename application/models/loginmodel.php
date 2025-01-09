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
        public function articleList($limit,$offset){
            $id = $this->session->userdata('loginId');
            $q=$this->db->select("*")
                ->from('articles')
                ->where(['user_id'=>$id])
                ->limit($limit,$offset)
                ->get();
            return $q->result();
        }
        
        public function add_articles($array) {
            return $this->db->insert('articles', $array);

        }
        public function add_user($array){
            return $this->db->insert('users', $array);

        }

        public function delete_article($id){
            $this->db->where('id', $id);
            return $this->db->delete('articles');
        }

        public function total_rows(){
            $q = $this->db->get('articles');
            return $q->num_rows();
        }

        public function get_article($id) {
            $q = $this->db->select(["article_title","article_body","id"])
                          ->where('id',$id)
                          ->get('articles');
            return $q->row();
        }

        public function update_article($id, Array $article){
            return $this->db->where('id',$id)
                            ->update('articles',$article);
                            
        }
    }
?>