<div class="d-block position-relative">
	<form method="post" enctype="multipart-form-data" action="./scripts/add-user.php"
		class="row">

		<div class="col-6">
			<div class="d-block position-relative mb-1">
				First name
			</div>
			<input type="text" placeholder="First name" 
				name="first_name" class="form-control rounded-0 mb-4"/>
		</div>

		<div class="col-6">
			<div class="d-block position-relative mb-1">
				Last name
			</div>
			<input type="text" placeholder="Last name" 
				name="last_name" class="form-control rounded-0 mb-4"/>
		</div>

		<div class="col-6">
			<div class="d-block position-relative mb-1">
				Username
			</div>
			<input type="text" placeholder="Username" 
				name="username" class="form-control rounded-0 mb-4"/>
		</div>

		<div class="col-6">
			<div class="d-block position-relative mb-1">
				Password
			</div>
			<input type="text" placeholder="Password" 
				name="password" class="form-control rounded-0 mb-4"/>
		</div>

		<?php
			if(isset($_SESSION["error"])){
		?>
				<div class="col-12 mb-4">
					<div class="d-block position-relative bg-danger text-white fw-bolder p-3">
						<?php echo $_SESSION["error"];?>
					</div>				
				</div>
		<?php
			}
		?>

		<?php
			if(isset($_SESSION["message"])){
		?>
				<div class="col-12 mb-4">
					<div class="d-block position-relative bg-success text-white fw-bolder p-3">
						<?php echo $_SESSION["message"];?>
					</div>				
				</div>
		<?php
			}
		?>	
		<div class="col-12">
			<input type="submit" value="Save" class="btn btn-success rounded-0 w-100">
		</div>
	</form>
</div>