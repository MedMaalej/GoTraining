<?php

class configuiration extends CI_Controller {
    
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
        
       
        //fin bloc
        //paging
      
        
        $config['per_page'] = 10;	
        $this->pagination->initialize($config); 
        
        
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
         
      
        
      
        
     
          $this->data['results'] = $this->codegen_model->getrelation();   
           
           $this->data['choix']="configuiration/configuiration";
              
	   $this->load->view('templates/index', $this->data); 
	  
       //$this->template->load('content', 'employer_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
    
    
    
    function PersonaliserRelation()
    {
        
        
     $this->data['choix']="configuiration/ajoute_liste";
    $where=array('table_liste.contrainte'=>$_GET['cont']);
      $this->data['liste'] = $this->codegen_model->getliste($where); 
     
     
              
      $this->load->view('templates/index', $this->data); 
        
    }
    function delete()
    {
          $ID =  $this->uri->segment(4);
            $this->codegen_model->delete('liste','code_liste',$ID);             
          redirect(base_url().'index.php/configuiration/configuiration/PersonaliserRelation?cont='.$_GET['cont']);  
    }
    
    function ajouter_liste()
    {
        
         
           $insert=array('nom_liste'=>$_POST['liste_name']);
          $last_insert= $this->codegen_model->add('liste',$insert);
        
        
         $condition=$this->codegen_model->RelationByCONSTRAINT_NAME($_POST['contraintename']);
         foreach($condition as $valeur)
         {
          $cond['etranger']=$valeur['TABLE_NAME'];   
          $cond['cletranger']=$valeur['COLUMN_NAME'];
          $cond['cleprimaire']=$valeur['REFERENCED_COLUMN_NAME'];
          $cond['primaire']=$valeur['REFERENCED_TABLE_NAME'];
          $cond['contrainte']=$valeur['CONSTRAINT_NAME'];
          
         }
       $select=$this->codegen_model->getListeChampBytable($cond['primaire'],'','formation');
       $select1=$this->codegen_model->getListeChampBytable($cond['etranger'],'','formation');
       $tables=array('contrainte'=>$cond['contrainte'],'nom_liste'=> $last_insert);
       
        $this->codegen_model->add('table_liste',$tables);
         
       $i=0;
       
       foreach($select as $valeur)
      {
         if(($valeur['Field']!='date_creation')&&($valeur['Field']!='date_modification')&&($valeur['Field']!='user_create')&&($valeur['Field']!='user_update')) 
         {
     
          $field=$cond['primaire'].".". $valeur['Field'];
    
         
          $i++;
          
          $tab = array(
                                    'nom_champ' =>  $field,
                                         'liste'=>$last_insert,
					'order' => $i,
					
					'visiblite' =>1 ,
                                       'filter'=>1,
                                      'typechamp'=>$valeur['Type']);
                    $this->codegen_model->add('parametreliste',$tab);
     
         }
      }
      
        foreach($select1 as $valeur)
      {
        if(($valeur['Field']!='date_creation')&&($valeur['Field']!='date_modification')&&($valeur['Field']!='user_create')&&($valeur['Field']!='user_update')) 
         {
          if($cond['cletranger']!=$valeur['Field'])  
          {
            $field=$cond['etranger'].".". $valeur['Field'];
          $i++;
          $tab = array(
                                       'nom_champ' => $field,
                                         'liste'=>$last_insert,
					'order' => $i,
					
					'visiblite' =>1 ,
                                       'filter'=>1,
                                       'typechamp'=>$valeur['Type']);
          
           
                    $this->codegen_model->add('parametreliste',$tab);
     
          }
         }
      }
       
      
      
         
           redirect(base_url().'index.php/configuiration/configuiration/PersonaliserRelation?cont='.$cond['contrainte']);
         
       
          
        
    }
    
    function operation($champtype,$champ,$liste)
    {
     
        
       $Num=array('int(11)','numeric','float','double','real','decimal'); 
       $text=array('text','varchar(100)');
       $date=array('date');
       
       
       
       
       
       $operation=array();
          if(in_array($champtype, $Num))
       {
           $operation=array('>','<','=','!=');
       }
            if(in_array($champtype,$text))
       {
           $operation=array('=','!=');
       }
              if(in_array($champtype,$date))
       {
            
           $operation=array('=','!=');
       }
       
       
        
        $this->data['champtype']=$champtype;
       
        $this->data['op']=$operation;
        $this->data['champ']=$champ;
        $this->data['liste']=$liste;
        $this->load->view('configuiration/condtion',$this->data);
        
        
        
    }
    
    
    function AfficheListe()
    {
       
        $gwhere=array('visiblite'=>1,'liste'=>$_GET['liste'],'groupment'=>1);
        $collonegroupement=$this->codegen_model->AfficherColloneByGroupe($gwhere);
        $condions=$this->codegen_model->AfficheListeConditionByListe($_GET['liste']);
        $cd=array();
       
        if($condions!=NUll)
        {
          foreach($condions as $valeur) 
          {
             $cd[$valeur['nom_champ']." ".$valeur['operation']]=$valeur['valeur'];
             
          }
        }
       
        $g=0;
        $group=array();
        if($collonegroupement!=Null)
        {
        foreach($collonegroupement as $valeur)
        {
            $group[$g]=$valeur['nom_champ'];
            $g++;
        }
        }
        $where=array('visiblite'=>1,'liste'=>$_GET['liste']);
        $collone=$this->codegen_model->AfficherColloneByliste($where);
        $i=0;
        $ch=array();
        if( $collone!=NULL)
        {
        foreach($collone as $v)
        {
           
            $ch[$i]=$v['nom_champ'];
             $i++;
        }
        }
       $select=implode(',',$ch);
     
        $where1=array('nom_liste'=>$_GET['liste']);
        $relation=$this->codegen_model->GetRelationByListe($where1);
        foreach($relation as $valeur)
        {
            $nom_relation=$valeur['contrainte'];
        }
        $detailrelation=$this->codegen_model->GetDetailRelation($nom_relation);
        foreach($detailrelation as $valeur)
        {
            $tab['tabprimaire']=$valeur['REFERENCED_TABLE_NAME'];
            $tab['tabetranger']=$valeur['TABLE_NAME'];
            $tab['etranger']=$valeur['COLUMN_NAME'];
            $tab['primaire']=$valeur['REFERENCED_COLUMN_NAME'];
        }
        
              $res=$this->codegen_model->GetKeyByTable($tab['tabetranger']);
              $k=0;
           
            foreach($res as $valeur)
            {
                
                
                if($valeur['Key']=='PRI')
                {
                    
                    $key[$k]=$valeur['Field']; 
                    $k++;
                }
                //$valeur['Field']
            }
            
            
        
        if(isset($_GET['action'])&&($_GET['action']=='sup'))
        {
            $where=array();
            foreach($key as $valeur)
            {  
                $where[$valeur]=$_GET["$valeur"];
            }
           
           // $wheredelete=array();
          $this->codegen_model->deleteByListe($tab['tabetranger'],$where);
        }
        
        
   
        
        
        
        $affiche=$this->codegen_model->GetListeByRelation($select,$tab['tabprimaire'],$tab['tabetranger'],$tab['etranger'],$tab['primaire'],$group,$cd);
          $this->data['liste']=$affiche;
          $this->data['champ']= $ch;
          $this->data['id_liste']=$_GET['liste'];
          $this->data['label_liste']=$tab['tabetranger'];
          $this->data['listekey']=$key;
          $this->load->view('configuiration/AfficheListe',$this->data);
        
       
    }
    
	
    function DeleteContrainte()
    {
        
        
       $this->codegen_model->DeleteContrainte($_GET['cont'],$_GET['table']);
       redirect(base_url().'index.php/configuiration/configuiration');
    }
    function affiche()
    {
           $this->data['choix']="configuiration/ListePersonnaliser";
       
        $this->data['ch']=$this->codegen_model->getTablebyparametreliste($_GET['cle']);
      
           $this->load->view('templates/index', $this->data);
    }
 
    // afficher liste pour prametrage
    function affiche1()
    {
          
       
        $this->data['ch']=$this->codegen_model->getTablebyparametreliste($_GET['nomtable']);
      
           $this->load->view('configuiration/ListePersonnaliser',$this->data);
    }
    
    
    
         function edit(){        
     
	if(isset($_POST['monter']))
        {
	$this->load->helper('url');	
            $where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ; 
            $where1= array('liste'=>$_POST['nomtable'],'nom_champ !='=>$_POST['nom_champ'],'order'=>$_POST['order']-1);
            $data =array('order'=>$_POST['order']-1);
             $data1 =array('order'=>$_POST['order']);
           
			if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE)&&($this->codegen_model->editby('parametreliste',$data1,$where1) == TRUE))
			{
                            
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
			
	
        }
        if(isset($_POST['demonter']))
        {
	$this->load->helper('url');	
            $where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ; 
            $where1= array('liste'=>$_POST['nomtable'],'nom_champ !='=>$_POST['nom_champ'],'order'=>$_POST['order']+1);
            $data =array('order'=>$_POST['order']+1);
             $data1 =array('order'=>$_POST['order']);
           
			if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE)&&($this->codegen_model->editby('parametreliste',$data1,$where1) == TRUE))
			{
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
	
			
        //$this->template->load('content', 'membre_edit', $this->data);
      }
               if(isset($_POST['visible']))
        {
	$where= $where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('visiblite'=>1);
         if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
         
        }
    if(isset($_POST['invisible']))
        {
	$where= $where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('visiblite'=>0);
         if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
         
        }
        
        
      
         if(isset($_POST['groupement']))
        {
	$where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('groupment'=>1);
         if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
         
        } 
        
             if(isset($_POST['degrouper']))
        {
	 $where=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ']) ;
         $data =array('groupment'=>0);
         if (($this->codegen_model->editby('parametreliste',$data,$where) == TRUE))
			{
				redirect(base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$_POST['nomtable']);
			}
         
        } 
        
         $this->form_validation->set_rules('valeuroperation', 'valeur operation', 'required');
         if(isset($_POST['sup']))
         {
        if ($this->form_validation->run() == FALSE)
		{
            
            
             $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
                }
          else 
              {
              $data=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ'],'valeur'=>$_POST['valeuroperation'],'operation'=>$_POST['sup']);
              $this->codegen_model->add('condition_liste',$data);
                $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
              }
         }      
         
           if(isset($_POST['inf']))
         {
        if ($this->form_validation->run() == FALSE)
		{
            
            
             $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
                }
          else 
              {
              $data=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ'],'valeur'=>$_POST['valeuroperation'],'operation'=>$_POST['inf']);
              $this->codegen_model->add('condition_liste',$data);
                $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
              }
         }  
         
         
            if(isset($_POST['egale']))
         {
        if ($this->form_validation->run() == FALSE)
		{
            
            
             $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
                }
          else 
              {
              $data=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ'],'valeur'=>$_POST['valeuroperation'],'operation'=>$_POST['egale']);
              $this->codegen_model->add('condition_liste',$data);
                $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
              }
         } 
         
              if(isset($_POST['dif']))
         {
        if ($this->form_validation->run() == FALSE)
		{
            
            
             $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
                }
          else 
              {
              $data=array('liste'=>$_POST['nomtable'],'nom_champ'=>$_POST['nom_champ'],'valeur'=>$_POST['valeuroperation'],'operation'=>$_POST['dif']);
              $this->codegen_model->add('condition_liste',$data);
                $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
              }
         } 
        
        if(isset($_POST['condition']))
        {
            
      
          
            $this->operation($_POST['typechamp'],$_POST['nom_champ'],$_POST['nomtable']);
            
        }
        
 
      }
      function ListeTable()
      {
          
           $this->data['liste'] = $this->codegen_model->getTable();  
           $this->data['listpri']=$this->codegen_model->getTablePrimaire('formation');
              $this->data['choix']="configuiration/ajouteconstrainte";
           
             if(isset($_POST['tableetranger']))
             {
                 $this->data['resultsetg'] = $this->codegen_model->getTableType($_POST['tableetranger']);
               
                }
             
              if(isset($_POST['tableprimaire']))
             {
                 $this->data['resultspri'] = $this->codegen_model->getTableType($_POST['tableprimaire']);  
                 
                   $i=0;
                 foreach($this->data['resultspri'] as $valeur)
                 {
                     $tab_cle[$i]=$valeur->Key;
                     $i++;
                 }
                 if (in_array("PRI", $tab_cle)) {
                 
                   }
                else {
                    
                 
                    }
             }
             
             
             if(isset($_POST['ajouter']))
             {
              if($this->codegen_model->RechercheRelation($_POST['tableprimaire'],$_POST['tableetranger'],$_POST['cleetg'],$_POST['pri'])==0)
              {       
              $this->codegen_model->AddShema($_POST['tableetranger'],$_POST['cleetg'],$_POST['tableprimaire'],$_POST['pri']);
              }
           else 
               {?>
               <script language="javascript">
                   
                   alert("cette shema deja existe");
               </script>
              <?php 
               }
                 
             }
               $this->load->view('templates/index', $this->data); 
      }
      
      

}




/* End of file employer.php */
/* Location: ./system/application/controllers/employer.php */ 