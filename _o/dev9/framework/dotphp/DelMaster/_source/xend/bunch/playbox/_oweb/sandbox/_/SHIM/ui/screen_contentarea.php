<?php $loader = new loader(); $loc = getAppLoc();?>
<div id="contentbar">
	<nav>
		<div class="box">
			<header>
            	Navigation
            </header>
			
			<div class="box-scroll-spacer">
				<div class="content">
					<div class="area">
					<?php inc("../_client_area/nav_all.php"); ?>
					</div>
				</div>
			</div>
		</div>    
    </nav>
	
	


    <div id="mainarea">
       <table width="100%" border="0" cellspacing="0" cellpadding="0" id="inside">
          <tr>
            <td class="header" style="min-width:400px;">
			<?php print_msg($loader->get_location()); ?>
            </td>
            <td style="padding-right:0px; min-width:240px;">         
            
            <div style="float:right;" id="topMiniNav">
             <?php $loader->load_topMiniNav();?>            
            </div>
            </td>
          </tr>
          <tr>
            <td height="4" class="spacer">&nbsp;</td>
         </tr>
          <tr>
            <td colspan="2"> 
             <div class="area">
            <div class="content">
            <?php $loader->load_page(); ?>
            </div>
            </div>
            </td>
          </tr>
        </table>

    </div>