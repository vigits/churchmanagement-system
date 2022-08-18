<style type="text/css">
  .prof_img img{
        height: 45px;
    border-radius: 50%;
  }
</style>

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="javascript:;"> Home</a> »</li>
  <li> Contibutions </li>

</ol>
 <?php
  include("../../connect.php");
  include("../../plugins/functions/general_functions.php");
  include("../../plugins/functions/php_functions.php");
  $id=mysqli_real_escape_string($con, $_POST['id']);
  $name=mysqli_real_escape_string($con, $_POST['name']);

  ?>
<span class="btn btn-primary" id="get_pdf" data-id="<?php echo $id;?>"><i class="fa fa-cloud-download"> Get PDF</i></span>
<div class="contibutions">
  <table class="table table-stripped table-hover" id="contibutions">
  <thead class="thead-dark">
   
    <h4 class="text-center">Contibutions For <span id="username"><?php echo $name;?></span>
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


<script type="text/javascript">
  $(document).ready(function () {
    var loader=$("#loader").html();
$("#get_pdf").click(function(){
    $("#get_pdf").html("processing...wait");
    var username=$("#username").html();
    var id=$(this).attr("data-id");
   let filetoprint = "print.php";
    $.post("modules/contributions/print.php",{
     id:id
    },function(resp){
     
    })
    $.post("plugins/print/pdfModel.php",{
      file:filetoprint,
      username:username
    },function(resp){
      $("#get_pdf").html(resp);
    })
  }
  )

    $(".contibute_btn").click(function(){
      $(".pages").html(loader);
      $.post("modules/contributions/add.php",{

      },function(data){
        $(".pages").html(data);
      })
    })
    $('#contibutions').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'print'
        ]
    } );
      });
</script>
