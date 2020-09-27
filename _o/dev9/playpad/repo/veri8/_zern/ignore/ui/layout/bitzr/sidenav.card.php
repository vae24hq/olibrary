
			<hr class="sidebar-divider">

			<?php if(oHelper::dataInfo('type', $oUserActive) == 'record'){?>
			<div class="sidebar-heading">Card</div>
				<li class="nav-item<?php echo oHelper::isCSSActive('new-card', $fuxURI);?>"><a class="nav-link" href="new-card"><i class="fas fa-fw fa-book"></i><span>New Patient</span></a></li>
			<?php } ?>

			<?php if(oHelper::dataInfo('type', $oUserActive) == 'paypoint'){?>
			<div class="sidebar-heading">Bill/Payment</div>
			<?php } ?>

				<li class="nav-item<?php echo oHelper::isCSSActive('cards', $fuxURI);?>"><a class="nav-link" href="cards"><i class="fas fa-fw fa-book"></i><span>Search Patient</span></a></li>

