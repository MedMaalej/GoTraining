
<form name="frm" action="AjouteContrainte" method="post"> 
<table border="0">
    <tr>
        <td> table cle primaire</td>   
    <td>    
<select name="tableprimaire" onchange="submit();"><?php
if($this->data['table'] != NULL)
{
foreach($this->data['table'] as $valeur)
{
    if(($valeur!="parametreliste")&&($valeur!="table_liste")&&($valeur!="prametrechamp")&&($valeur!="liste"))
    {
?>

    <option value="<?php echo $valeur  ?>"  <?php if(@$_POST['tableprimaire']==$valeur){ ?> selected="selected" <?php }?>>  <?php echo $valeur  ?> </option>
   
<?php }}
}
?>
 </select>
    <td></td>

        <td> table cle etranger</td>   
    <td>    
<select name="tableetranger" onchange="submit();"><?php
if($liste != NULL)
{
foreach(@$liste as $valeur)
{
    if(($valeur!="parametreliste")&&($valeur!="table_liste")&&($valeur!="prametrechamp")&&($valeur!="liste"))
    {
?>

    <option value="<?php echo $valeur  ?>" <?php if(@$_POST['tableetranger']==$valeur){ ?> selected="selected" <?php }?>><?php echo $valeur  ?></option>
   
<?php }}
}
?>
 </select>
    <td></td>
</tr>
</table>
    
    
  
     <div class="table">
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      
                       
                       <th width="182"><div >champ</div></th>
                      <th width="182"><div >type</div></th>
                     <th width="182"><div >primaire</div></th>
				 
			    
				
                <th colspan="2"><div>Action</div></th>
		      </tr> 
    <?php
  if(@$resultspri != NULL)
{  
foreach(@$resultspri as $valeur)

       { 
    if(@$_POST['pri']==$valeur->Field)
    {
        $type=$valeur->Type;
    }
    
    ?>
                      <tr>
                   
            
                          
            <th  width="32"><div align="center"><?php echo $valeur->Field ?></div></th>
             <th  width="32"><div align="center"><?php echo $valeur->Type ?></div></th>  
<th  width="32"><div align="center"><?php echo $valeur->Key ?></div></th>  
			

<th><div><?php if($valeur->Key =='PRI') { ?><input type="radio" name="pri" onclick="submit();"  value="<?php echo $valeur->Field?>" <?php if(@$_POST['pri']==$valeur->Field ){ ?> checked="checked"   <?php } ?>><?php }?></div></th>              

         
                      </tr>
     <?php   } } ?>
</table>
                    </div>
    
    
    
    
    <?php  // fin bloc primaire ?>
    <?php  // debut bloc etranger ?>
    
    
    
     <div class="table">
         
<table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
                   <tr>
		      
                       
                       <th width="182"><div >champ</div></th>
                      <th width="182"><div >type</div></th>
                     <th width="182"><div >primaire</div></th>
				 
			    
				
                <th colspan="1"><div>Action</div></th>
		      </tr> 
    <?php
   if(@$resultsetg!= NULL) 
   {
foreach(@$resultsetg as $valeur)

       { 
    
    
    ?>
                      <tr>
                   
            
                          
            <th  width="32"><div align="center"><?php echo $valeur->Field ?></div></th>
             <th  width="32"><div align="center"><?php echo $valeur->Type ?></div></th>  
<th  width="32"><div align="center"><?php echo $valeur->Key ?></div></th>  
			

              
<th><div><?php if(($valeur->Key!='PRI') &&($valeur->Type==@$type) ){?><input type="radio" name="cleetg" value="<?php echo $valeur->Field ; ?>"><?php } ?></div></th>   
         
                      </tr>
     <?php   } }?>
</table>
             </div>
    
    
    <input type="submit" value="ajouter" name="ajouter" style="margin-top:0px; margin-right: 25px; float: right; ">
    </form>
                    
    
    
    
   