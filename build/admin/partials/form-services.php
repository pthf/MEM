<div class="row" style="margin-top: 2vw">
	<div class="col-md-10">
		<form class="form-horizontal" id="formServices" name="" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="service-name" class="col-sm-12 control-label">Service Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="service-name" placeholder="Insert a service name" name="service-name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="service-description" class="col-sm-12 control-label">Service Description *</label>
					<div class="col-sm-12">
						<textarea required type="text" class="form-control" id="service-description" placeholder="Insert a service description" style="height: 220px" name="service-description"></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
			        <label for="imageSlidersServices" class="col-sm-12 control-label" style="text-align: left;">Images Services *</label>
			        <div class="col-sm-12">
				        <input required type="file" class="form-control" id="imageSlidersServices" name="imageSlidersServices[]" multiple></input>
			        </div>
			    </div>
				<div class="col-md-12">
					<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
					<button type="submit" class="btn btn-primary" id="buttonSave">Save</button>
					<div class="alert alert-success msg-newProject" role="alert" style="margin-top: 5px; margin-bottom: 5px; display: none">
						<strong>Done!</strong> A new project was added, look at list tab.
					</div>
				</div>
			</div>
		</form>
	</div>
</div>