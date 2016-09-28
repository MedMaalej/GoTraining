<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of configuiration
 *
 * @author acer
 */
class configuirationcompetance extends CI_Controller{
    //put your code here
    
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
        $this->load->helper('url');
        $this->load->library('session');
       
        
        //paging
        $config['base_url'] = base_url().'index.php/configuiration/manage/';
        $config['total_rows'] = $this->codegen_model->count('prametrechamp');
        $config['per_page'] = 20;
                
                $this->data['pmodule']=$this->codegen_model->getPremiereModule();
              
        	$this->data['modules']=$this->codegen_model->getByModule('module','id,module','');
                
                if(isset($_POST['module']))
                {
                    $this->data['section']=$this->codegen_model->getSectionByModule($_POST['module']); 
                }
               else 
               {
                   $this->data['section']=$this->codegen_model->getSectionByModule(1); 
               }
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
           
             $where=array('for_table'=>'competance','section'=>'competance_list.php');
		$this->data['results'] = $this->codegen_model->getPrametre('prametrechamp','nom_champ,for_table,order,etat,visiblite,label,filter',$where,$config['per_page'],$this->uri->segment(3));
              
             
           
		
               
	        $this->load->view('competance/config', $this->data);
               
       //$this->template->load('content', 'membre_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }   
    
    function listechamp()
    {
        $where=array('for_table'=>'competance','section'=>'competance_add.php');
        $this->data['liste']=$this->codegen_model->getChampAjouter('prametrechamp','nom_champ',$where);
          $this->load->view('competance/suprimerchamp',$this->data);
    }
    function supprimerchamp()
    {
        $where=array('for_table'=>'competance','section'=>'competance_add.php','nom_champ'=>$_GET['nom_champ']);
        $where1=array('for_table'=>'membre','section'=>'competance_list.php','nom_champ'=>$_GET['nom_champ']);
        if(($this->codegen_model->deletebychamp('prametrechamp',$where)==true)&&($this->codegen_model->deletebychamp('prametrechamp',$where1)==true))
        {
            $this->db->query('ALTER TABLE competance DROP COLUMN '.$_GET['nom_champ'].';');
            redirect(base_url().'index.php/competance/configuirationcompetance/listechamp');
        }
        
    }
      function ajoutechamp()
    {
        $typechamps=$_POST['typechamp'];
        $zone=$_POST['type'];
        $name=$_POST['labelchamp'];
         
           $this->db->query('ALTER TABLE competance ADD COLUMN '.$name.'  '. $typechamps.';');
           $where=array('for_table'=>'competance','section'=>'competance_add.php');
           $where1=array('for_table'=>'competance','section'=>'competance_list.php');
           $num=$this->codegen_model->countTablebyparametre($where);
            $num1=$this->codegen_model->countTablebyparametre($where1);
           $data=array('nom_champ'=> $name,'for_table'=>'competance','section'=>'competance_add.php','filter'=>'0','order'=>$num+1 ,'etat'=>'0','visiblite'=>'1','label'=> $name,'type'=> $zone);
            $data1=array('nom_champ'=> $name,'for_table'=>'competance','section'=>'competance_list.php','filter'=>'0','order'=>$num1+1 ,'etat'=>'0','visiblite'=>'1','label'=> $name,'type'=> $zone);
         if (($this->codegen_model->add('prametrechamp',$data) == TRUE)&&($this->codegen_model->add('prametrechamp',$data1) == TRUE))
         {
             redirect(base_url().'index.php/competance/configuirationcompetance');
         }
			
           
           
    }
    
     function edit(){        
     
	if(isset($_POST['monter']))
        {
	$this->load->helper('url');	
            $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ; 
            $where1= array('for_table'=>$_POST['nomtable'],'nom_champ !='=>$_POST['nom_champ'],'order'=>$_POST['order']-1);
            $data =array('order'=>$_POST['order']-1);
             $data1 =array('order'=>$_POST['order']);
           
			if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE)&&($this->codegen_model->editby('prametrechamp',$data1,$where1) == TRUE))
			{
                            
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
			
	
        }
        if(isset($_POST['demonter']))
        {
	$this->load->helper('url');	
            $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ; 
            $where1= array('for_table'=>$_POST['nomtable'],'nom_champ !='=>$_POST['nom_champ'],'order'=>$_POST['order']+1);
            $data =array('order'=>$_POST['order']+1);
             $data1 =array('order'=>$_POST['order']);
           
			if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE)&&($this->codegen_model->editby('prametrechamp',$data1,$where1) == TRUE))
			{
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
	
			
        //$this->template->load('content', 'membre_edit', $this->data);
      }
               if(isset($_POST['visible']))
        {
	$where= $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('visiblite'=>1);
         if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
         
        }
    if(isset($_POST['invisible']))
        {
	$where= $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('visiblite'=>0);
         if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
         
        }
         if(isset($_POST['filter']))
        {
	$where= $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('filter'=>$_POST['filter']);
         if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
         
        }  
        
         else
        {
	$where= $where=array('for_table'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('filter'=>0);
         if (($this->codegen_model->editby('prametrechamp',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/competance/configuirationcompetance?nomtable='.$_POST['nomtable']);
			}
         
        }  
        
      }
     
     
}
?>
