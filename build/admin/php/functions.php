<?php

	if(isset($_POST['namefunction'])){
		include("connect_bd.php");
		connect_base_de_datos();
		$namefunction = $_POST['namefunction'];
		switch ($namefunction) {
			case 'logOut':
				logOut();
				break;
			case 'addProjectName':
				addProjectName($_POST['nameCategory']);
				break;
			case 'addProject':
				addProject();
				break;
			case 'modifyProject':
				modifyProject();
				break;
			case 'deleteProject':
				deleteProject($_POST['idProject'], $_POST['idGallery']);
				break;
			case 'deleteImage':
				deleteImage($_POST['idImage']);
				break;
			case 'addImageGalleryProyect':
				addImageGalleryProyect();
				break;
			case 'addImageSliderHome':
				addImageSliderHome();
				break;
			case 'addImageSliderPromotions':
				addImageSliderPromotions();
				break;
			case 'addImageSliderEquipment':
				addImageSliderEquipment();
				break;
			case 'addImageSliderInstalations':
				addImageSliderInstalations();
				break;
			case 'addImageSliderMaterial':
				addImageSliderMaterial();
				break;
			case 'addImageSliderPersonal':
				addImageSliderPersonal();
				break;
			case 'deleteImageSlider':
				deleteImageSlider($_POST['idImage']);
				break;
			case 'deleteImageSliderPromotions':
				deleteImageSliderPromotions($_POST['idImage']);
				break;
			case 'deleteImageSliderEquipment':
				deleteImageSliderEquipment($_POST['idImage']);
				break;
			case 'deleteImageSliderInstalations':
				deleteImageSliderInstalations($_POST['idImage']);
				break;
			case 'deleteImageSliderMaterial':
				deleteImageSliderMaterial($_POST['idImage']);
				break;
			case 'deleteImageSliderPersonal':
				deleteImageSliderPersonal($_POST['idImage']);
				break;
			case 'addService':
				addService();
				break;
			case 'editService':
				editService();
				break;
			case 'addImageGalleryService':
				addImageGalleryService();
				break;
			case 'deleteImageServices':
				deleteImageServices($_POST['idImage']);
				break;
			case 'deleteService':
				deleteService($_POST['idService'], $_POST['idGalleryRelation']);
				break;
			case 'deleteCategory':
				deleteCategory($_POST['idCategory']);
				break;
			case 'addContact':
				addContact();
				break;
		}
	}

	function logOut(){
		session_start();
		session_destroy();
	}

	function addProjectName($nameCategory){
		$query = "SELECT idCategory FROM category WHERE nameCategory = '$nameCategory'";
		$result = mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)>0){
			echo 0;
		}else{
			$query = "INSERT INTO category (nameCategory) VALUES('".$nameCategory."')";
			$result = mysql_query($query) or die(mysql_error());
			$query = "SELECT * FROM category ORDER BY nameCategory ASC";
			$result = mysql_query($query) or die(mysql_error());
			while ($line = mysql_fetch_array($result)) {
				echo '<input type="checkbox" name="categoryList[]" value="'.$line["idCategory"].'"></input> '.strtoupper($line["nameCategory"]).'</br>';
			}
		}
	}

	function addProject(){

		parse_str($_POST['action'],$formData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO notes VALUES ('','".$formData['note-name']."','".$formData['note-description']."','".$datatime."','".$formData['note-state']."','".$formData['note-city']."')";
		$result = mysql_query($query) or die(mysql_error());

		$id_note = mysql_insert_id(); 

		foreach ($_FILES['imageSlidersHome']["name"] as $key => $value) {
			$fileName = $_FILES["imageSlidersHome"]["name"][$key];
			$fileType = $_FILES["imageSlidersHome"]["type"][$key];
			$fileTemp = $_FILES["imageSlidersHome"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/notes/".$fileName);
			$query1 = "INSERT INTO imagesNotes VALUES ('','".$fileName."','".$id_note."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}

	}

	function modifyProject(){

		parse_str($_POST['data'], $arrayData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$idnote = $arrayData['note-id'];
		$query = "UPDATE notes SET notesName = '".$arrayData['note-name']."', notesDescription = '".$arrayData['note-description']."', 
								notesDate = '".$datatime."', states_idstates = '".$arrayData['note-state']."', cities_idcities = '".$arrayData['note-city']."' WHERE idnotes =  $idnote";
		$result = mysql_query($query) or die(mysql_error());

	}

	function deleteProject($idProject, $idGallery){
		$query = "DELETE FROM imagesNotes WHERE notes_idnotes = $idGallery";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM notes WHERE idnotes = $idProject";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImage($idImage){
		$query = "DELETE FROM imagesNotes WHERE idimagesNotes = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addImageGalleryProyect(){

		parse_str($_POST['action'],$formData);
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/notes/".$fileName);
			$query = "INSERT INTO imagesNotes (imagesNotesName, notes_idnotes) VALUES ('".$fileName."', ".$formData['idnotes'].")";
			$result = mysql_query($query) or die(mysql_error());
		}

	}

	function addImageSliderHome(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageBannerHome']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageBannerHome"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageBannerHome"]["type"][$key];
			$fileTemp = $_FILES["insertImageBannerHome"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderHome/".$fileName);
			$query1 = "INSERT INTO bannersHome VALUES ('','".$fileName."','".$formData['home-url']."','".$formData['home-name']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function addImageSliderPromotions(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageBannerPromotions']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageBannerPromotions"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageBannerPromotions"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageBannerPromotions"]["type"][$key];
			$fileTemp = $_FILES["insertImageBannerPromotions"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderPromotions/".$fileName);
			$query1 = "INSERT INTO bannersPromotions VALUES ('','".$fileName."','".$formData['promotions-url']."','".$formData['promotions-name']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function addImageSliderEquipment(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderEquipment']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderEquipment"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderEquipment"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderEquipment"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderEquipment"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderEquipment/".$fileName);
			$query1 = "INSERT INTO bannersEquipment VALUES ('','".$fileName."','".$formData['equipment-url']."','".$formData['equipment-name']."','".$formData['equipment-description']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function addImageSliderInstalations(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderInstalations']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderInstalations"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderInstalations"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderInstalations"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderInstalations"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderInstalations/".$fileName);
			$query1 = "INSERT INTO bannersInstalations VALUES ('','".$fileName."','".$formData['instalations-url']."','".$formData['instalations-name']."','".$formData['instalations-description']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function addImageSliderMaterial(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderMaterial']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderMaterial"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderMaterial"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderMaterial"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderMaterial"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderMaterial/".$fileName);
			$query1 = "INSERT INTO bannersMaterial VALUES ('','".$fileName."','".$formData['material-url']."','".$formData['material-name']."','".$formData['material-description']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function addImageSliderPersonal(){

		parse_str($_POST['action'],$formData);

		foreach ($_FILES['insertImageSliderPersonal']["name"] as $key => $value) {
			$fileName = $_FILES["insertImageSliderPersonal"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["insertImageSliderPersonal"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["insertImageSliderPersonal"]["type"][$key];
			$fileTemp = $_FILES["insertImageSliderPersonal"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/sliderPersonal/".$fileName);
			$query1 = "INSERT INTO bannersPersonal VALUES ('','".$fileName."','".$formData['personal-url']."','".$formData['personal-name']."','".$formData['personal-description']."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}

	function deleteImageSlider($idImage){
		$query = "DELETE FROM bannersHome WHERE idbannersHome = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImageSliderPromotions($idImage){
		$query = "DELETE FROM bannersPromotions WHERE idbannersPromotions = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImageSliderEquipment($idImage){
		$query = "DELETE FROM bannersEquipment WHERE idbannersEquipment = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImageSliderInstalations($idImage){
		$query = "DELETE FROM bannersInstalations WHERE idbannersInstalations = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImageSliderMaterial($idImage){
		$query = "DELETE FROM bannersMaterial WHERE idbannersMaterial = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteImageSliderPersonal($idImage){
		$query = "DELETE FROM bannersPersonal WHERE idbannersPersonal = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addService(){

		parse_str($_POST['action'],$formData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO services VALUES ('','".$formData['service-name']."','".$formData['service-description']."')";
		$result = mysql_query($query) or die(mysql_error());

		$id_service = mysql_insert_id(); 

		foreach ($_FILES['imageSlidersServices']["name"] as $key => $value) {
			$fileName = $_FILES["imageSlidersServices"]["name"][$key];
			$fileType = $_FILES["imageSlidersServices"]["type"][$key];
			$fileTemp = $_FILES["imageSlidersServices"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
			$query1 = "INSERT INTO imagesServices VALUES ('','".$fileName."','".$id_service."')";
			$result1 = mysql_query($query1) or die(mysql_error());
		}
	}
		
	function addImageGalleryService(){
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileName = date("YmdHis").pathinfo($_FILES["imageGallery"]["type"][$key], PATHINFO_EXTENSION);
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
			$query = "INSERT INTO  imagegalleryservices (imageGallery, idGalleryRelation) VALUES ('".$fileName."', ".$_POST["idGalleryRelation"].")";
			$result = mysql_query($query) or die(mysql_error());
		}
	}

	function deleteImageServices($idImage){
		$query = "DELETE FROM imagegalleryservices WHERE idImageGallery = $idImage";
		$result = mysql_query($query) or die(mysql_error());
	}

	function editService(){

		parse_str($_POST['data'], $arrayData);

		$idservice = $arrayData['service-id'];
		$query = "UPDATE services SET servicesName = '".$arrayData['service-name']."', servicesDescription = '".$arrayData['service-description']."' WHERE idservices =  $idservice";
		$result = mysql_query($query) or die(mysql_error());

	}

	function deleteService($idService, $idGalleryRelation){
		$query = "DELETE FROM imagegalleryservices WHERE idGalleryRelation = $idGalleryRelation";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM services WHERE idService = $idService";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM galleryrelationservices WHERE idGalleryRelation = $idGalleryRelation ";
		$result = mysql_query($query) or die(mysql_error());
	}

	function deleteCategory($idCategory){
		$query = "DELETE FROM project_has_category WHERE idCategory = $idCategory";
		$result = mysql_query($query) or die(mysql_error());
		$query = "DELETE FROM category WHERE idCategory = $idCategory";
		$result = mysql_query($query) or die(mysql_error());
	}

	function addContact () {

		parse_str($_POST['action'], $formData);
		
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$query = "INSERT INTO contact VALUES('','".$formData['name']."','".$formData['email']."','".$formData['message']."','".$datatime."')";
		$result = mysql_query($query) or die(mysql_error());

	}
