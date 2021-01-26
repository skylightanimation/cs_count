<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="count visitors who already connect to customer service">
	<meta name="author" content="SkyLight_Animation">
	<link rel="icon" href="https://i.pinimg.com/564x/ca/fd/38/cafd38660fe3e3d1331d556d8c66d9b1.jpg">
 
	<title>Customer Service </title>
	<link href="https://getbootstrap.com/docs/3.3/examples/cover/cover.css" rel="stylesheet">

	<?php $this->load->view('component/v_head');?>
 
</head>
<body>

	<div class="site-wrapper">
		<div class="site-wrapper-inner">
			<div class="cover-container">
				<div class="masthead clearfix">
					<div class="inner">
						<h3 class="masthead-brand">SkyLight Animation</h3>
						<ul class="nav masthead-nav">
							<li class="active"><a href="<?php echo base_url() ?>login">Login</a></li>
							
						</ul>
					</div>
				</div>

				<div class="inner cover">
					<h1 class="cover-heading">SkyLight Animation</h1>
					<p class="lead"><code>https://SkyLightAnimation.github.io</code></p>
					<p class="lead">
						<a href="https://SkyLightAnimation.github.io" class="btn btn-lg btn-default">Visit</a>
					</p>
				</div>
				<div class="inner cover">
					<p class="lead"><code>ASK ? </code></p>
					<p class="lead">
						<?php if (count($online) > 0): ?>
							
						
							<?php foreach ($online as $key => $objectOnline): ?>
								<?php 
									$idUser = $objectOnline->id_user;
									$usernameUser = $objectOnline->username_user;
									$fullnameUser = $objectOnline->fullname_user;
									$onlineUser = $objectOnline->online_user;
									$countUser = $objectOnline->count_user;
								?>

								<a href="<?php echo base_url() ?>update_number/<?php echo $usernameUser; ?>/<?php echo $countUser; ?>" class="btn btn-lg btn-default"><?php echo $fullnameUser; ?></a>
								
							<?php endforeach ?>
						<?php else: ?>
							Customer Service Offline...
						<?php endif ?>
					</p>
				</div>

				<div class="mastfoot">
					<div class="inner">
						<p>
							<a href="#">Bootstrap Template</a> by <a href="https://twitter.com/mdo">@mdo</a><br>
							content by <a href="https://SkyLightAnimation.github.io">SkyLight_Animation</a>.
						</p>
					</div>
				</div>

			</div>

		</div>
	</div>

</body>
</html>