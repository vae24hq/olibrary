<?php
$object = $result;
if(!empty($object['code'])){$objectCode = $object['code'];}
if(!empty($object['data'])){$objectData = $object['data'];}

oFile::load('head','slicezr');?>

<body class="bg-gradient-primary">
<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">
		<div class="col-xl-10 col-lg-12 col-md-9">
			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
						<div class="col-lg-6">
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Sign In!</h1>
<?php if($objectCode == 'E200A1'){?>
									<div class="alert alert-light" role="alert"><?php echo $objectData['reason'];?></div>
<?php } elseif($objectCode == 'E400A1' || $objectCode =='E400A2'){?>
									<div class="alert alert-warning" role="alert"><?php echo $objectData['reason'];?></div>
<?php } elseif($objectCode == 'E401F1' || $objectCode =='E405F1'){?>
									<div class="alert alert-danger" role="alert"><?php echo $objectData['reason'];?></div>
<?php }?>
								</div>
								<form name="LoginForm" id="LoginForm" action="login" method="post" class="user">
									<div class="form-group">
										<input type="text" class="form-control" name="userid" id="userid" placeholder="UserID" value="<?php echo retainInput('userid');?>">
									</div>
									<div class="form-group">
										<input type="password" class="form-control" name="password" id="password" placeholder="Password">
									</div>
									<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block o-bottom-button">Login</button>
								</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php oFile::load('js','slicezr');?>
</body>
</html>