
					<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" name="oForm" id="oFormTop" method="post" action="cards">
						<div class="input-group">
							<input id="search" type="text" class="form-control bg-light border-0 small" name="search" placeholder="Search for a Patient"
								value="<?php echo oInput::retain('search', 'request');?>" tabindex="1" aria-label="Search" aria-describedby="basic-addon">
							<div class="input-group-append">
								<button class="btn btn-primary" type="submit" name="submitBTN"> <i class="fas fa-search fa-sm"></i> </button>
							</div>
						</div>
					</form>