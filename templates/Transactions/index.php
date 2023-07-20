<?php
//$data1 = $this->Session->read();
//$user = $data1['Auth']['User'];
//print_r( $user['use_group'] );
?>
<div class="main-body">
<div class="page-wrapper">



<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Pending Applications</h5>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">

<?php echo $this->Form->create(NULL,array('url'=>'/transactions/index','class'=>'row g-3')); ?>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Start</label>
    <?php echo $this->Form->control('start_date', array('type'=>'date','label'=>false,'class'=>'form-control','div'=>false)); ?>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">End</label>
    <?php echo $this->Form->control('end_date', array('type'=>'date','label'=>false,'class'=>'form-control','div'=>false)); ?>
  </div>
  
  <div class="col-12" style="margin-top: 20px; margin-bottom: 20px;">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

<table id="base-style" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>Name</th>
<th>Email Address</th>
<th>Amount</th>
<th>Card Last 4 digit</th>
<th>Reference #</th>
<th>Status</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php 
$total_amt = 0;
$i = 0;
foreach($res as $data){ 
	$total_amt = $total_amt + $data['amount'];
	?>
<tr>
<td><?php echo $data['name']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['currency'].$data['amount']; ?></td>
<td><?php echo $data['last_four']; ?></td>
<td><?php echo $data['ref']; ?></td>
<td><?php echo $statuses[$data['status_id']]; ?></td>
<td><?php echo date('d M,Y',strtotime($data['payment_date'])); ?></td>
</tr>
<?php $i++;} ?>
</tfoot>
</table>
<div># Trxn: <?php echo $i; ?> | Charge per trxn: <?php echo $merchant_charge; ?> | Amount Due: <?php echo @$res[0]['currency'].($merchant_charge * $i); ?></div>
</div>
</div>
</div>



</div>
 
</div>
</div>