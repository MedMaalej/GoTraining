<?php

class Membre extends CI_Controller {
    
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
        
        $where=array('section'=>'membre_list.php','visiblite'=>'1');
        $wherein=array('0','2');
        $this->data['chaine']=$this->codegen_model->getTableByFicher($where, $wherein);
          $wherelist=array('for_table'=>'membre','section'=>'membre_list.php','filter'=>1); 
          $this->data['filter']=$this->codegen_model->getListeFiltre($wherelist);
       
        $ch="";
        $i=0;
        foreach($this->data['chaine'] as $valeur)
        {
            $i++;
            if($i !=$this->codegen_model->countTable('membre'))
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
        $config['base_url'] = base_url().'index.php/membre/membre/manage/';
        $config['total_rows'] = $this->codegen_model->count('membre');
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 
        
        
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
          if(!isset($_POST['textrechreche'])||(@$_POST['textrechreche']==""))
        {
		$this->data['results'] = $this->codegen_model->get('membre',$ch,'',$config['per_page'],$this->uri->segment(3));
        }
        else 
        {
        
         $recherche=array($_POST['filter']=>@$_POST['textrechreche']);
         $this->data['results'] = $this->codegen_model->getRecherche($recherche,'membre',$ch,'',$config['per_page'],$this->uri->segment(3));      
     
        }
           $this->data['choix']="membre/membre_list";
              
	   $this->load->view('templates/index', $this->data); 
	  
       //$this->template->load('content', 'membre_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('membre') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {     
            
              $where=array('for_table'=>'membre','section'=>'membre_add.php');
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
                    'login' => set_value('login'),
					'pass' => set_value('pass'),
					'abonnement' => set_value('abonnement'),
					'civilite' => set_value('civilite'),
					'active' => set_value('active'),
					'groupe' => set_value('groupe'),
					'email' => set_value('email'),
					'prenom' => set_value('prenom'),
					'nom' => set_value('nom'),
					'date_debut' => set_value('date_debut'),
					'date_fin' => set_value('date_fin'),
					'test7' => set_value('test7'),
					'test8' => set_value('test8'),
					'test10' => set_value('test10'),
					'test11' => set_value('test11'),
					'test12' => set_value('test12'),
					'test20' => set_value('test20'),
					'aaa' => set_value('aaa'),
					'bbb' => set_value('bbb'),
					'xxxx' => set_value('xxxx'),
					'hhhh' => set_value('hhhh')
            );
           
            $tb[0]='login';
					$tb[1]='pass';
					$tb[2]='abonnement';
					$tb[3]='civilite';
					$tb[4]='active';
					$tb[5]='groupe';
					$tb[6]='email';
					$tb[7]='prenom';
					$tb[8]='nom';
					$tb[9]='date_debut';
					$tb[10]='date_fin';
					$tb[11]='test7';
					$tb[12]='test8';
					$tb[13]='test10';
					$tb[14]='test11';
					$tb[15]='test12';
					$tb[16]='test20';
					$tb[17]='aaa';
					$tb[18]='bbb';
					$tb[19]='xxxx';
					$tb[20]='hhhh';
            
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
            
			if ($this->codegen_model->add('membre',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/membre/membre/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}
          $where=array('for_table'=>'membre','section'=>'membre_add.php');
          $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
         $this->data['choix']="membre/membre_add";
	  $this->load->view('templates/index', $this->data);
	
        //$this->template->load('content', 'membre_add', $this->data);
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('membre') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {       
            $where=array('for_table'=>'membre','section'=>'membre_add.php');
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
            
            $data = array('login' => $this->input->post('login'),
					'pass' => $this->input->post('pass'),
					'abonnement' => $this->input->post('abonnement'),
					'civilite' => $this->input->post('civilite'),
					'active' => $this->input->post('active'),
					'groupe' => $this->input->post('groupe'),
					'email' => $this->input->post('email'),
					'prenom' => $this->input->post('prenom'),
					'nom' => $this->input->post('nom'),
					'date_debut' => $this->input->post('date_debut'),
					'date_fin' => $this->input->post('date_fin'),
					'test7' => $this->input->post('test7'),
					'test8' => $this->input->post('test8'),
					'test10' => $this->input->post('test10'),
					'test11' => $this->input->post('test11'),
					'test12' => $this->input->post('test12'),
					'test20' => $this->input->post('test20'),
					'aaa' => $this->input->post('aaa'),
					'bbb' => $this->input->post('bbb'),
					'xxxx' => $this->input->post('xxxx'),
					'hhhh' => $this->input->post('hhhh'));
            
             $tb[0]='login';
					$tb[1]='pass';
					$tb[2]='abonnement';
					$tb[3]='civilite';
					$tb[4]='active';
					$tb[5]='groupe';
					$tb[6]='email';
					$tb[7]='prenom';
					$tb[8]='nom';
					$tb[9]='date_debut';
					$tb[10]='date_fin';
					$tb[11]='test7';
					$tb[12]='test8';
					$tb[13]='test10';
					$tb[14]='test11';
					$tb[15]='test12';
					$tb[16]='test20';
					$tb[17]='aaa';
					$tb[18]='bbb';
					$tb[19]='xxxx';
					$tb[20]='hhhh';
            
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
			if ($this->codegen_model->edit('membre',$data,'id',$this->input->post('id')) == TRUE)
			{
				redirect(base_url().'index.php/membre/membre/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}
 $where=array('for_table'=>'membre','section'=>'membre_add.php');
 $this->data['champ'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
		$this->data['result'] = $this->codegen_model->getbytablebyid('membre','id,login,pass,abonnement,civilite,active,groupe,email,prenom,nom,date_debut,date_fin,test7,test8,test10,test11,test12,test20,aaa,bbb,xxxx,hhhh','id = '.$this->uri->segment(4));
		 $this->data['choix']="membre/membre_edit";
		$this->load->view('templates/index', $this->data);			
        //$this->template->load('content', 'membre_edit', $this->data);
    }
	function AfficheFormAjouter()
   {
      $where=array('for_table'=>'membre','section'=>'membre_add.php');
      $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
       $this->data['choix']="membre/membre_add";
	$this->load->view('templates/index', $this->data);	
                
   }
  
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->codegen_model->delete('membre','id',$ID);             
            redirect(base_url().'index.php/membre/manage/');
    }
}




/* End of file membre.php */
/* Location: ./system/application/controllers/membre.php */ 