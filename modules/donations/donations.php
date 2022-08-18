.<style type="text/css">
	.donate_bg{
		background-image: url("modules/home/slider/college labor2.jpg");
		background-size: cover !important;
    background-position: center center !important;
    background-repeat: no-repeat !important;
	}
	.donate_bg{
		height: 20em;
	}
	.donate_bg h1, h2{
		text-align: center;
    color: blue;
	}
	.donate_bg strong{
		color: #e63710;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-6 donate_bg">
			<h1>FOR THE BETTER FUTURE</h1>
			<H2>GIVE <strong>A LITTLE</strong>. CHANGE <strong>A LOT</strong>.</H2>
		</div>
		<div class="col-md-6 donate">
			<article>
        <div class="form-group">
              <label class="control-label">Enter Amount (  Ksh )</label>
              <input type="number" id="amount" class="form-control" /> 
        </div>
        <div class="form-group">
              <label class="control-label">Enter M-pesa phone number(2547XXXXXXXX)</label>
              <input type="number" id="clientphone" class="form-control" /> 
        </div>
        <div class="form-group">
              <label class="control-label">I want To Contribute For?</label><br>
             <select name="contibutions_length" aria-controls="contibutions" class="form-control">
             	<option value="----">--Select--</option>
             	<option value="JCC Welfare">JCC Welfare</option>
             	<option value="Orphanage">Orphanage</option>
             	<option value="Public Address System">Public Address System</option>
             	<option value="The Clergy">The Clergy</option>
             </select>
        </div>
      <result id="result"></result><br>
      <div class="btn btn-primary"  id="paynowbtn"  > Donate Now </div> 
    </div>
  </article>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
  $("#paynowbtn").click(function(e){
    let _      = $(this);
    let amount =$("#amount").val();
    let phone  =$("#clientphone").val();
     if (phone && amount ) {
      _.attr('disabled',true);
      _.html("processing... ");
      $.post("../mpesa-api/stkPush.php",{
        phone:phone,
        amount:amount
      },function(resp){
        if(resp.errorMessage){
          $("#result").text(resp.errorMessage);
        }else if(resp.ResponseCode="0"){
           $("#result").text("Thank you very much For supporting us. God Bless you")
        }else{
          //resp.MerchantRequestID 
          //resp.CheckoutRequestID 
          //resp.ResponseCode 
          //resp.ResponseDescription
          //resp.CustomerMessage
          $("#result").html(resp.CustomerMessage+'<br>');
        } 
        
        _.html('Pay Now').attr('disabled',false);
        return false;
      });
    }else{
      _.html('Pay Now').attr('disabled',false);
      $("#result").text('check phone or amount');
    }
    
  });
}); 
</script> 