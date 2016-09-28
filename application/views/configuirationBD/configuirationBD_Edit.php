 <div id="center-column">
			<div class="top-bar">
			  <h1><?php echo $this->data['table']; ?></h1></div>
			    <form name="f" method="post" action="edit">
		
			<br />
                        <?php 
                       
                        ?>
		  <div class="select-bar" align="right" >
                     
	
                      
                     
	    </div>
                       
		
		

	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      
                       <th></th>
                       <th width="182"><div >Champs</div></th>
                             <th><div >Type</div></th>
                         
				 <th width="182"><div >NULL</div></th>
                              <th width="182"><div >cle primaire</div></th>
			     <th width="182"><div > Default</div></th>
				 <th width="182"><div >Extra</div></th>
                <th colspan="2"><div>Action</div></th>
		      </tr> 
  
    
<?php foreach( $this->data['results'] as $valeur) {
    
    if(($valeur['Field']!="date_creation")&&($valeur['Field']!="date_modification")&&($valeur['Field']!="user_create")&&($valeur['Field']!="user_update"))
    {
        ?> 
                      
                      <tr>
                 <th><input type="checkbox" name="cle[]" value="<?php  echo $valeur['Field'] ;?>"></th>
            <th  width="32"><div align="center"><?php  echo $valeur['Field'] ?></div></th>
             <th  width="32"><div align="center"><?php  echo $valeur['Type'] ?></div></th>
            <th  width="32"><div align="center"><?php  echo $valeur['Null'] ?></div></th>
           <th  width="32"><div align="center"><?php  echo $valeur['Key'] ?></div></th>
            <th  width="32"><div align="center"><?php  echo $valeur['Default'] ?></div></th>
              <th  width="32"><div align="center"><?php  echo $valeur['Extra'] ?></div></th>

<th><div><?php if(($valeur['Key']!='MUL')){?><a  href="<?php echo base_url().'index.php/configuirationBD/configuirationBD/editcollone?table='.$this->data['table'].'&Field='.$valeur['Field'] ?>"><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a><?php } ?></div></th>              
<th><div><?php if(($valeur['Key']!='PRI')){?><a href="<?php echo base_url().'index.php/configuirationBD/configuirationBD/deletecollone?collone='.$valeur['Field'] ?>&table=<?php echo $this->data['table'] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a><?php } ?></div></th>   
         
                      </tr>
 
<?php } }?>
</table>
                    </div>
                        
     
                    

                    
                    
                     </h3>
		<p>&nbsp;		    </p>
		  <p><!-- Some integration calls -->
		   

		    <br />
		   
              </p>
              
              <div style=" width:50px; height: 50px;">
 <input type="hidden" name="table" value="<?php echo $this->data['table']; ?>">
<input type="submit" name="clep"   value="cle"  >  
              </div>
	       
	  </div>

          </form>           
