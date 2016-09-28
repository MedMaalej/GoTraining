<?php

class configuirationBD extends CI_Controller {
    
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
        if(isset($_GET['erreur']))
        {
            $this->data['erreur']=1;
        }
        
        
       $this->data['results']= $this->db->list_tables();
           $this->data['choix']="configuirationBD/configuirationBD_List";
              
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
    function AjouterChamp()
    {
         $this->form_validation->set_rules('nom_table', 'nom table', 'required|varchar');
          $this->form_validation->set_rules('nbchamp', 'nombre de champ', 'required|integer');
    if(isset($_POST['ajoute']))
    {
          if ($this->form_validation->run() == FALSE)
          {
              
        redirect(base_url().'index.php/configuirationBD/configuirationBD?erreur=1');
              
          }
  if ($this->form_validation->run() == TRUE)
      {    
 
       if(isset($_POST['nbchamp']))
       {
        $this->data['nbchamp']=$_POST['nbchamp'];
        $this->data['nom_table']=$_POST['nom_table'];
       }
       else
       {
         $this->data['nbchamp']=$nbchamp;
        $this->data['nom_table']=$nom_table;   
       }
      
        $this->data['choix']="configuirationBD/configuirationBD_Ajoute";
        $this->load->view("templates/index.php",$this->data);
      }
    }    
        
    }
    function verif($tab,$nb)
    {
        $b=true;
         $i=0;
         $cont=0;
          do
          {
       
       
        do
        {
        if( $tab[$cont]!="")
        {
            if((@$tab[$cont]==@$tab[$i])&&($i!=$cont))
                $b=false;
        }
        else 
        {
            $b=false;
        }
         
          
            
            
             $i++;
        }
        while(($b==true)&&($i<$nb));
         $cont++;
          }while(($cont<$nb)&&($b==true));
           return $b;
    }
    
   
    
    function AjouterTable()
    {
      
       // $mat=extract($_POST);
       for($cont=0;$cont<$_POST['nbchamp'];$cont++)
       {
        $mat[$cont]= $_POST['champ'.$cont];  
       
       
    }
       
       $validation=$this->verif($mat,$_POST['nbchamp']);
       //$vide=$this->verifchampide($mat);
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
        
        if(($b==0)||($validation==false))
        {
    
     $this->data['choix']="configuirationBD/configuirationBD_Ajoute";
      $this->data['nbchamp']=$_POST['nbchamp'];
      $this->data['nom_table']=$_POST['nom_table'];
      $this->data['message']="valider les champ du table";
     
        $this->load->view("templates/index.php",$this->data);
        }
 else {
    
      $this->codegen_model->AjouterTable($ch,$_POST['nom_table'],$primary);
      
      redirect(base_url().'index.php/configuirationBD/configuirationBD');
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
    
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('competance') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">'.validation_errors().'</div>' : false);

        } else
        {     
            
              $where=array('for_table'=>'competance','section'=>'competance_add.php');
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
                    'designation_comp' => set_value('designation_comp')
            );
           
            $tb[0]='designation_comp';
            
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
            
			if ($this->codegen_model->add('competance',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(base_url().'index.php/competance/competance/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured.</p></div>';

			}
		}
          $where=array('for_table'=>'competance','section'=>'competance_add.php');
          $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
         $this->data['choix']="competance/competance_add";
	  $this->load->view('templates/index', $this->data);
	
        //$this->template->load('content', 'competance_add', $this->data);
    }	
    
  
    
    function edit()
    {   
        if(isset($_POST['table']))
        {
            $table=$_POST['table'];
            $this->data['table']=$_POST['table'];
            
        }
        else
        {
             $this->data['table']=$_GET['table'];
            $table=$_GET['table'];
        }
        
       
     
      
         
         $this->data['results']=$this->codegen_model->affichetable($table);
         $cont=0;
         foreach($this->data['results'] as $valeur)
         {
             if($valeur['Key']=='YES')
             {
                // echo $tab[$cont];
                 $tab[$cont]=$valeur['Key'];
                 $cont++;
             }
         }
         
           if(isset($_POST['clep']))
        {  
          
            $ch=implode(',',$_POST['cle']);
           
            $this->codegen_model->updatecle($_POST['table'],$ch);
        }
         $this->data['choix']="configuirationBD/configuirationBD_Edit";
	$this->load->view('templates/index', $this->data);
      
       
        
  
    }
    
    
    function editcollone()
    {
        if(isset($_POST['modifier']))
        {
            if($_POST['type']=="text")
            {
                $default="";
            }
   
            else
            {
                if(in_array($_POST['type'], array('int(11)','float','decimal','real')))
                {
                    if(is_numeric($_POST['default']))
                    {
                        $default=$_POST['default'];
                    }
                  else 
                      {
                      
                       $default="0";
                      }
                }  
                else 
                 {
                $default=$_POST['default']; 
                 }
                
            }
            
            if(isset($_POST['null']))
            {
                $n="NULL";
            }
        else 
            {
            $n="NOT NULL";
            }
             if(isset($_POST['auto']))
            {
                $auto=$_POST['auto'];
            }
        else 
            {
            $auto="";
            }
           
            $this->codegen_model->editcollone($_POST['table'],$_POST['Field'],$_POST['champ'],$_POST['type'],$default,$n,$auto);
             redirect(base_url().'index.php/configuirationBD/configuirationBD/edit?table='.$_POST['table']);
        }
 
       
        if(isset($_GET['table']))
        {
        $this->data['table']=$_GET['table'];
        $this->data['Field']=$_GET['Field'];
         $this->data['results']=$this->codegen_model->AfficheCollonebyTable($_GET['table'],$_GET['Field']);
        }
        else
        {
             $this->data['table']=$_POST['table'];
        $this->data['Field']=$_POST['Field']; 
         $this->data['results']=$this->codegen_model->AfficheCollonebyTable($_POST['table'],$_POST['Field']);
        }
        
        $this->data['choix']="configuirationBD/configuirationBD_Edit_Collone";
	$this->load->view('templates/index', $this->data);
        
    }




    function deletecollone()
  {
      $this->codegen_model->deletecollone($_GET['table'],$_GET['collone']);
       redirect(base_url().'index.php/configuirationBD/configuirationBD/edit?table='.$_GET['table']);
  }
    
	function AfficheFormAjouter()
   {
      $where=array('for_table'=>'competance','section'=>'competance_add.php');
      $this->data['result'] = $this->codegen_model->getChampAjouter('prametrechamp','nom_champ,for_table,section,filter,order,etat,visiblite,label,type',$where);
       $this->data['choix']="competance/competance_add";
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
            redirect(base_url().'index.php/configuirationBD/configuirationBD');
          
    }
}




/* End of file competance.php */
/* Location: ./system/application/controllers/competance.php */ 