<div class="main-body">
<div class="page-wrapper">

<center><?= $this->Flash->render() ?></center>

<div class="page-body">
<div class="row">
<div class="col-sm-12">

<div class="card">
<div class="card-header">
<h5>Users</h5>
</div>
<div class="card-block">
<h4 class="sub-title">Edit new user</h4>
<?php echo $this->Form->create($user, array('url'=>'/users/editUser/'.$user['id'],'class'=>'md-float-material','autocomplete'=>'off'));
echo $this->Form->control('id', array('type'=>'hidden','value'=>$user['id']));
 ?>

<?php echo $this->element('forms/user_form'); ?>

<div class="form-group row">
	<label class="col-sm-2 col-form-label"></label>
	<div class="col-sm-10">
	<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Save >></button>
	</div>
</div>

<!-- <div class="form-group row">
<label class="col-sm-2 col-form-label">Upload File</label>
<div class="col-sm-10">
<input type="file" class="form-control">
</div>
</div>
<div class="form-group row">
<label class="col-sm-2 col-form-label">Textarea</label>
<div class="col-sm-10">
<textarea rows="5" cols="5" class="form-control" placeholder="Default textarea"></textarea>
</div>
</div> -->
</form>



</div>
</div>
</div>

</div>
</div>