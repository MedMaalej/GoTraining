<?php

class Connexion extends CI_Controller {
    
    function __construct() {
        parent::__construct();
         $this->load->library('session');
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
	}	
	
	function index(){
                if(isset($_POST['login']))
                {
                $this->veriflog($_POST['login'],$_POST['mp']);
                }
             else 
              {
                
                  $this->load->view('connexion/connexion'); 
             }
          
		
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        //bloc personalisation
        
        
       
         
              
	   $this->load->view('connexion/connexion'); 
	  
       //$this->template->load('content', 'employer_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
    function veriflog($login,$mp)
    {
        
           
        $this->form_validation->set_rules('login', 'login', 'required|varchar');
          $this->form_validation->set_rules('mp', 'mon de passe ', 'required|varchar');
         $this->form_validation->set_message('required','login et mon de passe n est pas valide');
           if ($this->form_validation->run() == true)
           {
               
          
        $where=array('login'=>$login,'pass'=>$mp);
            if( $this->codegen_model->afficheUser($where)==true)
            {
               
                
                $newdata = array(
                   'login'  => $login,
                   'pass'     => $mp,
                   'logged_in' => TRUE
               );

       $this->session->set_userdata($newdata);
                
                redirect(base_url()."index.php/page");
            }
    
         else 
             {
              redirect(base_url());
             }
           }
           else
           {
             
                $this->load->view('connexion/connexion');
           }
  
    }
    
    function logout()
    {
      $this->session->unset_userdata('login');
      $this->session->unset_userdata('pass');
      $this->session->sess_destroy();
      redirect(base_url());
      
    }
	
    

  
}




/* End of file employer.php */
/* Location: ./system/application/controllers/employer.php */ 