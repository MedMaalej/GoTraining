
	  <div id="center-column">
			<div class="top-bar">
			  <h1>Gestion des utilisateurs </h1></div>
			    <form name="f" method="post" action="editer_utilisateur">
		
			<br />
		  <div class="select-bar" align="right">
		 <table width="189" border="0">
           <tr>
             <td width="97"><div align="center"><input name="editer"  type="submit" border="0" class="edit_button" value="" /></div></td>
             <td width="82"><div align="center"><a href="<?php echo base_url(); ?>index.php/page/chargement/ajouter_utilisateur"><img src="<?php echo base_url(); ?>img/icon-32-new.png" alt="" width="32" height="30"></a></div></td>
           </tr>
           <tr>
             <td><div align="center">Editer</div></td>
			  <td><div align="center">Nouveau</div></td>
           </tr>
         </table>
	    </div>
		<h3>&nbsp;</h3>
		<h3>
		  <div class="table">
		    
		    <table width="672" height="10" cellpadding="0" cellspacing="0" class="listing">
		      <tr>
		        <th  width="32"><div align="center">#</div></th>
				  <th width="37">&nbsp;</th>
			    <th width="182"><div >Nom</div></th>
				 <th width="104"><div >Identifiant</div></th>
			    <th width="60"><div >Active</div></th>
			    <th width="116"><div >E-mail</div></th>
			    <th width="25"><div >ID</div></th>
                <th><div>Action</div></th>
		      </tr> 
		      <tr> 
          
			    <td >1</td>
				<td><label>
			        <input type="radio" name="id" value="">
				</label></td>
               
                <td>text</td>
				    <td>text</td>
                                    <td><img src='<?php echo base_url(); ?>img/yes.png'></td>
				      <td>text</td>
					   <td>text</td>
                                           <td><a href="suprimutilisateur.php?id=text" onClick="return confirm('Etes vous sur de vouloir supprimer cette enregistrement ?');"><img src="<?php echo base_url(); ?>img/supp.png" alt="" width="16" height="14"></a></td>
              </tr>
           
	        </table>
		  </div>
		  </h3>
		<p>&nbsp;		    </p>
		  <p><!-- Some integration calls -->
		   

		    <br />
		   
              </p>
	        </form>
	  </div>


