<?php

	if(isset($_POST['namefunction'])){
		include("connect_bd.php");
		// connect_base_de_datos();
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
			case 'addPatient':
				addPatient();
			break;
			case 'modifyPatient':
				modifyPatient();
			break;
			case 'deletePatient':
				deletePatient($_POST['idPatient']);
				break;
			case 'addContact':
				addContact();
				break;
			case 'resultsPDF':
				resultsPDF();
				break;
			case 'addNewInterestBlog':
				addNewInterestBlog();
				break;
			case 'removeImageGallery':
				removeImageGallery($_POST['idImage']);
				break;
			case 'removeInterestPost':
				removeInterestPost($_POST['idInterestBlog']);
				break;
			case 'setImagesLibrary':
				setImagesLibrary();
				break;
			case 'editNewInterestBlog':
				editNewInterestBlog();
				break;
		}
	}

	function logOut(){
		session_start();
		session_destroy();
	}

	function addProjectName($nameCategory){
		$query = "SELECT idCategory FROM category WHERE nameCategory = '$nameCategory'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		if(mysqli_num_rows($result)>0){
			echo 0;
		}else{
			$query = "INSERT INTO category (nameCategory) VALUES('".$nameCategory."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
			$query = "SELECT * FROM category ORDER BY nameCategory ASC";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
			while ($line = mysqli_fetch_array($result)) {
				echo '<input type="checkbox" name="categoryList[]" value="'.$line["idCategory"].'"></input> '.strtoupper($line["nameCategory"]).'</br>';
			}
		}
	}

	function addProject(){

		parse_str($_POST['action'],$formData);
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO notes VALUES ('','".$formData['note-name']."','".$formData['note-description']."','".$datatime."',1,'1','".$formData['note-state']."','".$formData['note-city']."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

		// $id_note = mysql_insert_id(); 
		$rs = mysqli_query(Conectar::con(),"SELECT MAX(idnotes) AS id FROM notes") or die (mysql_error());
		if ($row = mysqli_fetch_row($rs)) {
			$id_note = trim($row[0]);

			foreach ($_FILES['imageSlidersHome']["name"] as $key => $value) {
				$fileName = $_FILES["imageSlidersHome"]["name"][$key];
				$fileType = $_FILES["imageSlidersHome"]["type"][$key];
				$fileTemp = $_FILES["imageSlidersHome"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../src/images/notes/".$fileName);
				$query1 = "INSERT INTO imagesNotes VALUES ('','".$fileName."','".$id_note."')";
				$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
			}
		}

	}

	function modifyProject(){

		parse_str($_POST['data'], $arrayData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$idnote = $arrayData['note-id'];
		$query = "UPDATE notes SET notesName = '".$arrayData['note-name']."', notesDescription = '".$arrayData['note-description']."', 
								notesDate = '".$datatime."', notesState = '".$arrayData['note-state']."', notesCity = '".$arrayData['note-city']."' WHERE idnotes =  $idnote";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function deleteProject($idProject, $idGallery){
		$query = "DELETE FROM imagesNotes WHERE notes_idnotes = $idGallery";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$query = "DELETE FROM notes WHERE idnotes = $idProject";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImage($idImage){
		$query = "DELETE FROM imagesNotes WHERE idimagesNotes = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addImageGalleryProyect(){

		parse_str($_POST['action'],$formData);
		foreach ($_FILES['imageGallery']["name"] as $key => $value) {
			$fileName = $_FILES["imageGallery"]["name"][$key];
			$fileType = $_FILES["imageGallery"]["type"][$key];
			$fileTemp = $_FILES["imageGallery"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/images/notes/".$fileName);
			$query = "INSERT INTO imagesNotes (imagesNotesName, notes_idnotes) VALUES ('".$fileName."', ".$formData['idnotes'].")";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersHome VALUES ('','".$fileName."','".$formData['home-url']."','".$formData['home-name']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersPromotions VALUES ('','".$fileName."','".$formData['promotions-url']."','".$formData['promotions-name']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersEquipment VALUES ('','".$fileName."','".$formData['equipment-url']."','".$formData['equipment-name']."','".$formData['equipment-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersInstalations VALUES ('','".$fileName."','".$formData['instalations-url']."','".$formData['instalations-name']."','".$formData['instalations-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersMaterial VALUES ('','".$fileName."','".$formData['material-url']."','".$formData['material-name']."','".$formData['material-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
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
			$query = "INSERT INTO bannersPersonal VALUES ('','".$fileName."','".$formData['personal-url']."','".$formData['personal-name']."','".$formData['personal-description']."')";
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function deleteImageSlider($idImage){
		$query = "DELETE FROM bannersHome WHERE idbannersHome = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderPromotions($idImage){
		$query = "DELETE FROM bannersPromotions WHERE idbannersPromotions = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderEquipment($idImage){
		$query = "DELETE FROM bannersEquipment WHERE idbannersEquipment = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderInstalations($idImage){
		$query = "DELETE FROM bannersInstalations WHERE idbannersInstalations = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderMaterial($idImage){
		$query = "DELETE FROM bannersMaterial WHERE idbannersMaterial = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function deleteImageSliderPersonal($idImage){
		$query = "DELETE FROM bannersPersonal WHERE idbannersPersonal = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addService(){

		parse_str($_POST['action'],$formData);

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");
		
		$query = "INSERT INTO services VALUES ('','".$formData['service-name']."','".$formData['service-description']."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

		// $id_service = mysql_insert_id(); 
		$rs = mysqli_query(Conectar::con(),"SELECT MAX(idservices) AS id FROM services") or die (mysql_error());
		if ($row = mysqli_fetch_row($rs)) {
			$id_service = trim($row[0]);

			foreach ($_FILES['imageSlidersServices']["name"] as $key => $value) {
				$fileName = $_FILES["imageSlidersServices"]["name"][$key];
				$fileType = $_FILES["imageSlidersServices"]["type"][$key];
				$fileTemp = $_FILES["imageSlidersServices"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../src/images/services/".$fileName);
				$query1 = "INSERT INTO imagesServices VALUES ('','".$fileName."','".$id_service."')";
				$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
			}
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
			$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		}
	}

	function deleteImageServices($idImage){
		$query = "DELETE FROM imagegalleryservices WHERE idImageGallery = $idImage";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function editService(){

		parse_str($_POST['data'], $arrayData);

		$idservice = $arrayData['service-id'];
		$query = "UPDATE services SET servicesName = '".$arrayData['service-name']."', servicesDescription = '".$arrayData['service-description']."' WHERE idservices =  $idservice";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function deleteService($idService, $idGalleryRelation){
		$query = "DELETE FROM imagegalleryservices WHERE idGalleryRelation = $idGalleryRelation";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$query = "DELETE FROM services WHERE idService = $idService";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$query = "DELETE FROM galleryrelationservices WHERE idGalleryRelation = $idGalleryRelation ";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
	}

	function addPatient () {

		parse_str($_POST['action'], $formData);

		foreach ($_FILES['pdfResults']["name"] as $key => $value) {
			$fileName = $_FILES["pdfResults"]["name"][$key];
			$fileName = date("YmdHis").$fileName;
			$fileType = $_FILES["pdfResults"]["type"][$key];
			$fileTemp = $_FILES["pdfResults"]["tmp_name"][$key];
			move_uploaded_file($fileTemp, "../src/files/pdf/".$fileName);
		}

		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$query = "INSERT INTO resultsPatient VALUES('','".$formData['patient-name']."','".$formData['patient-last-name']."','".$formData['patient-company']."','".$formData['patient-type-result']."','".$datatime."','".$formData['patient-ticket']."','".$fileName."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function modifyPatient () {

		parse_str($_POST['action'], $formData);

		$query = "SELECT * FROM resultsPatient WHERE idresultsPatient = '".$formData['patient-id']."' AND resultsPatientPDF = '".$_FILES["pdfResults"]["name"][0]."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$num_row = mysqli_num_rows($result);

		if ($num_row == 0) {
			
			foreach ($_FILES['pdfResults']["name"] as $key => $value) {
				$fileName = $_FILES["pdfResults"]["name"][$key];
				$fileName = date("YmdHis").$fileName;
				$fileType = $_FILES["pdfResults"]["type"][$key];
				$fileTemp = $_FILES["pdfResults"]["tmp_name"][$key];
				move_uploaded_file($fileTemp, "../src/files/pdf/".$fileName);
			}

			date_default_timezone_set('UTC');
		    date_default_timezone_set("America/Mexico_City");
		    $datatime = date("Y-m-d H:i:s");

			$query1 = "UPDATE resultsPatient SET resultsPatientName = '".$formData['patient-name']."', resultsPatientLastName = '".$formData['patient-last-name']."', resultsPatientCompany = '".$formData['patient-company']."', 
												resultsPatientTypeResult = '".$formData['patient-type-result']."', resultsPatientDate = '".$datatime."', 
												resultsPatientTicket = '".$formData['patient-ticket']."', resultsPatientPDF = '".$fileName."' WHERE idresultsPatient = '".$formData['patient-id']."'";
			$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));

		} else {

			date_default_timezone_set('UTC');
		    date_default_timezone_set("America/Mexico_City");
		    $datatime = date("Y-m-d H:i:s");

			$query1 = "UPDATE resultsPatient SET resultsPatientName = '".$formData['patient-name']."', resultsPatientLastName = '".$formData['patient-last-name']."', resultsPatientCompany = '".$formData['patient-company']."', 
			 									resultsPatientTypeResult = '".$formData['patient-type-result']."', resultsPatientDate = '".$datatime."', 
			 									resultsPatientTicket = '".$formData['patient-ticket']."' WHERE idresultsPatient = '".$formData['patient-id']."'";
			$result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));

		}

	}

	function deletePatient ($id) {

		$query = "DELETE FROM resultsPatient WHERE idresultsPatient = '".$id."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function addContact () {

		parse_str($_POST['action'], $formData);
		
		date_default_timezone_set('UTC');
	    date_default_timezone_set("America/Mexico_City");
	    $datatime = date("Y-m-d H:i:s");

		$query = "INSERT INTO contact VALUES('','".$formData['name']."','".$formData['email']."','".$formData['message']."','".$datatime."')";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));

	}

	function resultsPDF () {

		$query = "SELECT * FROM resultsPatient WHERE resultsPatientTicket = '".$_POST['ticket']."'";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$row_num = mysqli_num_rows($result);

		if ($row_num == 0) {
			echo 0;
		} else {
			$row = mysqli_fetch_array($result) or die(mysql_error());
			// $idresultsPatient = $row['idresultsPatient'];
			// echo $idresultsPatient;
			$resultsPatientPDF = $row['resultsPatientPDF'];
			echo $resultsPatientPDF;
		}
	}

	function addNewInterestBlog(){
      parse_str($_POST['data'], $data);

      $name = $data['name'];
      $description = $data['description'];
      $cover = $data['cover'];
      $post = $data['post'];
      date_default_timezone_set('UTC');
      date_default_timezone_set("America/Mexico_City");
      $datatime = date("Y-m-d H:i:s");
      $query = "INSERT INTO interestblog (blogName, blogDate, blogCover, blogShortDescription, blogDocument) VALUES ('$name', '$datatime', '$cover', '$description', '$post')";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }

    function removeImageGallery($id){
      // $idImage = $_POST['idImage'];
      $query = "SELECT imageslibraryName FROM imageslibrary WHERE idimageslibrary =".$id;
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $line = mysql_fetch_array($result);
      $nameImage = $line['imageslibraryName'];
      unlink("../src/images/document/".$nameImage);
      $query1 = "DELETE FROM imageslibrary WHERE idimageslibrary = ".$id;
      $result1 = mysqli_query(Conectar::con(),$query1) or die(mysqli_error(Conectar::con()));
    }

    function removeInterestPost($id){
      // $idInterestBlog = $_POST['idInterestBlog'];
      $query = "DELETE FROM interestblog WHERE idInterestBlog = $id";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }

    function setImagesLibrary(){

      foreach ($_FILES['setImage']["name"] as $key => $value) {
		$fileName = $_FILES["setImage"]["name"][$key];
		// $fileName = date("YmdHis").pathinfo($_FILES["setImage"]["type"][$key], PATHINFO_EXTENSION);
        $fileType = $_FILES["setImage"]["type"][$key];
        $fileTemp = $_FILES["setImage"]["tmp_name"][$key];
        move_uploaded_file($fileTemp, "../src/images/document/".$fileName);
        $query = "INSERT INTO  imageslibrary (idimageslibrary, imageslibraryName) VALUES (NULL,'".$fileName."')";
        $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      }

    }

    function editNewInterestBlog(){
      parse_str($_POST['data'], $data);
      $id = $data['id'];
      $name = $data['name'];
      $description = $data['description'];
      $cover = $data['cover'];
      $post = $data['post'];
      $query = "UPDATE interestblog SET blogName = '$name', blogCover = '$cover', blogShortDescription = '$description', blogDocument = '$post' WHERE  idInterestBlog = $id";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
    }
