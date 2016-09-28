
<div id="center-column">
			<div class="top-bar">
			  <h1>Gestion de relation </h1></div>
			    
		
			<br />
                       
		  <div class="select-bar" align="right" >
                     
	
                    
                     
	    </div>
                           <h3><a  href='<?php echo base_url(); ?>index.php/configuiration/configuiration/ListeTable'> nouveau</a></h3>
                        		
		

<?php

if(!$results){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		<th ></th>
		<th ><div>Base donner</div></th>
               <th><div>table de cle etranger</div></th>
               <th><div>cle etranger</div></th>
               <th><div>table de cle primaire</div></th>
              <th><div>cle primaire</div></th>
                <th colspan="2"><div>Action</div></th>
		      </tr> 
                      <form name="f" method='post' action="configuiration/affiche_liste">
    <?php
    $i=0;
    
foreach($results as $valeur)
 { 
    $i++;
    ?>
                      <tr>
                      
                      <input type="hidden" name="tableprimary" value="<?php echo $valeur['REFERENCED_TABLE_NAME'] ; ?>">
                      <input type="hidden" name="primary" value="<?php echo $valeur['REFERENCED_COLUMN_NAME'] ; ?>">
                      <input type="hidden" name="tableetranger" value="<?php echo $valeur['TABLE_NAME'] ; ?>">
                      <input type="hidden" name="etranger" value="<?php echo $valeur['COLUMN_NAME'] ; ?>">
                      <th><input type="radio" name="cle" value="<?php echo $valeur['CONSTRAINT_NAME'] ; ?>"></div></th>
            <th  width="100"><div align="center"><?php echo $valeur['CONSTRAINT_SCHEMA'] ;?></div></th>
             <th  width="100"><div align="center"><?php echo $valeur['TABLE_NAME'] ;?></div></th>
          <th  width="100"><div align="center"><?php echo $valeur['COLUMN_NAME'] ;?></div></th>	
         
         <th  width="100"><div align="center"><?php echo $valeur['REFERENCED_TABLE_NAME'] ;?></div></th>
           <th  width="100"><div align="center"><?php echo $valeur['REFERENCED_COLUMN_NAME'] ;?></div></th>
<th><div><a href="<?php echo base_url(); ?>index.php/configuiration/configuiration/PersonaliserRelation?cont=<?php echo $valeur['CONSTRAINT_NAME']?>" >editer</a></div></th>    

<th><div><a href="<?php echo base_url(); ?>index.php/configuiration/configuiration/DeleteContrainte?cont=<?php echo $valeur['CONSTRAINT_NAME'] ; ?>&table=<?php echo $valeur['TABLE_NAME'] ; ?>" onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
                      </tr>
     <?php   }
        
?>
                                            </form>

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
 


?>
              </div>
	      
	  </div>
