<?php

class ConfiguirationModule extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('codegen_model','',TRUE);
                $this->load->dbforge();
	}	
	
	function index(){
        $this->load->library('table');
        $this->load->library('pagination');
        //bloc personalisation
      
        
        
       $this->data['results']= $this->codegen_model->ListeModule();
           $this->data['choix']="configuirationmodule/configuirationmodule_List";
              
	   $this->load->view('templates/index', $this->data); 
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        //bloc personalisation
        if(isset($_GET['erreur']))
        {
            $this->data['erreur']=1;
        }
        
        
       $this->data['results']= $this->db->list_tables();
           $this->data['choix']="configuirationBD/configuirationBD_List";
              
	   $this->load->view('templates/index', $this->data); 
	  
       //$this->template->load('content', 'competance_list', $this->data); // if have template library , http://maestric.com/doc/php/codeigniter_template
		
    }
    function add()
    {
        
        $data=array('module'=>$_POST['nom_module']);
        
        if ($this->codegen_model->add('module',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule');
			}
			
        
    }
    function Liste_Table()
    {
       
         $this->load->library('table');
        $this->load->library('pagination');
        //bloc personalisation
      
        
        
              $this->data['results']= $this->db->list_tables();
               $this->data['choix']="configuirationmodule/configuirationmodule_List_table";
              $this->data['id']=$_GET['id'];
              
              $re=$this->codegen_model->ListeTableModule($_GET['id']);
               $this->data['liste']=$this->codegen_model->ListeTableModule($_GET['id']);;
              
             $i=0;
            if($re!=NULL)
            {
              foreach($re as $valeur)
              {
                  $tab[$i]=$valeur['nom_table'];
                  $i++;
                  
              }
            }
         else {
             
               $tab=NULL;
              }
             
            $this->data['table']=$tab;  
             
	   $this->load->view('templates/index', $this->data); 
        
    }
    
    
    function deletetable()
    {
            if($this->codegen_model->deletetable($_GET['table'])==FALSE) 
            {
                ?>
    <script language="javascript">
        alert("supprimer table enfant ou supprimer la relation");
    </script>
           <?php
            }
            redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?id='.$_GET['id']);
          
    }
    
    function AjouterTableModule()
    {
        $l=$_POST['length'];
        for($i=0;$i<$l;$i++)
     { 
        if(isset($_POST['table_module'.$i]))
        {
            $table_module=$_POST['table_module'.$i];
        
   
        $where=array('id_module'=>$_POST['id_module'],'nom_table'=>$table_module);
      
        $nb=$this->codegen_model->GetTableByModule($where);
        if($nb==0)
        {
        $data=array('id_module'=>$_POST['id_module'],'nom_table'=>$_POST['table_module'.$i]);
        
        $this->codegen_model->add('module_table',$data);
        
        }
        }
    }
         redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?id='.$_POST['id_module']);
        
         //$this->load->view('templates/index', $this->data); 
        
    }
    
    function AjouteContrainte()
      {
          
           $this->data['liste'] = $this->codegen_model->getTable();  
           
           if(isset($_GET['nom_table']))
           {
           $this->data['table']= array('table'=>$_GET['nom_table']);
           }
           else
           {
              $this->data['table']= array('table'=>$_POST['tableprimaire']); 
           }
                   //$this->codegen_model->getTableType($_GET['nom_table']);
           $this->data['choix']="configuirationmodule/ajouteconstrainte";
           
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
    
    
    
     function AjouterChamp()
    {
         $this->form_validation->set_rules('nom_table', 'nom table', 'required|varchar');
          $this->form_validation->set_rules('nbchamp', 'nombre de champ', 'required|integer');
    if(isset($_POST['ajoute']))
    {
          if ($this->form_validation->run() == FALSE)
          {
              ?>
              
                  <?php
        redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?erreur=1&id='.$_POST['id_module']);
              
          }
  if ($this->form_validation->run() == TRUE)
      {    
 
       if(isset($_POST['nbchamp']))
       {
        $this->data['nbchamp']=$_POST['nbchamp'];
        $this->data['nom_table']=$_POST['nom_table'];
        $this->data['id_module']=$_POST['id_module'];
        
       }
       else
       {
           
         $this->data['id_module']=$id_module;   
         $this->data['nbchamp']=$nbchamp;
         $this->data['nom_table']=$nom_table;   
         
       }
      
        $this->data['choix']="configuirationBD/configuirationBD_Ajoute";
        $this->load->view("templates/index.php",$this->data);
      }
    }    
        
    }
    
    
       function AjouterTable()
    {
      
        
        
   
       
            $k=0;
            
            
            $b=1;
            if(isset($_POST['cle']))
            {
                $length=count($_POST['cle']);
          $primary= "PRIMARY KEY(";  
        foreach($_POST['cle'] as $valeur)
        {
              if($_POST['type'.$valeur]!='text')
           {    
            if($k<$length-1)
            {
                
            $primary=$primary.$_POST['champ'.$valeur].",";
            
            }
           else 
            {
              $primary=$primary.$_POST['champ'.$valeur].")" ; 
            }
            
           }
           else
           {
            $b=0;
         
           }
           $key[$k]=$_POST['champ'.$valeur];
           $k++;
        }
            }
         else 
         {
           $primary="";  
         }
        $ch="";
        
        for($i=0;$i<$_POST['nbchamp'];$i++)
        {
           $tab[$i]=$_POST['champ'.$i];
        }
        for($i=0;$i<$_POST['nbchamp'];$i++)
        {
           $nrep= $this->veriftable($_POST['champ'.$i],$tab);
           
          /* if($nrep>1)
        {
            ?>
         <script langauage="javascript">
         alert("Dupliquer  nom de la colonne");
    
        </script>   
    <?php
     
     
        redirect(base_url().'index.php/configuirationBD/configuirationBD');
        }*/
           
           
           
           
            $n="";
            if(isset($_POST['nul']))
            {
            foreach($_POST['nul'] as $valeur)
            {
                if($_POST['champ'.$valeur]==$_POST['champ'.$i])   
               {
                   if(in_array($_POST['champ'.$valeur],$key)) 
                   {
                     $n="NOT NULL";
                   }
                   else
                   {
                       $n="NULL" ;    
                   }    
               }
               else 
               {
                   
                 $n="NOT NULL";
               
               }
            } 
            }
            $inc="";
           
           if(isset( $_POST['incr']))
           {
            foreach($_POST['incr']as $val)
            {
               
                   if($_POST['champ'.$val]==$_POST['champ'.$i])   
                   {
                       //contole sur type il faut ajouter
                       $inc=$inc."AUTO_INCREMENT";
                   }
                  
            }
           }
              $def="";
              if($inc!="AUTO_INCREMENT")
              {
                  
                if($_POST['default'.$i]!="")
                {
                
                     if($_POST['type'.$i]=="text")
                     {
                       $def=$def."DEFAULT "."''";  
                     }   
                     
                     if(in_array($_POST['type'.$i], array('int(11)','float','decimal','real')))
                     {
                        if(is_numeric($_POST['default']))
                        {
                           $def=$def."DEFAULT "." '".$_POST['default'.$i]."'"; 
                        }
                        else
                        {
                           $def=$def."DEFAULT "."0"; 
                        }
                     }
                     if($_POST['type']=="varchar(100)")
                     {
                     $def=$def."DEFAULT "." '".$_POST['default'.$i]."'";
                     }
                }  
              }
          /*  else 
            {
             
                if(($_POST['type'.$i]="int(11)")||($_POST['type'.$i]="float")||($_POST['type'.$i]="decimal")||($_POST['type'.$i]="real"))
                {
                   $def=$def."DEFAULT  0";   
                }
                else
                {    
              $def=$def."DEFAULT "."''";  
                }
            } */
             
              
            if($i!=$_POST['nbchamp']-1)
            {
                   
            $ch=$ch.$_POST['champ'.$i]." ".$_POST['type'.$i]." ".$n." ".$def." ".$inc.",";
                
            }
            else
            {
                 $meta="date_creation  date default '". date('Y-m-d')." ',date_modification  date, user_create varchar(100),user_update varchar(100)";
                 $ch=$ch.$_POST['champ'.$i]." ".$_POST['type'.$i]." ".$n." ".$def." ".$inc."".",".$meta;  
            }
               
            
            
           $data['champ'][$i]=$_POST['champ'.$i];
           $data['type'][$i]=$_POST['type'.$i];
            
          }
        
        if($b==0)
        {
            ?>
         <script langauage="javascript">
    alert("modifier  type");
    
    </script>   
    <?php
     $this->data['choix']="configuirationBD/configuirationBD_Ajoute";
      $this->data['nbchamp']=$_POST['nbchamp'];
      $this->data['nom_table']=$_POST['nom_table'];
      $this->data['id_module']=$_POST['id_module'];
     
        $this->load->view("templates/index.php",$this->data);
        }
 else {
     
      $this->codegen_model->AjouterTable($ch,$_POST['nom_table'],$primary);
      
      redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?id='.$_POST['id_module']);
 }
        
    }
    
    
       function veriftable($val,$tab)
    {
          $j=0;
        for($i=0;$i<count($tab);$i++)  
        {
       if(in_array($val, $tab)) 
          {
           $j++;
          }
        }   
          
        return $j;
    }
    
    
    
    
    
             function deleteTableModule()
             {
                   $where=array('id_module'=>$_GET['id_module'],'nom_table'=>$_GET['nom_table']);
                   $this->codegen_model->deletebymodule('module_table',$where);             
                 redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?id='.$_GET['id_module']);
    
             }
    
      
       function delete(){
           $ID =  $this->uri->segment(4);
           
            $this->codegen_model->delete('module','id',$ID); 
             $this->codegen_model->delete('module_table','id_module',$ID);
            redirect(base_url().'index.php/ConfiguirationModule/ConfiguirationModule');
    }
    
}




/* End of file competance.php */
/* Location: ./system/application/controllers/competance.php */ 