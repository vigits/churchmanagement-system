<style type="text/css">
  .prof_img img{
        height: 45px;
    border-radius: 50%;
  }
</style>

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="javascript:;"> Home</a> »</li>
  <li> Contibutions</li>
</ol>
<!-- <section class="padding-top-15 padding-bottom-15">
  <div class="row">
    <div class="col-sm-7">
      
    </div>
    <div class="col-sm-5 ">
      <div class="btn-group float_right" style="margin: 2px 0px;">
      <a href="javascript:;" id="addbutton" class="addbtn btn btn-primary"> <i class="fa fa-plus"></i> </a>
      <a href="javascript:;" class="btn btn-success"> <i class="fa fa-save"></i> </a>
      </div>  
    </div>
  </div>
</section> -->
<div class="contibutions">
	<table class="table table-stripped table-hover" id="contibutions">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">date</th>
      <th scope="col">Code </th>
      <th scope="col">Method</th>
      <th scope="col">Function</th>
      <th scope="col">Amount</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
 <?php 
  include("../../connect.php");
  include("../../plugins/functions/general_functions.php");
  include("../../plugins/functions/php_functions.php");
   $get_users=mysqli_query($con, "SELECT * FROM contibutions") or die(mysqli_error($con));
  // $get_total="SELECT SUM(amount) FROM contibutions";
    while ($user=mysqli_fetch_array($get_users)) {
  $id=$user['id'];
  $user_id=$user['user_id'];
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
 	<td><?php echo $id;?></td>
	<td><?php echo $name;?></td>
	<td><?php echo $date;?></td>
	<td><?php echo $code;?></td>
	<td><?php echo $method;?></td>
	<td><?php echo $function;?></td>
	<td><?php echo $amount;?></td>
    <td>
         <a class="btn btn-success view_user" data-id="<?php echo $user_id;?>" name="<?php echo $name;?>" id="<?php echo $user_id;?>" href="#" title="View User"><i class="fa fa-eye"> View</i></a>
    </td>
</tr>
</tbody>
    <?php }?>
    <tfoot>
    	<tr>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td></td>
    		<td>TOTAL </td>
    		<td><?php echo $total;?></td>
    		<td></td>
    	</tr>
    </tfoot>
</table>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		var loader=$("#loader").html();

    $(".view_user").click(function(){
      var id=$(this).attr("id");
       var name=$(this).attr("name");
      $.post("modules/contributions/view.php",{
        id:id,
        name:name
      }, function(data){
        $(".pages").html(data);
      })  
    })

    $('#contibutions').DataTable( {
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );
      })
</script>