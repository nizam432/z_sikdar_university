<div class="subscriber_search ">
	<div class="panel panel-default ">
		<div class="panel-heading"><span class="glyphicon glyphicon-search"></span> Search</div>
		<form class="form-horizontal " action="<?php echo base_url()?>backend_dashboard/resgister_search" method="post">
			<br>
			<div class="form-group">
				<label class="col-sm-2 control-label">Mobile</label>
				<div class="col-sm-3">
					<input type="text" name="mobile" class="form-control"> 
				</div>
				<label class="col-sm-2 control-label">Email</label>
				<div class="col-sm-3">
					<input type="text" name="email_id" class="form-control"> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Postal Code</label>
				<div class="col-sm-3">
					<input type="text" name="postal_code" class="form-control"> 
				</div>
				<label class="col-sm-2 control-label">Subscription Type</label>
				<div class="col-sm-3">
					<select name="subscripion_type" class="form-control">
						<option value="">Please select</option>
						<option value="1">Quaterly</option>
						<option value="2">Half Yearly</option>
						<option value="3">Yearly</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-5">
					<button type="submit" value="submit" name="submit" class="btn btn-primary">Search</button>
					<button type="submit" value="reset" name="reset" class="btn btn-success">Reset</button>
				</div>
			</div>
		</form>
	</div>
</div>