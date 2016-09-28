<div class="top-bar">
			  <h1>Ajouter Table </h1></div>
<br />
                        <?php 
                       
                        ?>
		  <div class="select-bar" align="right" >
                     
	
                      
                     
	    </div>




<div class="table">
<form name="frm" action="AjouterTable" method="post">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
    
    <tr>
		      
                       
                       <th width="182"><div >cle</div></th>
                         
			<th width="182"><div >Null</div></th>	 
			<th width="182"><div >auto incriment</div></th>	
                        <th width="182"><div > champ</div></th>	
		        <th width="182"><div > type</div></th>	  
                      <th width="182"><div > default</div></th>	
    </tr> 
    
    
    
    <tr>
       <input  type="hidden" name="nbchamp" value="<?php echo $this->data['nbchamp']; ?>" >
<?php  for($i=0; $i<$this->data['nbchamp'];$i++)
{
    ?>
        <td><input type="checkbox" name="cle[]" value="<?php echo $i ?>"></td>
        <td><input type="checkbox" name="nul[]" value="<?php echo $i ?>" ></td>
        <td><input type="checkbox" name="incr[]" value="<?php echo $i ?>" ></td>
<td>
<input type="text" name="champ<?php echo $i ?>" value="">
</td>
<td>
<select name="type<?php echo $i ?>">
    <option value="text">text</option>
    <option value="varchar(100)">varchar</option>
    <option value="int(11)">int</option>
     <option value="float">float </option>
     <option value="decimal">decimal</option>
     <option value="real">real</option>
    
</select>
</td>
<td><input type="text" name="default<?php echo $i ?>"></td>
</tr>
<?php } ?>
</table>     
<input type="hidden" name="nom_table" value="<?php echo  $this->data['nom_table']; ?>">
<input type="hidden" name="id_module" value="<?php echo  @$this->data['id_module']; ?>">
<input type="submit" value="valider">
</form>
</div>
<?php

if(isset($message))
{
    ?>
<script language="javascript">
    alert("<?php echo $message ?>");
    </script>
    <?php 
}

?>
