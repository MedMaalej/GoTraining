 <div id="center-column">
			<div class="top-bar">
			  <h1>Gestion des utilisateurs </h1></div>
			    <form name="f" method="post" action="competance/competance">
		
			<br />
                        <?php 
                       
                        ?>
		  <div class="select-bar" align="right" >
                     
		 <table width="189" border="0">
           <tr>
             <td width="97">
                 <select name="filter">
                 <?php 
             
                 foreach($this->data['filter'] as $v){  ?>
                  
                     
                     <option value="<?php echo $v['nom_champ'] ?>" <?php if(@$_POST['filter']==$v['nom_champ']){echo 'selected=selected';} ?>> <?php echo $v['label'] ?>  </option>
           <?php  } ?>
                   </select>   
                 </td>
                 <td width="82"><div align="center"><a class="example7"  href="<?php echo  base_url().'index.php/competance/configuirationcompetance' ?>"><img src="<?php echo base_url(); ?>img/icon-32-new.png" alt="" width="32" height="30"></a></div></td>
           </tr>
           <tr>
             <td>  </td>
			  <td><div align="center">Nouveau</div></td>
           </tr>
         </table>
                      
                     
	    </div>
                        <h3><a  href='<?php echo base_url(); ?>index.php/competance/competance/add'> nouveau</a></h3>
                        <h3><input type="text" name="textrechreche" onkeypress="if (event.keyCode == 13)submit;"><input type="submit" value="rechercher" name="actrecherche"> </h3>         
		
		

<?php

if(!$results){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      <?php $k=0;
                      foreach($this->data['chaine'] as $valeur) { $k++;?>
                       
                       <th width="182"><div ><?php echo $valeur['label'] ;?></div></th>
                           <?php } ?>
				 
			    
				
                <th colspan="2"><div>Action</div></th>
		      </tr> 
    <?php
    
for($i=0;$i<count($results);$i++)

       { ?>
                      <tr>
                      <?php
            $id = array_values($results[$i]);?>
                          <?php  for($s=0 ;$s<$k;$s++) {?>
            <th  width="32"><div align="center"><?php echo $id[$s]; ?></div></th>
			
<?php } ?>
<th><div><a href="<?php echo base_url().'index.php/competance/competance/edit/'.$id[0] ?>"><img src="<?php echo base_url(); ?>img/icon-32-edit.png" alt="" width="16" height="14"></a></div></th>              
<th><div><a href="<?php echo base_url().'index.php/competance/competance/delete/'.$id[0] ?>"  onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></div></th>   
         
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
	        </form>
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