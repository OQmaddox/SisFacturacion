
<section id="home" class="main-home parallax-section">
     <div class="overlay"></div>
     <div id="particles-js"></div>
     <div class="container">
          <div class="row">
          <div class="col-md-12 col-sm-12">
          <div class="jumbotron">
  <h1>Bienvenid@</h1> 
  <h3><?php echo $this->session->userdata('usu_nombre');?></h3> 
</div>
<img style="width:680px;height:350px;" src="<?php echo base_url('assets/img/paso.jpg') ?>" class="img-thumbnail"   >
<img style="width:280px;height:350px;" src="<?php echo base_url('assets/img/sonreir.jpg') ?>" class="img-thumbnail"   >
</div> 
<a href="<?php echo base_url('Sucursales_controller/imprimir_comprobante') ?>">imprimir</a>

              
          </div>
     </div>
</section> 

