

 <div id="center-column">
			<div class="top-bar">
			  <h1>Gestion des Liste </h1></div>
			    
		
			<br />
                        
		  <div class="select-bar" align="right" >
                     

                      
                     
	    </div>
                       
		
		

                        
                        <form name="liste" method="post" action="ajouter_liste">
                        <table>
                            <tr>
                                <td>nom de liste:</td>
                                <input type="hidden" name="liste" value="liste">
                                <td><input type="text" name="liste_name" value=""></td>
                                <input type="hidden" name="contraintename" value="<?php  echo @$_GET['cont']  ?>">
                                <td><input type="submit" value="ajouter"></td>
                            </tr> 
                             <tr>
                                <td></td>
                                <td>
                                   
                                </td>
                            </tr> 
                            <tr>
                                <td></td>
                                <td>
                                   
                                </td>
                            </tr> 
                            
                        </table>     
                        </form>
	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      
                     <th width="30"><div ></div></th>
                       
                       <th width="182"><div >id</div></th>

                    <th width="182"><div >nom de liste</div></th>
				 
			    
				
                <th colspan="3"><div>Action</div></th>
		      </tr> 
 
    <?php 
    if($liste!=NULL){
    foreach($liste as $valeur) {?>

                      <tr>
                     
            <th  width="32"><div align="center"><input type="radio" name="config"></div></th>

			<th  width="32"><div align="center"><?php echo $valeur['code_liste'] ?></div></th>
                          <th  width="32"><div align="center"><?php echo  $valeur['nom_liste'] ?></div></th>

<th><div><a href="<?php echo base_url().'index.php/configuiration/configuiration/affiche1?nomtable='.$valeur['code_liste']?>" class="example7"><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>              
<th><div><a href="<?php echo base_url().'index.php/configuiration/configuiration/delete/'.$valeur['code_liste'].'?cont='.$_GET['cont'] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
<th><div><a class="example7"  href="<?php echo base_url().'index.php/configuiration/configuiration/AfficheListe?liste='.$valeur['code_liste']  ?>" ><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>             
     
                            </tr>
                            <?php }} ?>
</table>
                    </div>
                    

                    
                    
                     </h3>
		<p>&nbsp;		    </p>
		  <p><!-- Some integration calls -->
		   

		    <br />
		   
              </p>
              
              <div style=" width:50px; height: 50px;">

              </div>
	     
	  </div>

