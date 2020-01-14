<a href="<?php echo base_url('Dashboard_controller/index/');?>" class="btn btn-primary" >Regresar</a>


<hr>
<div class="shadow p-3 mb-5 bg-white rounded">
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>

      <th>#</th>
      <th>PRODUCTO</th>
      <th>CANTIDAD</th>
      <th>VALOR</th>
      <th>SUB-TOTAL</th>

    </tr>
  </thead>
  <tbody >
    <?php $sum=0; $i =1;
    foreach ($data2 as $result2){?>

      <tr>
        <th scope="row"><?php echo $i++ ?></th>
        <td><?php echo $result2->PRO_NOMBRE ?></td>
        <td><?php echo $result2->MOV_CANT ?></td>
        <td><?= '$'?><?php echo $result2->MOV_VALOR ?></td>
        <td><?= '$'?><?php echo $result2->MOV_TOTAL ?></td>
        <?php $sum=$result2->MOV_TOTAL+$sum?>
      </tr>
    <?php } ?>
  </tbody>
</table>

<h5>Sub-Total: <?php echo ($sum-($sum*0.012)); ?></h5>
<h5>IVA 12%: <?php echo ($sum*0.012); ?></h5>
<h5>Total: <?php echo $sum; ?></h5>
</div>
<!-- The Modal -->
