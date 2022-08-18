<style type="text/css">
  <?php include("header.css");?>
</style>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand " href="#">JCC Mombasa</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto" id="header_ul">
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="home"><span class="fa fa-home"> Home</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="about"><span class="fa fa-th-list"> About</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="contact"><span class="fa fa-phone"> Contact</span></a>
            </li>
           <!--   <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="notifications"><span class="fa fa-bell"> News</span></a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="sermons"><span class="fa fa-book"> Sermons</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="ministers"><span class="fa fa-user"> Ministers</span></a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="javascript:;" id="donations"><span class="btn btn-primary"><span class="fa fa-euro"> Donate</span></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link header_login" href="javascript:;" id="login"><span class="btn btn-primary"><span class="fa fa-sign-in"> Login</span></span></a>
            </li>
          </ul>
          <span class="btn btn-primary header_logout not_show" onclick="logout()"><span class="fa fa-sign-out"> Log Out</span></span>
        </div>
      </nav>

<script type="text/javascript">
function logout(){
     $(".header_logout").addClass("not_show");
     $(".header_login").removeClass("not_show");
          $(".splashinputs").val('');
          setCookie('user_id',"",90);
          setCookie('user_email',"",90);
          setCookie('user_name',"",90);
          setCookie('user_phone',"",90);
          setCookie('status',"logedout",90);
     $("#admin_wrap").addClass("not_show");
      $(".home").removeClass("not_show");
     $.post("modules/home/home.php",{
                  loginuser:loginuser
              },function(data){
               $(".home").show().html(data);                     
             })
  }
  $(document).ready(function () {
    $("#header_ul li a").click(function(){
      $(".sidebar_links").removeClass("sidebar_active");
      var id =$(this).attr("id");
      var loader=$("#loader").html();
       $("#admin_wrap").addClass("not_show");
      $(".home").removeClass("not_show").html(loader);
      $.post("modules/"+id+"/"+id+".php",{

      },function(data){
        $(".home").html(data);
      })
    })
  })
</script>