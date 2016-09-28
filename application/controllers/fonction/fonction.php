<?php

class Fonction extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        //bloc personalisation
        
        $where=array('section'=>'fonction_list.php','visiblite'=>'1');
        $wherein=array('0','2');
        $this->data['chaine']=$this->codegen_model->getTableByFicher($where, $wherein);
          $wherelist=array('for_table'=>'fonction','section'=>'fonction_list.php','filter'=>1); 
          $this->data['filter']=$this->codegen_model->getListeFiltre($wherelist);
       
        $ch="";
        $i=0;
        foreach($this->data['chaine'] as $valeur)
        {
            $i++;
            if($i !=$this->codegen_model->countTable('fonction'))
            {
              $ch=$ch.$valeur['nom_champ'].",";
            }
            else
            {
              $ch=$ch.$valeur['nom_champ'];  
            }
        }
        //fin bloc
        //paging
        $config['base_url'] = base_url().'index.php/fonction/fonction/manage/';
        $config['total_rows'] = $this->codegen_model->count('fonction');
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 
        
        
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
          if(!isset($_POST['textrechreche'])||(@$_POST['textrechreche']==""))
        {
		$this->data['results'] = $this->codegen_model->get('fonction',$ch,'',$config['per_page'],$this->uri->segment(3));
        }
        else 
        {
        
         $recherche=array($_POST['filter']=>@$_POST['textrechreche']);
         $this->data['results'] = $this->codegen_model->getRecherche($recherche,'fonction',$ch,'',$config['per_page'],$this->uri->segment(3));      
     
        }
           $this->data['choix']="fonction/fonction_list";
              
	   $this->load->view('templates/index', $this->data); 
	  
       //$this->template->load('content', 'fonction_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('fonction') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {     
            
              $where=array('for_table'=>'fonction','section'=>'fonction_add.php');
             $this->data['tbc'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
            
             $i=0;
             if($this->data['tbc']!=NULL)
             {
             foreach( $this->data['tbc'] as $valeur)
            {
                
              $tc[$i]= $valeur['nom_champ'];  
               $i++;
             }
             }
            $data = array(
                    'desig_fonc' => set_value('desig_fonc')
            );
           
            $tb[0]='desig_fonc';
            
             if($i>0)
              {
                  $length=count($tb);
                  for($j=$length;$j<$length+$i;$j++)
                  {
                      $tb[$j]=$tc[$j-$length];
                  }
                  for($k=0;$k<count($tb);$k++)
                  {
                      $data1[$tb[$k]]=$_POST[$tb[$k]];
                  }
                $data=$data1;
            
                  
              }
            
			if ($this->codegen_model->add('fonction',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/fonction/fonction/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}
          $where=array('for_table'=>'fonction','section'=>'fonction_add.php');
          $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
         $this->data['choix']="fonction/fonction_add";
	  $this->load->view('templates/index', $this->data);
	
        //$this->template->load('content', 'fonction_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('fonction') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {       
            $where=array('for_table'=>'fonction','section'=>'fonction_add.php');
             $this->data['tbc'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
            
             $i=0;
             if($this->data['tbc']!=NULL)
             {
             foreach( $this->data['tbc'] as $valeur)
            {
                
              $tc[$i]= $valeur['nom_champ'];  
               $i++;
             }
             }
            
            $data = array('desig_fonc' => $this->input->post('desig_fonc'));
            
             $tb[0]='desig_fonc';
            
             if($i>0)
              {
                  $length=count($tb);
                  for($j=$length;$j<$length+$i;$j++)
                  {
                      $tb[$j]=$tc[$j-$length];
                  }
                  for($k=0;$k<count($tb);$k++)
                  {
                      $data1[$tb[$k]]=$_POST[$tb[$k]];
                  }
                $data=$data1;
            
              }
			if ($this->codegen_model->edit('fonction',$data,'code_fonc',$this->input->post('code_fonc')) == TRUE)
			{
				redirect(base_url().'index.php/fonction/fonction/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}
 $where=array('for_table'=>'fonction','section'=>'fonction_add.php');
 $this->data['champ'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
		$this->data['result'] = $this->codegen_model->getbytablebyid('fonction','code_fonc,desig_fonc','code_fonc = '.$this->uri->segment(4));
		 $this->data['choix']="fonction/fonction_edit";
		$this->load->view('templates/index', $this->data);			
        //$this->template->load('content', 'fonction_edit', $this->data);
    }
	function AfficheFormAjouter()
   {
      $where=array('for_table'=>'fonction','section'=>'fonction_add.php');
      $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
       $this->data['choix']="fonction/fonction_add";
	$this->load->view('templates/index', $this->data);	
                
   }
  
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('fonction','code_fonc',$ID);             
            redirect(base_url().'index.php/fonction/manage/');
    }
}




/* End of file fonction.php */
/* Location: ./system/application/controllers/fonction.php */ 