

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
             <td width="120"><div align="center"><a class="example7" href="<?php echo  base_url().'index.php/configuirationmembre/listechamp' ?>"><img  src="<?php echo base_url().'img/icon-32-config.jpg' ?>"></a></div></td>
             <td width="90"><div align="center"><a href="<?php echo base_url(); ?>index.php/membre/membre"><img src="<?php echo base_url(); ?>img/icon-32-cancel.png" alt="" width="32" height="30"></a></div></td>
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
<?php echo form_hidden('id',$valeur["id"] )?>

                                    <p><label for="login">Login<span class="required">*</span></label>                                
                                    <input id="login" type="text" name="login" value="<?php echo $valeur["login"] ?>"  />
                                    <?php echo form_error('login','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="pass">Pass<span class="required">*</span></label>                                
                                    <input id="pass" type="text" name="pass" value="<?php echo $valeur["pass"] ?>"  />
                                    <?php echo form_error('pass','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="abonnement">Abonnement<span class="required">*</span></label>                                
                                    <input id="abonnement" type="text" name="abonnement" value="<?php echo $valeur["abonnement"] ?>"  />
                                    <?php echo form_error('abonnement','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="civilite">Civilite<span class="required">*</span></label>                                
                                    <input id="civilite" type="text" name="civilite" value="<?php echo $valeur["civilite"] ?>"  />
                                    <?php echo form_error('civilite','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="active">Active<span class="required">*</span></label>                                
                                    <input id="active" type="text" name="active" value="<?php echo $valeur["active"] ?>"  />
                                    <?php echo form_error('active','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="groupe">Groupe<span class="required">*</span></label>                                
                                    <input id="groupe" type="text" name="groupe" value="<?php echo $valeur["groupe"] ?>"  />
                                    <?php echo form_error('groupe','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="email">Email<span class="required">*</span></label>                                
                                    <input id="email" type="text" name="email" value="<?php echo $valeur["email"] ?>"  />
                                    <?php echo form_error('email','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="prenom">Prenom<span class="required">*</span></label>                                
                                    <input id="prenom" type="text" name="prenom" value="<?php echo $valeur["prenom"] ?>"  />
                                    <?php echo form_error('prenom','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="nom">Nom<span class="required">*</span></label>                                
                                    <input id="nom" type="text" name="nom" value="<?php echo $valeur["nom"] ?>"  />
                                    <?php echo form_error('nom','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="date_debut">Date_debut<span class="required">*</span></label>                                
                                    <input id="date_debut" type="text" name="date_debut" value="<?php echo $valeur["date_debut"] ?>"  />
                                    <?php echo form_error('date_debut','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="date_fin">Date_fin<span class="required">*</span></label>                                
                                    <input id="date_fin" type="text" name="date_fin" value="<?php echo $valeur["date_fin"] ?>"  />
                                    <?php echo form_error('date_fin','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test7">Test7<span class="required">*</span></label>                                
                                    <input id="test7" type="text" name="test7" value="<?php echo $valeur["test7"] ?>"  />
                                    <?php echo form_error('test7','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test8">Test8<span class="required">*</span></label>                                
                                    <textarea id="test8" name="test8"><?php echo $valeur["test8"] ?></textarea>
                                    <?php echo form_error('test8','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test10">Test10<span class="required">*</span></label>                                
                                    <input id="test10" type="text" name="test10" value="<?php echo $valeur["test10"] ?>"  />
                                    <?php echo form_error('test10','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test11">Test11<span class="required">*</span></label>                                
                                    <input id="test11" type="text" name="test11" value="<?php echo $valeur["test11"] ?>"  />
                                    <?php echo form_error('test11','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test12">Test12<span class="required">*</span></label>                                
                                    <input id="test12" type="text" name="test12" value="<?php echo $valeur["test12"] ?>"  />
                                    <?php echo form_error('test12','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="test20">Test20<span class="required">*</span></label>                                
                                    <input id="test20" type="text" name="test20" value="<?php echo $valeur["test20"] ?>"  />
                                    <?php echo form_error('test20','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="aaa">Aaa<span class="required">*</span></label>                                
                                    <input id="aaa" type="text" name="aaa" value="<?php echo $valeur["aaa"] ?>"  />
                                    <?php echo form_error('aaa','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="bbb">Bbb<span class="required">*</span></label>                                
                                    <input id="bbb" type="text" name="bbb" value="<?php echo $valeur["bbb"] ?>"  />
                                    <?php echo form_error('bbb','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="xxxx">Xxxx<span class="required">*</span></label>                                
                                    <input id="xxxx" type="text" name="xxxx" value="<?php echo $valeur["xxxx"] ?>"  />
                                    <?php echo form_error('xxxx','<div>','</div>'); ?>
                                    </p>
                                    

                                    <p><label for="hhhh">Hhhh<span class="required">*</span></label>                                
                                    <input id="hhhh" type="text" name="hhhh" value="<?php echo $valeur["hhhh"] ?>"  />
                                    <?php echo form_error('hhhh','<div>','</div>'); ?>
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
