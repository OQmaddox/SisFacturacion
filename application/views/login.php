

         </div><!-- /.navbar-collapse -->
<style>
body  {
  
  background-image: url("<?php echo base_url('assets/img/elite.png') ?>");
	height: 500px; /* You must set a specified height */
  background-position: left; /* Center the image */
  background-repeat: no-repeat; /* Do not repeat the image */
 
}
</style>
      </nav>

      <div id="page-wrapper">

<br><br><br><br><br> 
<div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    	    		<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Iniciar Sesion</h3>
			 	</div>
			  	<div class="panel-body">
				  	<form action="<?php echo base_url();?>index.php/Login_controller/validation" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Usuario" name="user" id="user" type="email" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Contraseña" name="password" id="password" type="password" value="" required>
							</div>
							<?php if($login_error = $this->session->flashdata('login_error')){?>
                    <div class="alert alert-danger">
                    <?php echo $login_error;?>
                     </div>
                    <?php } ?>
							<input class="btn btn-lg btn-primary btn-block" type="submit" value="Iniciar Sesion">
						</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
      </div>

    </div>





