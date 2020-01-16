

         </div><!-- /.navbar-collapse -->
<style>
body  {
  
	background: rgba(73,155,234,1);
background: -moz-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(73,155,234,1) 6%, rgba(139,177,217,1) 32%, rgba(32,124,229,1) 71%, rgba(32,124,229,1) 86%, rgba(32,124,229,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(73,155,234,1)), color-stop(6%, rgba(73,155,234,1)), color-stop(32%, rgba(139,177,217,1)), color-stop(71%, rgba(32,124,229,1)), color-stop(86%, rgba(32,124,229,1)), color-stop(100%, rgba(32,124,229,1)));
background: -webkit-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(73,155,234,1) 6%, rgba(139,177,217,1) 32%, rgba(32,124,229,1) 71%, rgba(32,124,229,1) 86%, rgba(32,124,229,1) 100%);
background: -o-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(73,155,234,1) 6%, rgba(139,177,217,1) 32%, rgba(32,124,229,1) 71%, rgba(32,124,229,1) 86%, rgba(32,124,229,1) 100%);
background: -ms-linear-gradient(left, rgba(73,155,234,1) 0%, rgba(73,155,234,1) 6%, rgba(139,177,217,1) 32%, rgba(32,124,229,1) 71%, rgba(32,124,229,1) 86%, rgba(32,124,229,1) 100%);
background: linear-gradient(to right, rgba(73,155,234,1) 0%, rgba(73,155,234,1) 6%, rgba(139,177,217,1) 32%, rgba(32,124,229,1) 71%, rgba(32,124,229,1) 86%, rgba(32,124,229,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#499bea', endColorstr='#207ce5', GradientType=1 );
}
</style>
      </nav>

      <div id="page-wrapper">

<br><br><br><br><br> 
<div class="row vertical-offset-100">
    	<div class="col-md-4 col-md-offset-4">
    	    		<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Iniciar Sesión</h3>
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





