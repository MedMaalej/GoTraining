<?php session_start();  ?>
<html>
<head>

	<title>Admin</title>
          <link media="screen" rel="stylesheet" href="<?php echo base_url().'css/colorbox.css' ?>" />
	<script src="<?php echo base_url().'js/jquery-1.4.2.min.js' ?>"></script>
	<script src="<?php echo base_url().'js/jquery.colorbox.js' ?>"></script>
        <script src="<?php echo base_url().'js/power.js' ?>"></script>
 
 
      
	<script>
		$(document).ready(function(){
			//Examples of how to assign the ColorBox event to elements
			$("a[rel='example1']").colorbox();
			$("a[rel='example2']").colorbox({transition:"fade"});
			$("a[rel='example3']").colorbox({transition:"none", width:"75%", height:"75%"});
			$("a[rel='example4']").colorbox({slideshow:true});
			$(".example5").colorbox();
			$(".example6").colorbox({iframe:true, innerWidth:425, innerHeight:344});
			$(".example7").colorbox({width:"80%", height:"80%", iframe:true, onClosed:function(){ location.reload(true); }});
			$(".example8").colorbox({width:"50%", inline:true, href:"#inline_example1"});
			$(".example9").colorbox({
				onOpen:function(){ alert('onOpen: colorbox is about to open'); },
				onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
				onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
				onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
				onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
			});
			
			//Example of preserving a JavaScript event for inline calls.
			$("#click").click(function(){ 
				$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
				return false;
			});
		});
	</script>
        <link href="<?php echo base_url().'css/all.css'; ?>" rel="stylesheet" type="text/css" />

<body>
<div id="main">
	<div id="header">
	<?php include("menu.php"); ?>	
	</div>
	<div id="middle">
		<div id="left-column">
			<?php include("left.php"); ?>
		</div>
             <div class="center-column">
	                <?php 
                        
                        // bloc liste
                     
                       
                      
                    if(isset($choix)&&$choix!=""){
                            if(isset($results)&&($results!=""))
                            {
                           $data['results']=$results;
                           
                         $this->load->view($choix,$data); 
                          }
                          // bloc editer
                         else  if(isset($result)&&($result!=""))
                            {
                           $data['result']=$result;
                           
                          $this->load->view( $choix,$data); 
                          }
                        // bloc ajoute 
                       else 
                       {
                          $this->load->view($choix);   
                       }
                 
                 } 
                 else
                 {
                    $this->load->view( $choix);
                 } 
?>
        </div>
</div>
	<div id="footer"><?php include("footer.php"); ?></div>
	</div>	
</body>
</html>

