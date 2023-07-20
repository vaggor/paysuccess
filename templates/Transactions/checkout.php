<div class="main-body">
<div class="page-wrapper">



<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5><?php echo $page_title; ?></h5>
<?php //echo $page_no; ?>
</div>
<div class="card-block">
<h4 class="sub-title">Initiate Payment</h4>
<?php //echo $this->Form->create($transaction, array('url'=>'#','class'=>'md-float-material','autocomplete'=>'off','id'=>'paymentForm'));
  ?>
  <form id="paymentForm", class="md-float-material">
  <div class="form-group row">
<label class="col-sm-2 col-form-label">Email Address</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('email', array('type'=>'text','label'=>false,'class'=>'form-control','value'=>$email,'div'=>false,'disabled'=>true,'id'=>'email-address')); ?>
</div>
</div>

<!-- <div class="form-group row">
<label class="col-sm-2 col-form-label">Amount</label>
<div class="col-sm-10">
<?php //echo $this->Form->control('amount', array('type'=>'text','label'=>false,'class'=>'form-control','value'=>$amount,'div'=>false,'disabled','id'=>'amount')); ?>
</div>
</div> -->

<div class="form-group row">
<label class="col-sm-2 col-form-label">First Name</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('first-name', array('type'=>'text','label'=>false,'class'=>'form-control','value'=>$fname,'div'=>false,'disabled'=>true,'id'=>'first-name')); ?>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Last Name</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('last-name', array('type'=>'text','label'=>false,'class'=>'form-control','value'=>$lname,'div'=>false,'disabled'=>true,'id'=>'last-name')); ?>
</div>
</div>




<div class="edit-info">
<div class="row">
<div class="col-lg-12">
<div class="general-info">
  <div class="text-center">
  	<button type="submit" id="submit" value="save" class="btn btn-primary waves-effect waves-light m-r-20" >Continue to checkout</button>

</div>
</div>
</div>
</div>
</div>


</form>
<script src="https://js.paystack.co/v1/inline.js"></script> 


</div>
</div>
</div>

</div>
</div>

<script type="text/javascript">
  const paymentForm = document.getElementById('paymentForm');

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: '<?php echo $public_key; ?>', // Replace with your public key
    email: document.getElementById("email-address").value,
    //amount: document.getElementById("amount").value * 100,
    amount: '<?php echo $amount; ?>',
    firstname: '<?php echo $fname; ?>',
    lastname: '<?php echo $lname; ?>',
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    currency: 'GHS',
    channels: ['card'],
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      document.getElementById('submit').style.visibility = 'hidden';
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });

  handler.openIframe();
}
paymentForm.addEventListener("submit", payWithPaystack, false);
</script>