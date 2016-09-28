 <div id="center-column">
			<div class="top-bar">
			  <h1>Gestion des module </h1></div>
			    <form name="f" method="post" action="AjouterTableModule">
		
			<br />
                        <?php 
                       
                        ?>
		  <div class="select-bar" align="right" >
                     
	
                      
                     
	    </div>
                       
		
		

<?php


if(!$results){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
                       <th></th>
                       
                       <th width="182"><div >Table</div></th>
                         
				 
			    
				
                <th colspan="2"><div>Action</div></th>
		      </tr> 
  
    
<?php
   $l=  count($results);
   $i=0;
foreach($results as $valeur) { 
    

  
    ?>    
                      <tr>
                          <input type="hidden" name="length" value="<?php echo $l; ?>">
                      <input type="hidden" name="id_module" value="<?php echo $this->data['id']; ?>">
                      
                      <th  width="32"><input type="checkbox" name="table_module<?php echo $i; ?>" onclick="submit();" value="<?php  echo $valeur ?>"   <?php if($this->data['table']!=NULL) {if(in_array($valeur, $this->data['table'])) {?> checked="checked" <?php } }?>></th>
                      
            <th  width="32"><div align="center"><?php  echo $valeur ?></div></th>
			<?php $i++; ?>

<th><div><a href="<?php echo base_url().'index.php/competance/competance/edit/' ?>"><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>              
<th><div><a href="<?php echo base_url().'index.php/ConfiguirationModule/ConfiguirationModule/deletetable?table='.$valeur ?>&id=<?php $_GET['id'] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
         
                      </tr>
 
<?php } ?>
          </form>             
</table>
                    </div>
                        
                        <div class="table">
                            <table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                                <tr>
                                    <th><div>  nom table</div></th>
                                   
                                    <th colspan="2" width="115"><div>  action </div></th>
                            
                                </tr>
                                <?php 
                                if($this->data['liste']!=NULL)
                                {
                                foreach($this->data['liste'] as $valeur){ ?>
                                <tr>
                                    
                                        <th  width="32"><div align="center"><?php  echo $valeur['nom_table']; ?></div></th>  
                                         <th><div><a href="<?php echo base_url().'index.php/ConfiguirationModule/ConfiguirationModule/AjouteContrainte?nom_table='.$valeur['nom_table'].'&id_module='.$valeur['id_module'] ?>"  ><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>  
                                        <th><div><a href="<?php echo base_url().'index.php/ConfiguirationModule/ConfiguirationModule/deleteTableModule?nom_table='.$valeur['nom_table'].'&id_module='.$valeur['id_module'] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
                                  
                                </tr>
                                  <?php } }?>
                            </table>
                            
                        </div>
                        
                         <div class="table">
                             <?php echo validation_errors(); ?>
                          
                             <form name="frm" method="post" action="AjouterChamp">
                             <table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                                 <tr>
                                 <th><div>  nom table</div></th>
                                 <th><div><input type="text" name="nom_table"></div> </th>
                                  <th><div>  nombre de champ</div></th>
                                 <th><div><input type="text" name="nbchamp"></div> </th>
                             <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id_module" >
                             <th><div><input type="submit" name="ajoute" class="new" value=""></div></th>
                                 </tr>
                             </table>
                             </form>
                         </div>
                    

                    
                    
                     </h3>
		<p>&nbsp;		    </p>
		  <p><!-- Some integration calls -->
		   

		    <br />
		   
              </p>
              
              <div style=" width:50px; height: 50px;">

              </div>
	       
	  </div>
<?php
if(isset($_GET['erreur']))
{
    ?>
                        <script language="javascript">
                            alert("verfier ces information");
                        
                    </script>
                    <?php } ?>