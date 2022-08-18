<ol class="breadcrumb">
  <li><i class="fa fa-home"></i><a href="javascript:;"> Home</a> »</li>
  <li> Contibutions »</li>
   <li> New </li>
</ol>

<article>
       <div class="row">
       		<div class="col-sm-2"></div>
      <div class="col-sm-4">
        <div class="form-group">
              <label class="control-label">Enter Amount (  Ksh )</label>
              <input type="number" id="amount" class="form-control" /> 
        </div>
        <div class="form-group">
              <label class="control-label">Enter M-pesa phone number(2547XXXXXXXX)</label>
              <input type="number" id="clientphone" class="form-control" /> 
        </div>
      <result id="result"></result>
      <div class="btn btn-primary"  id="paynowbtn"  > Continue </div> 
    </div>
    <div class="col-sm-4">
    	<div class="form-group">
              <label class="control-label">Enter Name</label>
              <input type="text" id="name" class="form-control" /> 
        </div>
        <div class="form-group">
              <label class="control-label">Function</label><br>
             <select name="contibutions_length" aria-controls="contibutions" class="form-control">
             	<option value="----">--Select Function--</option>
             	<option value="JCC Welfare">JCC Welfare</option>
             	<option value="Orphanage">Orphanage</option>
             	<option value="Public Address System">Public Address System</option>
             	<option value="The Clergy">The Clergy</option>
             </select>
        </div>
    </div>
    <div class="col-sm-2"></div>
       </div>
  </article>
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