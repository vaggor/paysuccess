<div style="margin: 0 100px 0 100px;"><center><?= $this->Flash->render() ?></center></div>
<div class="main-body">
<div class="page-wrapper">



<div class="page-body">

<div class="card">
<div class="card-header">
<h5>Active Users</h5>
</div>
<div class="card-block">
<div class="dt-responsive table-responsive">
<table id="base-style" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>Name</th>
<th>Email address</th>
<th>Usergroup</th>
<th>Merchant</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($users as $data){ ?>
<tr>
<td><?php echo $data['name']; ?></td>
<td><?php echo $data['email']; ?></td>
<td><?php echo $data['usergroup']['name']; ?></td>
<td><?php echo $data['merchant']['name']; ?></td>
<td><?php 
//echo $this->Html->link('<i class="ti-eye"></i> ',array('controller'=>'loans','action'=>'view_detail',$data['LoanApplication']['id']),array('escape'=>false));
if($sess_data['usergroup_id'] == 1){
	echo $this->Html->link('<i class="ti-pencil-alt"></i>',array('controller'=>'users','action'=>'editUser',$data['id']),array('escape'=>false));

	echo $this->Html->link('<i class="ti-trash"></i>',array('controller'=>'users','action'=>'deleteUser',$data['id']),array('escape'=>false,'confirm'=>'Are you sure you want to delete?'));
}

 ?></td>
</tr>
<?php } ?>
</tfoot>
</table>
</div>
</div>
</div>



</div>
 
</div>
</div>