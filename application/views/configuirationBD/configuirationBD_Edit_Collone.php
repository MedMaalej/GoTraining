<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form name="frm" method="post" action="editcollone">
<table>
    <?php foreach($results as $valeur) {?>
   <tr>
       <td> collone:</td>
    <td><input name="champ1"  type="text" value="<?php echo $valeur['Field'] ?>" disabled="disabled" ></td>
    <input name="champ"  type="hidden" value="<?php echo $valeur['Field'] ?>" >
    </tr>
    <tr>
        <td>Type:</td>
        <td>
<select name="type">
    <option value="int(11)" <?php if($valeur['Type']=='int(11)'){ ?> selected="selected" <?php } ?>>int</option>
     <option value="float" <?php if($valeur['Type']=='float'){ ?> selected="selected" <?php } ?>>float</option>
      <option value="decimal" <?php if($valeur['Type']=='decimal'){ ?> selected="selected" <?php } ?>>decimal</option>
       <option value="real" <?php if($valeur['Type']=='real'){ ?> selected="selected" <?php } ?>>real</option>
     <option value="varchar(100)" <?php if($valeur['Type']=='varchar(100)'){ ?> selected="selected" <?php } ?>>varchar</option>
      <option value="text" <?php if($valeur['Type']=='text'){ ?> selected="selected" <?php } ?>>text</option>
</select>
        </td>
        
</tr>
<tr>
    <td>D&eacute;faut : </td>
    <td>
<input  name="default" type="text" value="<?php echo $valeur['Default'] ?>"> 
    </td>
</tr>
<tr>
    <td>Null</td>
    <td>
<input type="checkbox" name="null" value="1" >
<input type="hidden" name="Field" value="<?php echo $this->data['Field'] ?>">
<input type="hidden" name="table" value="<?php echo $this->data['table'] ?>">
    </td>
</tr>
<?php if(($valeur['Key']=='PRI')&&($valeur['Type']=="int(11)")){ ?>
<tr>
    <td>AUTO_INCREMENT:</td>
    <td>
<input name="auto" value="auto_increment" type="checkbox" <?php if($valeur['Extra']=='auto_increment'){ ?> checked="checked" <?php } ?>>

    </td>
</tr>
<?php } ?>
  <?php } ?>  

</table>
<input type="submit" name="modifier">
</form>