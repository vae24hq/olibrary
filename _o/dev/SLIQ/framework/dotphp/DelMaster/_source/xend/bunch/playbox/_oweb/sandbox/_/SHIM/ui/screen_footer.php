<?php $appInfo = new appInfo; ?>
<!--footer section -->
<table width="100%" align="center" cellpadding="0" cellspacing="0" id="futabar">
	<tr>
        <td valign="bottom" class="futabar">
			<product>				
				<brand><?php print_msg($appInfo->getInfo("brand")); ?></brand>&#8482;
				<name><?php print_msg($appInfo->getInfo("product")); ?></name>
				<copyright>&#169; <?php print_msg($appInfo->getInfo("copyright")); ?></copyright> 
                <license>
                Licensed to <brand><?php print_msg($appInfo->getInfo("client")); ?></brand>
                </license>
            </product>	
		</td>        
    </tr>
	
	<tr>
		<td valign="middle" class="futabar">
			<pow>
				Powered by 
					<brand title="<?php print_msg($appInfo->getInfo("poweredAKA")); ?> Software Group">
					<a href="http://www.dynat.com.ng/?url=seamlux&refapp=<?php print_msg($appInfo->getInfo("brand")); ?>&ref=<?php print_msg($appInfo->getInfo("clientAKA")); ?>" target="_blank">
					<?php print_msg($appInfo->getInfo("powered")); ?></a>				
			</pow>
			
			<dev>
				Developed by 
		  <brand title="<?php print_msg($appInfo->getInfo("producer")); ?>">
                <a href="http://www.t-isaac.com/?url=dev&refapp=<?php print_msg($appInfo->getInfo("brand")); ?>&ref=<?php print_msg($appInfo->getInfo("clientAKA")); ?>&refsp=<?php print_msg($appInfo->getInfo("poweredAKA")); ?>" target="_blank">
                <?php print_msg($appInfo->getInfo("producer")); ?></a>&#8482;
          </brand>
			<dev>
		</td>
	</tr>
</table>
<!--end footer section -->