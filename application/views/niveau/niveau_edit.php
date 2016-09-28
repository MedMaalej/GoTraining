

	  <div id="center-column">
			<div class="top-bar">
			  <h1>Utilisateur :[ Nouveau ]</h1>
		</div>
			<br />
<?php     

echo form_open(current_url()); ?>
                        <div class="select-bar" align="right">

		 <table width="180" border="0">
           <tr>
             <td width="90"><div align="center"><input type="submit" border="0" class="edit_button" value=""/></div></td>
             <td width="120"><div align="center"><a class="example7" href="<?php echo  base_url().'index.php/configuirationniveau/listechamp' ?>"><img  src="<?php echo base_url().'img/icon-32-config.jpg' ?>"></a></div></td>
             <td width="90"><div align="center"><a href="<?php echo base_url(); ?>index.php/niveau/niveau"><img src="<?php echo base_url(); ?>img/icon-32-cancel.png" alt="" width="32" height="30"></a></div></td>
           </tr>
           <tr>
             <td><div align="center">Enregistrer</div></td>
              <td width="120"<div align="center">Personaliser</div></td>
             <td><div align="center">Annuler</div></td>
           </tr>
         </table>
	    </div>
<?php echo $custom_error; ?>
<?php foreach($this->data['result'] as $valeur)
 { ?>
<?php echo form_hidden('code_niveau',$valeur["code_niveau"] )?>

                                    <p><label for="desig_niveau">Desig_niveau<span class="required">*</span></label>                                
                                    <input id="desig_niveau" type="text" name="desig_niveau" value="<?php echo $valeur["desig_niveau"] ?>"  />
                                    <?php echo form_error('desig_niveau','<div>','</div>'); ?>
                                    </p>
                                    
<p>
        <?php }  ?>
</p>
                   <?php       if($this->data['champ']!=NUll)
                                    {
                                    foreach($this->data['champ'] as $valeur)
                               { ?>
                                    <?php if($valeur['type']=='text') {?>
                                    <p><label for="<?php echo $valeur['nom_champ'] ;?>"><?php echo $valeur['label'] ;?><span class="required">*</span></label>                                
                                    <input id="<?php echo $valeur['nom_champ'] ;?>" type="text" name="<?php echo $valeur['nom_champ'] ;?>" value="<?php echo set_value($valeur['nom_champ']); ?>"  />
                                    
                                    </p>
                                    <?php } ?>
                                        <?php if($valeur['type']=='password') {?>
                                    <p><label for="<?php echo $valeur['nom_champ'] ;?>"><?php echo $valeur['label'] ;?><span class="required">*</span></label>                                
                                    <input id="<?php echo $valeur['nom_champ'] ;?>" type="password" name="<?php echo $valeur['nom_champ'] ;?>" value="<?php echo set_value($valeur['nom_champ']); ?>"  />
                                    
                                    </p>
                                    <?php } ?>
                                         <?php if($valeur['type']=='textarea') {?>
                                    <p><label for="<?php echo $valeur['nom_champ'] ;?>"><?php echo $valeur['label'] ;?><span class="required">*</span></label>                                
                                    <textarea id="<?php echo $valeur['nom_champ'] ;?>"  name="<?php echo $valeur['nom_champ'] ;?>"  ></textarea>
                                    
                                    </p>
                                    <?php } ?>
                                <?php }} ?>
<p>
       
</p>

<?php echo form_close(); ?>

</div>
