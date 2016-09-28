
<html>
<style type="text/css">
<!--
.Style1 {
	font-size: small;
	font-weight: bold;
	color: #000000;
}
-->
</style>
<head>
<link rel="shortcut icon" href="favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
<body background="<?php echo  base_url() ?>img/fondpasse.png" bgcolor="#CAE1F0" style="margin:0; background-repeat:no-repeat;">&nbsp;
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>


  <center>
    <table align="center" width="551" height="280"  border="0" cellpadding="0" background="<?php echo  base_url() ?>img/pass.png" style="margin:0; background-repeat:no-repeat;">
    <tr>
      <td valign="top" width="621" height="392">
         <?php  $this->form_validation->set_message('login', 'Your custom message here'); ?>
          <?php echo form_error('login', '<div class="error">', '</div>'); ?>
          
          <form  id="form1" name="f" method="post" action="<?php current_url(); ?>">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
          <table width="468" height="141" border="0" cellpadding="0">
            <tr>
              <td width="263" height="18" align="center" valign="bottom"><font color="#868A8B" face="Verdana, Arial, Helvetica, sans-serif" > &nbsp;&nbsp;<span class="Style1">Identifiant</span></font></td>
              <td width="199" align="center" valign="bottom">&nbsp;</td>
            </tr>
            <tr>
              <td height="22" colspan="2" align="center" valign="bottom"><label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="login" style="background:url(img/champs.gif);" id="textfield2" size="45">
              </label></td>
            </tr>
            <tr>
              <td height="18" align="center"><font color="#868A8B" face="Verdana, Arial, Helvetica, sans-serif" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="Style1">Mot De Passe</span></font></td>
              <td height="18" align="center">&nbsp;</td>
            </tr>
            <tr>
              <td height="73" colspan="2" align="center" valign="top"><label>
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" style="background:url(img/champs.gif);" name="mp" id="textfield" size="45">
              </label>
                <table width="334" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="191" height="24" align="center"></td>
                    <td width="28" align="center">&nbsp;</td>
                    <td width="70" align="center"><input type="submit" style="background-color:#FF9900; color:#FFFFFF; height:32px; width:70px; font-size:18px; font:Verdana, Arial, Helvetica, sans-serif;" value="Login" name="log"/></td>
                  </tr>
              </table></td>
            </tr>
          </table>
          
      </form>
      </td>
    </tr>
  </table>
</center>
</body></html>