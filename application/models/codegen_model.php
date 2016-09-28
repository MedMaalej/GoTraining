<?php
class Codegen_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    
    function get($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        
         
        if($where){
        $this->db->where($where);
        }
       
        $query = $this->db->get();
       
        
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
    }
    
    function getRecherche($recherche,$table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
       
           $this->db->like($recherche); 
        if($where){
        $this->db->where($where);
        }
      
        $query = $this->db->get();
       
        
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
    }
    //module configuiration
     function getPrametre($table,$fields,$tb,$perpage=0,$start=0,$one=false,$array='array'){
        
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->limit($perpage,$start);
        
         
       
        $this->db->where($tb);
        
        $this->db->order_by("order", "asc"); 
       
        $query = $this->db->get();
       
        
        $result =  !$one  ? $query->result($array) : $query->row() ;
        return $result;
    }
    
    
   
    
    
    function getliste($where)
    {
     $this->db->select('liste.code_liste,liste.nom_liste');
$this->db->from('liste');
$this->db->join('table_liste', 'table_liste.nom_liste = liste.code_liste');
$this->db->where($where);
$query = $this->db->get();   
        
         
          if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
        
    }
    
    
      function afficheUser($where)
    {
        
          $this->db->select('*');
$this->db->from('membre');

$this->db->where($where);
$query = $this->db->get();   
        
         
          if ($query->num_rows() > 0)
		{
			return true;
		}
        
          
    }
    
   function AfficherColloneByliste($where)
   {
       $this->db->select('*');
       $this->db->from('parametreliste');
       $this->db->where($where);
       $this->db->order_by("order", "asc");
       
       $query =$this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
       
       
   }
   
   function ListeModule()
        {
       
           $this->db->select('*');
       $this->db->from('module');
    
     
       $query =$this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
            
        }
        
        
       function GetTableByModule($module)
       {
           
            $this->db->select('*');
       $this->db->from('module_table');
    
     $this->db->where($module);
       $query =$this->db->get();
        
        
       return $query->num_rows();
	
       }
        
      function ListeTableModule($id)
      {
          
           $this->db->select('*');
       $this->db->from('module_table');
       $this->db->where('id_module',$id);
    
     
       $query =$this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
          
      }
   
    function AfficheListeConditionByListe($liste)
  {
           $this->db->select('*');
       $this->db->from('condition_liste');
       $this->db->where('liste',$liste);
  
       $query =$this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}  
        
      
  }
   
   function AfficherColloneByGroupe($where)
   {
       $this->db->select('*');
       $this->db->from('parametreliste');
       $this->db->where($where);
       $this->db->order_by("order", "asc");
       $query =$this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
       
       
   }
   
   function GetRelationByListe($where)
   {
       $this->db->select('*');
       $this->db->from('table_liste');
       $this->db->where($where);
        $query = $this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
       
   }
    
    function getByModule($table,$fields,$where=''){
        
        $this->db->select($fields);
        $this->db->from($table);
       
        if($where){
        $this->db->where($where);
        }
        $this->db->order_by("id","asc");
        $query = $this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
        
    }
    
    
    
     function getSectionByModule($where=''){
        
        $this->db->select('section');
        $this->db->from('section');
       
      
        $this->db->where('id_module',$where);
       
        
        $query = $this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
        
    }
    function getTablebyparametreliste($liste)
    {
       
         $this->db->select('*');
        $this->db->from('parametreliste');
        $this->db->where('liste',$liste);
        $this->db->distinct('nom_champ');
        
        $this->db->order_by('order','asc');
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }       
        
    }
    function getTableByFicher($where,$wherein)
    {
        $this->db->select('nom_champ,label,order');
        $this->db->from('prametrechamp');
        $this->db->where($where);
        $this->db->where_in('etat', $wherein);
        $this->db->order_by('order','asc');
        $query=$this->db->get();
        if($query->num_rows()>0)
        {
            return $query->result_array();
        }        
        
    }
    
    
    
  // get premiere module
    function  getPremiereModule()
    {
        $this->db->select('id,module');
        $this->db->from('module');
       $this->db->order_by("id","asc");
        $this->db->limit(0,1);
        
        $query = $this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
    }
    
    
    //derniere liste 
     function  getLastLIste()
    {
        $this->db->select('*');
       
      
         $this->db->order_by('code_liste','asc');
         
        $this->db->limit(0,1);
        
        $query = $this->db->get('liste');

       if ($query->num_rows()>0)
		{
			return $query->result_array();
		}
    }
    
    function getListeChampBytable($table,$where,$db){
        
        $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db($db,$this->Lien);
        
  
    $Requete="SHOW COLUMNS FROM $table";
   $Ressource = mysql_query($Requete,$this->Lien);

$TabResultat=array();
$i=0;
while ($Ligne = mysql_fetch_assoc($Ressource))
{
foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
$i++;
} 
    return $TabResultat;   
    }
    
    
     function  getListeFiltre($where)
    {
        $this->db->select('for_table,nom_champ,label');
        $this->db->from('prametrechamp');
       $this->db->where($where);
       $this->db->order_by("order","asc");
       
        $query = $this->db->get();
        
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
     }
     
     function getTable()
     {
         
         $db_tables = $this->db->list_tables();
       
      
      
	return $db_tables;
                
		
     
     }
    function getTableType($table)
    {
        $result = $this->db->query("SHOW FIELDS from " . $table);
        return $result->result();
    }
     
    function getTablePrimaire($db)
    {
     
    $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db('information_schema',$this->Lien);
        
  
    $Requete="SELECT * 
FROM  `TABLE_CONSTRAINTS` 
WHERE TABLE_SCHEMA =  '$db'
AND CONSTRAINT_TYPE =  'PRIMARY KEY'";
   $Ressource = mysql_query($Requete,$this->Lien);

$TabResultat=array();
$i=0;
while ($Ligne = mysql_fetch_assoc($Ressource))
{
foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
$i++;
} 
    return $TabResultat;  
    }
    
    
 
    
    function GetDetailRelation($nom_relation)
    {
                
       $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db('information_schema',$this->Lien);
      
  
    $Requete="SELECT c.CONSTRAINT_NAME,k.TABLE_NAME,k.REFERENCED_TABLE_NAME, k.COLUMN_NAME, k.REFERENCED_COLUMN_NAME,k.CONSTRAINT_SCHEMA
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS k
INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS c
       ON k.CONSTRAINT_SCHEMA = c.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME = c.CONSTRAINT_NAME
WHERE c.CONSTRAINT_TYPE = 'FOREIGN KEY' and k.CONSTRAINT_SCHEMA='formation' and k.CONSTRAINT_NAME='$nom_relation'";
   $Ressource = mysql_query($Requete,$this->Lien);

$TabResultat=array();
$i=0;
while ($Ligne = mysql_fetch_assoc($Ressource))
{
foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
$i++;
} 
    return $TabResultat;
    }
    
    function GetKeyByTable($table)
    {
        $result = $this->db->query("SHOW FIELDS from " . $table);
        if ($result->num_rows() > 0)
		{
			return $result->result_array();
		}
    }
    
    //creation nouvelle table
    
    
   
    function AjouterTable($ch,$table,$primary)
    {
        if($primary!="")
        {
        $result = $this->db->query("CREATE TABLE  ".$table." (".$ch.",".$primary.") engine=innodb;");
        }
       else 
         {
           $result = $this->db->query("CREATE TABLE  ".$table." (".$ch.") engine=innodb;");
         }
          
        
     
        
        
    }
    
    function deletetable($table)
    {
    $this->db->trans_begin();
    $this->db->query(" drop table $table");
    try {
      if ($this->db->trans_status() === FALSE)
     {
         
           $this->db->trans_rollback();
           throw new Exception('We have had an error trying to add this dog.  Please go back and try again.');
      }
      else
	{
     $this->db->trans_commit();
     throw new Exception('We have had an error trying to add this dog.  Please go back and try again.');
    
	}
    }
    catch(Exception $e)
    {
        return false;
          echo $e->getMessage();
    }
   

        
    }
    function GetListeByRelation($select,$tabprimaire,$tabetranger,$etranger,$primaire,$group,$cd)
            
    {
        
       $this->db->select($select);
       $this->db->from($tabprimaire);
       $this->db->where($cd);
       $this->db->join($tabetranger,"$tabprimaire.$primaire=$tabetranger.$etranger");
       $this->db->group_by($group);
        
        $query = $this->db->get();
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
        
        
    }
    
    	function getbytablebyid($table,$fields,$where=''){
        
        $this->db->select($fields);
        $this->db->from($table);
       
        if($where){
        $this->db->where($where);
        }
        
        $query = $this->db->get();
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
        
    }
function getChampAjouter($table,$fields,$where)
{
      $this->db->select($fields);
        $this->db->from($table);
       
        if($where){
        $this->db->where($where);
        }
        
        $query = $this->db->get();
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
}
    
    function add($table,$data){
        $this->db->insert($table, $data);         
        if ($this->db->affected_rows() == '1')
		{
			return mysql_insert_id(); ;
		}
		
		return FALSE;       
    }
    
    function edit($table,$data,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }
    
     function editby($table,$data,$fieldID){
        $this->db->where($fieldID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0)
		{
			return TRUE;
		}
		
		return FALSE;       
    }



function getrelation()
    {
        
       $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db('information_schema',$this->Lien);
      
  
    $Requete="SELECT c.CONSTRAINT_NAME,k.TABLE_NAME,k.REFERENCED_TABLE_NAME, k.COLUMN_NAME, k.REFERENCED_COLUMN_NAME,k.CONSTRAINT_SCHEMA
FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS k
INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS c
       ON k.CONSTRAINT_SCHEMA = c.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME = c.CONSTRAINT_NAME
WHERE c.CONSTRAINT_TYPE = 'FOREIGN KEY' and k.CONSTRAINT_SCHEMA='formation'";
   $Ressource = mysql_query($Requete,$this->Lien);

$TabResultat=array();
$i=0;
while ($Ligne = mysql_fetch_assoc($Ressource))
{
foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
$i++;
} 
    return $TabResultat;   
 }
 
 
 function RechercheRelation($tableprimaire,$tableetranger,$cleetg,$pri)
    {
        
       $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db('information_schema',$this->Lien);
      
  
     $Requete="SELECT k.TABLE_NAME,k.REFERENCED_TABLE_NAME, k.COLUMN_NAME, k.REFERENCED_COLUMN_NAME,k.CONSTRAINT_SCHEMA FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS k INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS c ON k.CONSTRAINT_SCHEMA = c.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME = c.CONSTRAINT_NAME WHERE c.CONSTRAINT_TYPE = 'FOREIGN KEY' and k.CONSTRAINT_SCHEMA='formation' and k.TABLE_NAME ='$tableetranger' and k.REFERENCED_TABLE_NAME='$tableprimaire'";
   $Ressource = mysql_query($Requete,$this->Lien);
    $num= mysql_num_rows($Ressource);
   return $num;
 }
 
 function DeleteContrainte($constrainte,$table)
 {
       $this->db->query('ALTER TABLE '.$table.' DROP FOREIGN KEY  '.$constrainte);
     
     
 }
 function RelationByCONSTRAINT_NAME($contrainte)
 {
         $this->Lien=mysql_connect('localhost','root','');
 
      $this->Base = mysql_select_db('information_schema',$this->Lien);
      
  
     $Requete="SELECT c.CONSTRAINT_NAME,k.TABLE_NAME,k.REFERENCED_TABLE_NAME, k.COLUMN_NAME, k.REFERENCED_COLUMN_NAME,k.CONSTRAINT_SCHEMA FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS k INNER JOIN INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS c ON k.CONSTRAINT_SCHEMA = c.CONSTRAINT_SCHEMA AND k.CONSTRAINT_NAME = c.CONSTRAINT_NAME WHERE c.CONSTRAINT_TYPE = 'FOREIGN KEY' and k.CONSTRAINT_SCHEMA='formation' and c.CONSTRAINT_NAME='$contrainte'";
   $Ressource = mysql_query($Requete,$this->Lien);
   $TabResultat=array();
   $i=0;
while ($Ligne = mysql_fetch_assoc($Ressource))
{
foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
$i++;
} 
    return $TabResultat;   
    
     
 }
 
 
 // function jionture entre deux table
 function creationListeMultiple($table,$join,$cle,$etranger,$chaine)
 {
   $this->db->select($chaine);
        $this->db->from($table);
       
        
        $ch="$table.$cle=$join.$etranger";
        $this->db->join($join,$ch, 'left');

        
        
        $query = $this->db->get();
        
       if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}  
     
     
 }
 function updatecle($tab,$contrainte)
 {
    // $req=$this->db->query("alter table $tab ");
    
     $req1=$this->db->query("ALTER TABLE $tab DROP PRIMARY KEY ");
    
     $req1=$this->db->query("ALTER TABLE $tab ADD PRIMARY KEY ($contrainte)");

     
 }
 function deletecollone($tab,$collone)
 {
     $this->db->query("alter table $tab drop COLUMN  $collone");
     
 }
    
    function delete($table,$fieldID,$ID){
        $this->db->where($fieldID,$ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
    
    function deletebymodule($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    } 
    
    
    function affichetable($table)
    {
         $req=$this->db->query("SHOW COLUMNS FROM $table");
          if ($req->num_rows() > 0)
		{
			return  $req->result_array();
		}  
        
    }
    
    function editcollone($table,$Field,$champ,$type,$default,$null,$auto)
    {
       if($auto=="")
       {
         $req=$this->db->query("ALTER TABLE $table MODIFY $Field $type $null DEFAULT '$default';");
       }
   else {
         $req=$this->db->query("ALTER TABLE $table MODIFY $Field $type $null $auto ;"); 
       }
    }
    
    function AfficheCollonebyTable($table,$Field)
    {
       $req=$this->db->query("SHOW COLUMNS FROM $table where Field='$Field'");
          if ($req->num_rows() > 0)
		{
			return  $req->result_array();
		}     
    }
    
     function deleteByListe($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }   
    
    
    
   // configuiration liste add shema
   function AddShema($tb,$cleetg,$tbp,$clepri)
   {
       
       $this->db->query('alter table'.' '.$tb.'  engine=InnoDB');
        $this->db->query('alter table'.' '.$tbp.'  engine=InnoDB');
       $this->db->query('ALTER TABLE '.' '.$tb.'  ADD CONSTRAINT'.' '.'FOREIGN KEY ('.$cleetg.') REFERENCES '.$tbp.'('.$clepri.')ON DELETE CASCADE ON UPDATE CASCADE ');
 
   }


   function deletebychamp($table,$where){
        $this->db->where($where);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;        
    }    
    
	
	function count($table){
            
		return $this->db->count_all($table);
	}
        
        function countTable($where)       
       {
          $this->db->select('nom_champ');
        $this->db->from('prametrechamp');
        $this->db->where('section',$where);
        $this->db->order_by('order','asc');
        $query=$this->db->get();
      
            return $query->num_rows();
              
           	
       }
               
        function countTablebyparametre($where)       
       {
          $this->db->select('nom_champ');
        $this->db->from('prametrechamp');
        $this->db->where($where);
        $this->db->order_by('order','asc');
        $query=$this->db->get();
      
            return $query->num_rows();
              
           	
       }
       

        
        
}