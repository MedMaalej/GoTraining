<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html7
         * 
	 */
          function __construct() {
        parent::__construct();
		
		
	$this->load->library('session');
          $this->load->helper('url');
    
	// Load needed models, libraries, helpers and language files
		//$this->load->model('posts_model');
                
		
		
	}

      public function index()
	{
          
        
     
         
           
          $data['choix']='templates/accueil';
      
         
         $this->load->view('templates/index.php',$data);   
           
           
   
      
	}
         public function chargement()
	{
                 
              
          $this->load->helper('url');
         $data['choix']='templates/'.$this->uri->segment(3);
         $this->load->view('templates/index.php',$data);        
                
          
	}
        
         public function charge()
	{
                 
              
          $this->load->helper('url');
         $data['choix']='templates/'.$this->uri->segment(3);
         $this->load->view('templates/accueil.php',$data);        
                
          
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>