<style type="text/css">
  .prof_img img{
        height: 45px;
    border-radius: 50%;
  }
</style>

<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="javascript:;"> Home</a> »</li>
  <li> Converts</li>
</ol>
<p class="float-right "><i class="btn btn-primary"> <i class="fa fa-plus "> ADD</i></i></p>
<div class="members">
	<table class="table table-stripped" id="members">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">Position</th>
      <th scope="col">Date Saved</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
 <?php 
  include("../../connect.php");
  include("../../plugins/functions/general_functions.php");
  include("../../plugins/functions/php_functions.php");
  $get_users=mysqli_query($con, "SELECT * FROM users where status ='convert' order by date_joined desc") or die(mysqli_error($con));
  while ($user=mysqli_fetch_array($get_users)) {
  $id=$user['id'];
  $user_id=$user['user_id'];
  $first_name=$user['first_name'];
  $last_name=$user['last_name'];
  $email=$user['email'];
  $phone=$user['phone'];
  $username=$user['username'];
  $position=$user['position'];
  $prof_url=$user['prof_url'];
  $prof_pic=$user['prof_pic'];
  $status=$user['status'];
  $date_joined=$user['date_joined'];
?>
  <tbody>
 <tr>
      <td class="prof_img">
        <img src="<?php echo $prof_url.$prof_pic;?>" alt="<?php echo $username;?>">
      </td>
      <td><?php echo $first_name." ".$last_name;?></td>
      <td><?php echo $phone;?></td>
       <td><?php echo $email;?></td>
       <td><?php echo $position;?></td>
      <td><?php echo $date_joined;?></td>
     
      
      <td>
       <!--  <a class="btn btn-primary delete_user" data-id="<?php echo $user_id;?>" href="#" title="Delete User"><i class="fa fa-plus"> Member</i></a>  -->
        <a class="btn btn-primary make_member_btn" data-id="<?php echo $user_id;?>" href="#" title="Make Member"><i class="fa fa-times"> Make Member</i></a> 
         <a class="btn btn-success view_user" data-id="<?php echo $user_id;?>" id="<?php echo $user_id;?>" href="#" title="View User"><i class="fa fa-eye"> View</i></a>
      </td>
    </tr>
    </tbody>
      <?php }?>
</table>

</div>
<script type="text/javascript">
	$(document).ready(function () {
		var loader=$("#loader").html();

    $(".view_user").click(function(){
      var user_id=$(this).attr("id");
      $.post("modules/members/view_member.php",{
        user_id:user_id
      }, function(data){
        $(".pages").html(data);
      })  
    })
    $(".make_member_btn").click(function(){
      var user_id=$(this).attr("data-id");
      $.post("modules/converts/add.php",{
        user_id:user_id
      }, function(data){
        $(".pages").html(data);
      })  
    })

		$("#add_member").click(function(){
			$(".members").html(loader);
			$.post("modules/members/add_member.php",{

			},function(data){
				$(".members").html(data);
			})
		})

    $('#members').DataTable( {
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ]
    } );
      })
