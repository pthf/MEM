<?php
	if(isset($_GET['namefunction'])){
		include("connect_bd.php");
		// connect_base_de_datos();
		$namefunction = $_GET['namefunction'];
		switch ($namefunction) {
			case 'getProjectList':
				getProjectList();
				break;
			case 'getProjectById':
				getProjectById($_GET['id']);
				break;
			case 'getCategory':
				getCategory($_GET['id']);
				break;
			case 'getSliderHome':
				getSliderHome();
				break;
			case 'getSliderPromotions':
				getSliderPromotions();
				break;
			case 'sliderEquipment':
				sliderEquipment();
				break;
			case 'sliderInstalations':
				sliderInstalations();
				break;
			case 'sliderMaterial':
				sliderMaterial();
				break;
			case 'sliderPersonal':
				sliderPersonal();
				break;
			case 'getServicesList':
				getServicesList();
				break;
			case 'getServiceById':
				getServiceById($_GET['id']);
				break;
			case 'getPatientList':
				getPatientList();
				break;
			case 'getPatientById':
				getPatientById($_GET['id']);
				break;
			case 'getImagesLibrary':
				getImagesLibrary();
				break;
			case 'getListInterestBlog':
				getListInterestBlog();
				break;
			case 'getInformationPost':
				getInformationPost($_GET['id']);
				break;
		}
	}

	function getProjectList(){
		$query = "SELECT * FROM notes n INNER JOIN states s ON s.idstates = n.states_idstates ORDER BY n.idnotes DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayAux = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux[] = array(
				'idnotes' => $line['idnotes'],
				'notesName' => $line['notesName'],
				'notesDescription' => $line['notesDescription'],
				'notesDate' => $line['notesDate'],
				'stateName' => $line['states_idstates'],
				'citiesName' => $line['cities_idcities']
			);
		}
		echo json_encode($arrayAux);
	}

	function getProjectById($id){
		$query = "SELECT * FROM imagesNotes im INNER JOIN notes n ON n.idnotes = im.notes_idnotes WHERE notes_idnotes = $id ORDER BY idimagesNotes DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayListProjects = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux = array(
				'idimagesNotes' => $line['idimagesNotes'],
				'imagesNotesName' => $line['imagesNotesName'],
				'idnotes' => $line['idnotes'],
				'notesName' => $line['notesName'],
				'notesDescription' => $line['notesDescription'],
				'notesDate' => $line['notesDate'],
				'notesState' => $line['notesState'],
				'notesCity' => $line['notesCity']
				);
			array_push($arrayListProjects, $arrayAux);

		}
		echo json_encode($arrayListProjects);
	}

	function getCategory($id){
		$query = "SELECT * FROM category";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataCategory = array();
		while($line = mysqli_fetch_array($result)){
			$verify = false;
			$query2 = "SELECT * FROM project_has_category WHERE idProject = ".$id." AND idCategory = ".$line['idCategory'];
			$result2 = mysqli_query(Conectar::con(),$query2) or die(mysqli_error(Conectar::con()));
			if(mysqli_num_rows($result2)>0)
				$verify = true;
			$dataCategory[] = array(
				'idCategory' => $line['idCategory'],
				'nameCategory' => $line['nameCategory'],
				'verify' => $verify
			);
		}
		echo json_encode($dataCategory);
	}

	function getSliderHome(){
		$query = "SELECT * FROM bannersHome ORDER BY idbannersHome DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersHome' => $line['idbannersHome'],
				'bannersHomeImage' => $line['bannersHomeImage'],
				'bannersHomeUrl' => $line['bannersHomeUrl'],
				'bannersHomeName' => $line['bannersHomeName']
			);
		}
		echo json_encode($dataBanners);
	}

	function getSliderPromotions(){
		$query = "SELECT * FROM bannersPromotions ORDER BY idbannersPromotions DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersPromotions' => $line['idbannersPromotions'],
				'bannersPromotionsImage' => $line['bannersPromotionsImage'],
				'bannersPromotionsUrl' => $line['bannersPromotionsUrl'],
				'bannersPromotionsName' => $line['bannersPromotionsName']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderEquipment(){
		$query = "SELECT * FROM bannersEquipment ORDER BY idbannersEquipment DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersEquipment' => $line['idbannersEquipment'],
				'bannersEquipmentImage' => $line['bannersEquipmentImage'],
				'bannersEquipmentUrl' => $line['bannersEquipmentUrl'],
				'bannersEquipmentName' => $line['bannersEquipmentName'],
				'bannersEquipmentDescription' => $line['bannersEquipmentDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderInstalations(){
		$query = "SELECT * FROM bannersInstalations ORDER BY idbannersInstalations DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersInstalations' => $line['idbannersInstalations'],
				'bannersInstalationsImage' => $line['bannersInstalationsImage'],
				'bannersInstalationsUrl' => $line['bannersInstalationsUrl'],
				'bannersInstalationsName' => $line['bannersInstalationsName'],
				'bannersInstalationsDescription' => $line['bannersInstalationsDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderMaterial(){
		$query = "SELECT * FROM bannersMaterial ORDER BY idbannersMaterial DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersMaterial' => $line['idbannersMaterial'],
				'bannersMaterialImage' => $line['bannersMaterialImage'],
				'bannersMaterialUrl' => $line['bannersMaterialUrl'],
				'bannersMaterialName' => $line['bannersMaterialName'],
				'bannersMaterialDescription' => $line['bannersMaterialDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function sliderPersonal(){
		$query = "SELECT * FROM bannersPersonal ORDER BY idbannersPersonal DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataBanners = array();
		while($line = mysqli_fetch_array($result)){
			$dataBanners[] = array(
				'idbannersPersonal' => $line['idbannersPersonal'],
				'bannersPersonalImage' => $line['bannersPersonalImage'],
				'bannersPersonalUrl' => $line['bannersPersonalUrl'],
				'bannersPersonalName' => $line['bannersPersonalName'],
				'bannersPersonalDescription' => $line['bannersPersonalDescription']
			);
		}
		echo json_encode($dataBanners);
	}

	function getServicesList(){
		$query = "SELECT * FROM services ORDER BY idservices DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataServices = array();
		while($line = mysqli_fetch_array($result)){
			$dataServices[] = array(
				'idservices' => $line['idservices'],
				'servicesName' => $line['servicesName'],
				'servicesDescription' => $line['servicesDescription']
			);
		}
		echo json_encode($dataServices);
	}

	function getServiceById($id){
		$query = "SELECT * FROM services WHERE idservices = ".$id;
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$dataServices = array();
		while($line = mysqli_fetch_array($result)){
			$dataServices[] = array(
				'idservices' => $line['idservices'],
				'servicesName' => $line['servicesName'],
				'servicesDescription' => $line['servicesDescription']
			);
		}
		echo json_encode($dataServices);
	}

	function getPatientList(){
		$query = "SELECT * FROM resultsPatient ORDER BY idresultsPatient DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayAux = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux[] = array(
				'idresultsPatient' => $line['idresultsPatient'],
				'resultsPatientName' => $line['resultsPatientName'],
				'resultsPatientLastName' => $line['resultsPatientLastName'],
				'resultsPatientCompany' => $line['resultsPatientCompany'],
				'resultsPatientTypeResult' => $line['resultsPatientTypeResult'],
				'resultsPatientTicket' => $line['resultsPatientTicket']
			);
		}
		echo json_encode($arrayAux);
	}

	function getPatientById($id){
		$query = "SELECT * FROM resultsPatient WHERE idresultsPatient = $id  ORDER BY idresultsPatient DESC";
		$result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
		$arrayAux = array();
		while($line = mysqli_fetch_array($result)){
			$arrayAux[] = array(
				'idresultsPatient' => $line['idresultsPatient'],
				'resultsPatientName' => $line['resultsPatientName'],
				'resultsPatientLastName' => $line['resultsPatientLastName'],
				'resultsPatientCompany' => $line['resultsPatientCompany'],
				'resultsPatientTypeResult' => $line['resultsPatientTypeResult'],
				'resultsPatientTicket' => $line['resultsPatientTicket']
			);
		}
		echo json_encode($arrayAux);
	}

	function getImagesLibrary(){
      $query = "SELECT * FROM imageslibrary ORDER BY idimageslibrary ASC";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $listImages = array();
      while($line = mysqli_fetch_array($result)){
        $listImages[] = array(
          'idimageslibrary' => $line['idimageslibrary'],
          'imageslibraryName' => $line['imageslibraryName'],
        );
      }
      print_r(json_encode($listImages));
    }

    function getListInterestBlog(){
      $query = "SELECT * FROM interestblog ORDER BY idInterestBlog DESC";
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $listInterestBlog = array();
      while($line = mysqli_fetch_array($result)){
        $listInterestBlog[] = array(
          'idInterestBlog' => $line['idInterestBlog'],
          'blogName' => $line['blogName'],
          'blogDate' => $line['blogDate'],
          'blogCover' => $line['blogCover'],
          'blogShortDescription' => $line['blogShortDescription'],
          'blogDocument' => $line['blogDocument']
        );
      }
      print_r(json_encode($listInterestBlog));
    }

    function getInformationPost($id){
      $query = "SELECT * FROM interestblog WHERE idInterestBlog = ".$id;
      $result = mysqli_query(Conectar::con(),$query) or die(mysqli_error(Conectar::con()));
      $line = mysqli_fetch_array($result);
      $informationPost = array();
      $informationPost[] = array(
        'idInterestBlog' => $line['idInterestBlog'],
        'blogName' => $line['blogName'],
        'blogDate' => $line['blogDate'],
        'blogCover' => $line['blogCover'],
        'blogShortDescription' => $line['blogShortDescription'],
        'blogDocument' => $line['blogDocument']
      );
      print_r(json_encode($informationPost));
    }
