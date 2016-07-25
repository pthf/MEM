<?php
	include("../php/connect_bd.php");
	connect_base_de_datos();
?>
<div class="row" style="margin-top: 2vw">
	<div class="col-md-10">
		<form class="form-horizontal" id="formEditProjects" name="" enctype="multipart/form-data">
			<div class="col-md-5">
				<div class="form-group">
					<label for="note-name" class="col-sm-12 control-label">ID Note *</label>
					<input style="display:none;" required type="text" class="form-control" id="note-id" placeholder="Insert a note name" name="note-id" value="{{projectElement[0].idnotes}}"></input>
					<div class="col-sm-12">
						<input disabled required type="text" class="form-control" id="note-id" placeholder="Insert a note name" name="note-id" value="{{projectElement[0].idnotes}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="note-name" class="col-sm-12 control-label">Note Name *</label>
					<div class="col-sm-12">
						<input required type="text" class="form-control" id="note-name" placeholder="Insert a note name" name="note-name" value="{{projectElement[0].notesName}}"></input>
					</div>
				</div>
				<div class="form-group">
					<label for="note-description" class="col-sm-12 control-label">Note Description *</label>
					<div class="col-sm-12">
						<textarea required type="text" class="form-control" id="note-description" placeholder="Insert a note description" style="height: 220px" name="note-description">{{projectElement[0].notesDescription}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="imageSlider" class="col-sm-12 control-label" style="text-align: left;">State</label>
			        <div class="col-sm-12">
				        <select required class="form-control" id="note-state" name="note-state">
				        	<option disabled value"">Choose..</option>
				        	<option value="15">Jalisco</option>
				        	<option value="16">Michoacán</option>
				        </select>
			        </div>
			    </div>
				<div class="form-group">
					<label for="imageSlider" class="col-sm-12 control-label" style="text-align: left;">City</label>
			        <div class="col-sm-12">
				        <select required class="form-control" id="note-city" name="note-city">
				        	<option disabled value"">Choose..</option>
				        	<option value="692">Guadalajara</option>
				        	<option value="773">Zapopan</option>
				        	<option value="825">MORELOS</option>
				        	<option value="844">TUXPAN</option>
				        </select>
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
			<input type="submit" style="display: none;" class="submit"></input>
		</form>
	</div>
</div>
<?php
	close_database();
?>
