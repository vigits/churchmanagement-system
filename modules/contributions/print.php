<div class="contibutions">
  <table class="table table-stripped table-hover" id="contibutions">
  <thead class="thead-dark">
    <?php
  include("../../connect.php");
  include("../../plugins/functions/general_functions.php");
  include("../../plugins/functions/php_functions.php");
  $id=mysqli_real_escape_string($con, $_POST['id']);

  ?>
    <h4 class="text-center">Contibutions For <span><?php echo $name;?></span>
    </h4>
    <p class="float-right contibute_btn"><i class="btn btn-primary"> <i class="fa fa-plus "> Contribute</i></i></p>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">date</th>
      <th scope="col">amount</th>
      <th scope="col">Code</th>
      <th scope="col">Method</th>
      <th scope="col">Function</th>
    </tr>
  </thead>
 <?php
   $get_contibutions=mysqli_query($con, "SELECT * FROM contibutions WHERE user_id='$id'") or die(mysqli_error($con));
  // $get_total="SELECT SUM(amount) FROM contibutions";
    while ($user=mysqli_fetch_array($get_contibutions)) {
  $name=$user['name'];
  $date=$user['date'];
  $code=$user['code'];
  $method=$user['method'];
  $function=$user['function'];
  $amount=$user['amount'];
  $total=$amount+$amount;
?>
  <tbody>
 <tr>
    <td><?php echo $name;?></td>
    <td><?php echo $date;?></td>
    <td><?php echo $code;?></td>
    <td><?php echo $method;?></td>
    <td><?php echo $function;?></td>
    <td><?php echo $amount;?></td>
  </tr>
  
    <?php }?>
  </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>GRAND TOTAL</td>
        <td> <?php echo $total;?></td>
        <td></td>
      </tr>
    </tfoot>
</table>

</div>