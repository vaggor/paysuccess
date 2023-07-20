<div class="form-group row">
<label class="col-sm-2 col-form-label">Name</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('name', array('type'=>'text','label'=>false,'class'=>'form-control','placeholder'=>'Type Name','div'=>false,'required')); ?>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Email address</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('email', array('type'=>'text','label'=>false,'class'=>'form-control','placeholder'=>'Type Email address','div'=>false,'required')); ?>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">User Group</label>
<div class="col-sm-10">
<?php 
echo $this->Form->control('usergroup_id',array('type'=>'select','label'=>false,'id'=>'usergroup','class'=>'form-control required select21','options'=>array($list_usergroups))); ?>
</div>
</div>

<div class="form-group row">
<label class="col-sm-2 col-form-label">Merchants</label>
<div class="col-sm-10">
<?php 
echo $this->Form->control('merchant_id',array('type'=>'select','label'=>false,'id'=>'usergroup','class'=>'form-control required select21','options'=>array($listMerchants))); ?>
</div>
</div>

<?php if($this->request->getParam('action') == 'newUser'){ ?>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Password</label>
<div class="col-sm-10">
<!-- <input type="text" class="form-control" placeholder="Type your title in Placeholder"> -->
<?php echo $this->Form->control('password', array('type'=>'password','label'=>false,'class'=>'form-control','placeholder'=>'Type password for local login','div'=>false)); ?>
</div>
</div>
<?php } ?>
