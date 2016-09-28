
 <link href="<?php echo base_url().'css/all.css'; ?>" rel="stylesheet" type="text/css" />


<div id="center-column">
			
			    
		
			<br />
                        <?php 
                       
                        ?>
	
                           
		
		

<?php

if(!$ch){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		
		<th width="182"><div >filter</div></th> 
			    <th width="182"><div >label</div></th>
                              <th width="182"><div >Etat</div></th>    
                               <th width="182"><div >grouper</div></th>   
			
                <th colspan="7"><div>Action</div></th>
		      </tr> 
        <?php
    
for($i=0;$i<count($ch);$i++)
       {
    $n=count($ch)-1;
    
    ?>
                      <tr>
                           <form name="f<?php echo $i; ?>" method="post" action="edit">
                      <?php
            $id = array_values($ch[$i]);
            ?>
            <input type="hidden" name="nom_champ" value="<?php echo$id[1]; ?>" >
             <input type="hidden" name="nomtable" value="<?php echo $id [0]; ?>" >
             
             <input type="hidden" name="order" value="<?php echo $id [3]; ?>" >
              <input type="hidden" name="typechamp" value="<?php echo $id [8]; ?>" >
    <th width="32"><div><?php if($i!='0') {?><input type="checkbox" value="1" name='filter' onclick="submit();" <?php if($id['2']==1)echo 'checked=checked'; ?>> <?php }?></div></div></th>        
<th  width="32"><div align="center"><?php echo $id[1]; ?></div></th>
<th  width="32"><div align="center"><?php if($id [4]==1)echo "visible"; else echo"invisible"; ?></div></th>
<th  width="32"><div align="center"><?php if($id [5]==1)echo "grouper"; else echo"degrouper"; ?></div></th>
<th width="32"><div><?php if(($i!=0)and($i!=1)){ ?><input type="submit" value="monter" name="monter"><?php }?></div></th>              
<th width="32"><div><?php if(($i!=$n) and($i!=0)) {?><input type="submit" value="demonter" name="demonter"><?php } ?></div></div></th>  
<th width="32"><div><?php if($i !=0 ) {  ?><input type="submit" value="visible" name="visible"><?php }?></div></div></th>  
<th width="32"><div><?php if($i !=0 ) {?><input type="submit" value="invisible" name="invisible"><?php  }?></div></div></th>  
 <th width="32"><div><?php if($i !=0 ) {?><input type="submit" value="Groupement" name="groupement"><?php  }?></div></div></th>
 <th width="32"><div><?php if($i !=0 ) {?><input type="submit" value="degrouper" name="degrouper"><?php  }?></div></div></th>
 <th width="32"><div><?php if($i !=0 ) {?><input type="submit" value="condition" name="condition"><?php  }?></div></div></th>
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

              </div>
	     
	  </div>
