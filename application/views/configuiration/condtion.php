
<?php echo validation_errors(); ?>
<form name="frm" method="post" action="edit">

<?php
if( $this->data['op']!=NULL)
{
    foreach( $this->data['op'] as $valeur)
    {
        if($valeur=='>')
        {
            ?>
<input type="submit" name="sup" value=">">
<?php
        }
        
        
                if($valeur=='<')
        {
            ?>
<input type="submit" name="inf" value=">">
<?php
        }
        
                       if($valeur=='=')
        {
            ?>
<input type="submit" name="egale" value="=">
<?php
        }
        
                       if($valeur=='!=')
        {
            ?>
<input type="submit" name="dif" value="!=">
<?php
        }
    }
}


?>
<input type="text" name="valeuroperation" >
<input type="hidden" name="typechamp" value="<?php echo  $this->data['champtype']; ?>" >
<input type="hidden" name="nom_champ" value="<?php echo $this->data['champ']; ?>">
<input type="hidden" name="nomtable" value="<?php echo $this->data['liste']; ?>">

</form>
<br><br>



