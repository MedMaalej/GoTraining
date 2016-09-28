 
 <link href="<?php echo base_url().'css/all.css'; ?>" rel="stylesheet" type="text/css" />



		

                         <form name="ajoute" method="post" action="configuirationfonction/ajoutechamp">

	
                 

<?php



if(!$results){
	echo '<h1>No Data</h1>';
	exit;
}
?>	
                   
                 
                        <label>Ajouter champ</label>  <br><br> 
                        <label>Zone</label> 
                        <select multiple name="type">
                            <option value="text">text</option>
                            <option value="textarea">textarea</option>
                            <option value="password">password</option>
                            
                        </select> <input type="submit" name="ajoute" class="new" value="" style="margin-left: 50px;"><br><br>
                        <label>label champ   :</label> <input type="text" name="labelchamp"><br><br>
                        <label> type champ  :</label> <select name="typechamp">
                                                      <option value="int">int</option>
                                                      <option value="varchar(50)">varchar</option>
                                                      <option value="text">text</option>
                                                       </select>
                     
                        
                    </form> 
                 
                    <br><br><br>
               <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		        
				<th width="182"><div >filter</div></th> 
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
                           <form name="f<?php echo $i; ?>" method="post" action="configuirationfonction/edit">
                      <?php
            $id = array_values($results[$i]);
            ?>
            <input type="hidden" name="nom_champ" value="<?php echo$id[0]; ?>" >
             <input type="hidden" name="nomtable" value="<?php echo $id [1]; ?>" >
             <input type="hidden" name="order" value="<?php echo $id [2]; ?>" >
    <th width="32"><div><?php if($i!='0') {?><input type="checkbox" value="1" name='filter' onclick="submit();" <?php if($id['6']==1)echo 'checked=checked'; ?>> <?php }?></div></div></th>        
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

                    
                    
	                 <div style=" width:50px; height: 50px;">
                  <?php
// vie
 
echo $this->pagination->create_links();

?>
            
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
