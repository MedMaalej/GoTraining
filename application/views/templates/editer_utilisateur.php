
	  <div id="center-column">
			<div class="top-bar">
			  <h1>Utilisateur :[ Modification ]</h1>
		</div>
        <form name="form1" action="" method="post">
			<br />
		  <div class="select-bar" align="right">

		 <table width="180" border="0">
           <tr>
             <td width="90"><div align="center"><input type="submit" border="0" class="edit_button" value=""/></div></td>
             <td width="90"><div align="center"><a href="utilisateur" target="_parent"><img src="<?php echo base_url(); ?>img/icon-32-cancel.png" alt="" width="32" height="30"></a></div></td>
           </tr>
           <tr>
             <td><div align="center">Enregistrer</div></td>
             <td><div align="center">Annuler</div></td>
           </tr>
         </table>
	    </div>
		
	        
<table border="0">
	<tbody>

<tr><td><p>D&eacute;tails de l'utilisateur </p>
    <p>&nbsp;</p></td></tr>

<tr>
  <td>Prenom*</td>
  <td><input size="40" type="text" name="prenom" value=""></td>
</tr>
<tr>
  <td>Nom*</td><td><input size="40" type="text" name="nom" value=""></td></tr>
<tr>
  <td>E-mail*</td><td><input size="40" type="text" name="email" value=""></td></tr> 
<tr>
  <td>Login* </td>
  <td><input size="40" type="text" name="login" value=""></td>
</tr>
<tr>
  <td>Mot de passe* </td><td> <input size="40" type="password" name="pass" value=""></td></tr>
<tr>
  <td>Confirmation du mot de passe* </td><td><input size="40" type="password" name="pass_confirm" value=""></td></tr>
  <tr>
		<td align="left"> Groupe</td>
		<td align="left">				<select name="groupe" style="width:277px; text-align:center" >

	<option value="administrateur" > Administrateur </option>
	</select></td></tr><tr>
	  <td>Bloquer l'utilisateur </td>
	  <td><input   name="active" value="0" type="radio">
	  Oui
	    <input   name="active" value="1" type="radio">
	    Non</td>
	</tr>
	<tr>
		<td><span class="star">*Champs requis</span></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
</td>
	</tr>
</tbody></table>

      <input type="hidden" name="MM_update" value="form1">
      <input type="hidden" name="id" value="">
	</form>  
    <p>&nbsp;</p>
	  </div>

