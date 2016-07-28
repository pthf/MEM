<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>
<div class="row" style="margin-top: 2vw">
	<div class="col-md-10">
		<form class="form-horizontal" id="formPatients" name="" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="patient-name" class="col-sm-12 control-label">Patient Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="patient-name" placeholder="Insert a patient name" name="patient-name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="patient-last-name" class="col-sm-12 control-label">Patient Last Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="patient-last-name" placeholder="Insert a last name" name="patient-last-name"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="patient-company" class="col-sm-12 control-label">Patient Company *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="patient-company" placeholder="Insert an company name" name="patient-company"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="patient-type-result" class="col-sm-12 control-label">Patient Type Result *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="patient-type-result" placeholder="Insert type result" name="patient-type-result"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="patient-ticket" class="col-sm-12 control-label">Patient Ticket *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="patient-ticket" placeholder="Insert a ticket name" name="patient-ticket"></input>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="form-group">
			        <label for="pdfResults" class="col-sm-12 control-label" style="text-align: left;">Patient Results PDF *</label>
			        <div class="col-sm-12">
				        <input required type="file" class="form-control" id="pdfResults" name="pdfResults[]" multiple></input>
			        </div>
			    </div>
				<div class="col-md-12">
					<button type="button" class="btn btn-danger" onclick="location.reload();">Cancel</button>
					<button type="submit" class="btn btn-primary" id="buttonSave">Save</button>
				</div>
			</div>
		</form>
	</div>

</div>


<?php
	close_database();
?>
