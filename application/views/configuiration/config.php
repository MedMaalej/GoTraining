 <div id="center-column">
      
			<div class="top-bar">
			  <h1>Configuration</h1></div>
			   
		
			<br />
		  <div class="select-bar" align="right">
		 <table width="189" border="0">
           <tr>
             <td width="97"></td>
             <td width="82"><div align="center"><a href="<?php echo base_url(); ?>index.php/membre/add"><img src="<?php echo base_url(); ?>img/icon-32-new.png" alt="" width="32" height="30"></a></div></td>
           </tr>
           <tr>
             <td></td>
			  <td><div align="center">Nouveau</div></td>
           </tr>
         </table>
                      
                      
	    </div>
		<h3>&nbsp;</h3>
		<h3>
                    <form name="frm1" method="post" action="configuiration">
                        
                         <label> module: </label>
                        <select name="module" onchange="submit();">
                            <?php
                          
                            foreach($this->data['modules'] as $valeur)
                            {
                           ?>
                            <option value="<?php echo $valeur['id'] ?>" <?php if($valeur['id'] ==@$_POST['module'])  { echo"selected='selected'" ;  }?> > <?php echo $valeur['module'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label> Section: </label>
                        
                        <select name="Section">
                            <?php
                             
                            foreach($this->data['section'] as $valeur)
                            {
                           ?>
                            <option value="<?php echo $valeur['section'];?>"> <?php echo $valeur['section'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        
                    </form>
                    <form name="frm" method="post" action="configuiration" >
                       
                        
                        <br><br>
                    <?php
$db_tables = $this->db->list_tables();

?>
  <label> Table:  </label>                    
 <select name="nomtable" <?php if($_POST['nomtable']==$_POST['nomtable']){echo "selected='selected'";} ?>>
     <option value="employer">employer</option>
     <option value="competance">competance</option>
     <option value="membre">membre</option>
</select>                       
                        <input type="submit" value="envoyer">
                        <br> <br>            
                    </form>
<?php



if(!$results){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		        
				 
			    <th width="182"><div >label</div></th>
                              <th width="182"><div >Etat</div></th>    
			
                <th colspan="4"><div>Action</div></th>
		      </tr> 
    <?php
    
for($i=0;$i<count($results);$i++)
       {
    $n=count($results)-1;
    
    ?>
                      <tr>
                           <form name="f<?php echo $i; ?>" method="post" action="configuiration/edit">
                      <?php
            $id = array_values($results[$i]);
            ?>
            <input type="hidden" name="nom_champ" value="<?php echo$id[0]; ?>" >
             <input type="hidden" name="nomtable" value="<?php echo $id [1]; ?>" >
             <input type="hidden" name="order" value="<?php echo $id [2]; ?>" >
          
<th  width="32"><div align="center"><?php echo $id[5]; ?></div></th>
<th  width="32"><div align="center"><?php if($id [4]==1)echo "visible"; else echo"invisible"; ?></div></th>
<th width="32"><div><?php if(($i!=0)and($i!=1)){ ?><input type="submit" value="monter" name="monter"><?php }?></div></th>              
<th width="32"><div><?php if(($i!=$n) and($i!=0)) {?><input type="submit" value="demonter" name="demonter"><?php } ?></div></div></th>  
<th width="32"><div><?php if($i !=0 ) {  if($id['3']==0) {?><input type="submit" value="visible" name="visible"><?php } }?></div></div></th>  
<th width="32"><div><?php if($i !=0 ) { if($id['3']==0) {?><input type="submit" value="invisible" name="invisible"><?php } }?></div></div></th>  
                           </form>
                      </tr>
     <?php   }
        
?>
</table>
                  
                    </div>

                    
                    
                     </h3>
		<p>&nbsp;		    </p>
		  <p><!-- Some integration calls -->
		  

		    <br />
		   
              </p>
	                 <div style=" width:50px; height: 50px;">
                  <?php
// vie
 
echo $this->pagination->create_links();

?>
              </div>   
	  </div>
<script type="text/javascript">
function deletechecked(link)
{
    var answer = confirm('Delete item?')
    if (answer){
        window.location = link;
    }
    
    return false;  
}

</script>