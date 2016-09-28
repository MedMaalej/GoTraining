 <div id="center-column">
			<div class="top-bar">
			  <h1>Gestion des module </h1></div>
			    <form name="f" method="post" action="competance/competance">
		
			<br />
                     
		  <div class="select-bar" align="right" >
                     
	
                      
                     
	    </div>
                       
		
		

<?php


?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      
                       
                       <th width="182"><div >Table</div></th>
                         
				 
			    
				
                <th colspan="2"><div>Action</div></th>
		      </tr> 
  
    
<?php
if($results!=NULL)
{
foreach($results as $valeur) { ?>    
                      <tr>
                
            <th  width="32"><div align="center"><?php  echo $valeur['module'] ?></div></th>
			

<th><div><a href="<?php echo base_url().'index.php/ConfiguirationModule/ConfiguirationModule/Liste_Table?id='.$valeur['id'] ?>"><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>              
<th><div><a href="<?php echo base_url().'index.php/ConfiguirationModule/ConfiguirationModule/delete/'.$valeur['id'] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
         
                      </tr>
 
<?php } }?>
          </form>             
</table>
                    </div>
                        
                         <div class="table">
                       
                          
                             <form name="frm" method="post" action="ConfiguirationModule/add">
                             <table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                                 <tr>
                                 <th><div>  nom module</div></th>
                                 <th><div><input type="text" name="nom_module"></div> </th>
                                 
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

