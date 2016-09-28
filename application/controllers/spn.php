
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Spn extends CI_Controller {

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
		
		
	
    
	// Load needed models, libraries, helpers and language files
		//$this->load->model('posts_model');
                
		
		
	}
         public function index()
	{
             
             
                  $this->load->helper('url');
		$this->load->view('templates/index');
          
	}

     
          public function page()
	{
                  $this->load->helper('url');
		$this->load->view('templates/index');
          
	}
       
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>