<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('component/v_head');?>
	<title>Dashboard | Customer Service</title>
	<?php 
		$typeUser = $this->session->userdata('userTypeSessionPSys');
		$unameUser = $this->session->userdata('userNameSessionPSys');
		$fnameUser = $this->session->userdata('userFullnameSessionPSys');
	?>

</head>
<body>
	<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 

	<?php $this->load->view('component/v_nav');?>

		<div id="bodyContent" class="col-md-12">

			<div class="col-md-3">
				<?php $this->load->view('component/v_sidebar'); ?>
			</div>
			<div class="col-md-9">


				<?php 
					$countUser = $user['count_user'];
					$onlineUser = $user['online_user'];				
				?>

				<div class="row">
					<div class="thumbnail col-md-6">
						<center>
							<h1><?php echo $countUser; ?></h1>
							<b>Counter</b>
						</center>
					</div>
					<div class="thumbnail col-md-6">
						<center>
							<b>Status</b>
							<h1>
								<?php if ($onlineUser == 'true'): ?>
									Online
								<?php else: ?>
									Offline
								<?php endif ?>
							</h1>						
						</center>
					</div>
				</div>
			</div>
		</div>




	<?php $this->load->view('component/v_footer');?>
</body>
</html>