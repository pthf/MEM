(function(){
  angular.module('baudeoPanel.directives', [])
  .directive('topNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/top-nav.php',
			controller: function($document){
				var open = true;
				$(window).resize(function(){
					open = true;
					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}
				});
				$('#menuha').click(function(){
					if(open){
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '-15%'});
							$('.panel-cont').css({'width' : '100%', 'left' : '0'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '-20%'});
								$('.panel-cont').css({'width' : '100%','left' : '0'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '-25%'});
									$('.panel-cont').css({ 'width' : '100%', 'left' : '0'});
								}
							}
						}
					}else{
						if($(window).width()>1366){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
						}else{
							if($(window).width()>768){
								$('.menu-nav').css({'margin-left' : '0%'});
								$('.panel-cont').css({'width' : '80%','left' : '20%'});
							}else{
								if($(window).width()>640){
									$('.menu-nav').css({ 'margin-left' : '0%'});
									$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
								}
							}
						}
					}
					open = !open;
				});
				$('.logout').click(function(){
					var namefunction = 'logOut';
					$.ajax({
						beforeSend: function(){
						},
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction : namefunction
						},
						success: function(result){
							location.reload();
						},
						error: function(error){
						},
						complete: function(){
						},
						timeout: 10000
					});
				});
			}
		};
	})
  .directive('menuNav', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/menu-nav.php',
			controller: function($document){
				$(window).resize(function(){
					if($(window).width()>1366){
						$('.menu-nav').css({'margin-left' : '0%'});
						$('.panel-cont').css({'width' : '85%', 'left' : '15%'});
					}else{
						if($(window).width()>768){
							$('.menu-nav').css({'margin-left' : '0%'});
							$('.panel-cont').css({'width' : '80%','left' : '20%'});
						}else{
							if($(window).width()>640){
								$('.menu-nav').css({ 'margin-left' : '0%'});
								$('.panel-cont').css({ 'width' : '75%', 'left' : '25%'});
							}
						}
					}
				});
			}
		};
	})
  .directive('listProject', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-project.html',
      controller: function($document){
        $(document).on('click', '.deleteProject', function(){
          var idProject = $(this).attr('data-id');
          var idGallery = $(this).attr('data-gallery');
          var namefunction = 'deleteProject';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idProject: idProject,
              	idGallery: idGallery
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
      }
    }
  })
  .directive('formProject', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-project.php',
			controller: function($document){
				$('#formProjects').submit(function(){

		          	var ajaxData = new FormData();
		          	ajaxData.append("action", $(this).serialize());
	    			ajaxData.append("namefunction","addProject");

	    			$.each($("#formProjects input[type=file]"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageSlidersHome['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		            	alert(result);
		              // location.reload();
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
      		}
		}
	})
  .directive('formProjectEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-project-edit.php',
			controller: function($document){
				$("#formEditProjects").submit(function(e){
					e.preventDefault();
		          	var data = $(this).serialize();
		          	var namefunction = 'modifyProject';
					$.ajax({
						url: "../php/functions.php",
					  	type: "POST",
					  	data: {
		              	namefunction: namefunction,
		              	data: data
		            },
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});

				});
			}
		}
	})
  .directive('listProjectGallery', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-project-gallery.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImage';
          $.ajax({
				url: "../php/functions.php",
				type: "POST",
				data: {
	            namefunction: namefunction,
	            idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageGallery').submit(function(){
          	var ajaxData = new FormData();
			ajaxData.append("namefunction","addImageGalleryProyect");
			ajaxData.append("action", $(this).serialize());
			$.each($("#insertImageGallery input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('imageGallery['+j+']', file);
				})
			});
          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderHome', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-home.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSlider';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageBannerHome').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderHome");

			$.each($("#insertImageBannerHome input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageBannerHome['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderPromotions', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-promotions.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderPromotions';
          $.ajax({
				url: "../php/functions.php",
			 	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageBannerPromotions').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderPromotions");

			$.each($("#insertImageBannerPromotions input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageBannerPromotions['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
            	// alert(result);
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderEquipment', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-equipment.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderEquipment';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageSliderEquipment').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderEquipment");

			$.each($("#insertImageSliderEquipment input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageSliderEquipment['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderInstalations', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-instalations.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderInstalations';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageSliderInstalations').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderInstalations");

			$.each($("#insertImageSliderInstalations input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageSliderInstalations['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
            	// alert(result);
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderMaterial', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-material.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderMaterial';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
				data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageSliderMaterial').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderMaterial");

			$.each($("#insertImageSliderMaterial input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageSliderMaterial['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
            	// alert(result);
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listSliderPersonal', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-slider-personal.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageSliderPersonal';
          $.ajax({
				url: "../php/functions.php",
				type: "POST",
				data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageSliderPersonal').submit(function(){
        	
          	var ajaxData = new FormData();
          	ajaxData.append("action", $(this).serialize());
			ajaxData.append("namefunction","addImageSliderPersonal");

			$.each($("#insertImageSliderPersonal input[type=file]"), function(i,obj){
				$.each(obj.files, function(j, file){
					ajaxData.append('insertImageSliderPersonal['+j+']', file);
				})
			});

          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })
  .directive('listServices', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-services.html',
      controller: function($document){
        $(document).on('click', '.deleteService', function(){
          var idService = $(this).attr('data-id');
          var idGalleryRelation = $(this).attr('data-gallery');
          var namefunction = 'deleteService';
          $.ajax({
						url: "../php/functions.php",
					  type: "POST",
					  data: {
              namefunction: namefunction,
              idService: idService,
              idGalleryRelation: idGalleryRelation
            },
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});
        });
      }
    }
  })
  .directive('formServices', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-services.php',
			controller: function($document){
				$('#formServices').submit(function(){

		          	var ajaxData = new FormData();
		          	ajaxData.append("action", $(this).serialize());
	    			ajaxData.append("namefunction","addService");

	    			$.each($("#formServices input[type=file]"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('imageSlidersServices['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		            	// alert(result);
		              location.reload();
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
			}
		}
	})
  .directive('formServiceEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-service-edit.php',
			controller: function($document){
				$("#formEditServices").submit(function(e){
					e.preventDefault();
		          	var data = $(this).serialize();
		          	var namefunction = 'editService';
					$.ajax({
						url: "../php/functions.php",
					  	type: "POST",
					  	data: {
			              namefunction: namefunction,
			              data: data
			            },
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
  .directive('listServiceGallery', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-service-gallery.html',
      controller: function($document){
        $(document).on('click', '.deleteImage', function(){
          var idImage = $(this).attr('data-id');
          var namefunction = 'deleteImageServices';
          	$.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idImage: idImage
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
        $('#insertImageGallery').submit(function(){
          var ajaxData = new FormData();
    			ajaxData.append("namefunction","addImageGalleryService");
    			ajaxData.append("idGalleryRelation", $('#idGalleryRelation').val());
    			$.each($("#insertImageGallery input[type=file]"), function(i,obj){
    				$.each(obj.files, function(j, file){
    					ajaxData.append('imageGallery['+j+']', file);
    				})
    			});
          $.ajax({
            url: "../php/functions.php",
            type: "POST",
            data: ajaxData,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success: function(result){
              location.reload();
            },
            error: function(error){
              alert(error);
            }
          });
        });
      }
    }
  })

  .directive('listPatient', function(){
    return {
      restrict: 'E',
      templateUrl: './../partials/list-patient.html',
      controller: function($document){
        $(document).on('click', '.deletePatient', function(){
          var idPatient = $(this).attr('data-id');
          var namefunction = 'deletePatient';
          $.ajax({
				url: "../php/functions.php",
			  	type: "POST",
			  	data: {
              	namefunction: namefunction,
              	idPatient: idPatient
            },
				success: function(result){
					location.reload();
				},
				error: function(error){
					alert(error);
				}
			});
        });
      }
    }
  })
  .directive('formPatient', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-patient.php',
			controller: function($document){
				$('#formPatients').submit(function(){

		          	var ajaxData = new FormData();
		          	ajaxData.append("action", $(this).serialize());
	    			ajaxData.append("namefunction","addPatient");

	    			$.each($("#formPatients input[type=file]"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('pdfResults['+j+']', file);
	    				})
	    			});
		          $.ajax({
		            url: "../php/functions.php",
		            type: "POST",
		            data: ajaxData,
		            processData: false,  // tell jQuery not to process the data
		            contentType: false,   // tell jQuery not to set contentType
		            success: function(result){
		            	// alert(result);
		              location.reload();
		            },
		            error: function(error){
		              alert(error);
		            }
		          });
		        });
      		}
		}
	})
  .directive('formPatientEdit', function(){
		return{
			restrict: 'E',
			templateUrl: './../partials/form-patient-edit.php',
			controller: function($document){
				$("#formEditPatients").submit(function(){

					var ajaxData = new FormData();
		          	ajaxData.append("action", $(this).serialize());
	    			ajaxData.append("namefunction","modifyPatient");

	    			$.each($("#formEditPatients input[type=file]"), function(i,obj){
	    				$.each(obj.files, function(j, file){
	    					ajaxData.append('pdfResults['+j+']', file);
	    				})
	    			});
					$.ajax({
						url: "../php/functions.php",
					  	type: "POST",
					  	data: ajaxData,
			            processData: false,  // tell jQuery not to process the data
			            contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});

				});
			}
		}
	})
  	.directive('contendLoadImages', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/contend-load-images.html',
			controller: function($document){
				$('#libraryImages').submit(function(e){
					e.preventDefault();
					var ajaxData = new FormData();
					ajaxData.append("namefunction","setImagesLibrary");

					$.each($("#libraryImages input[type=file]"), function(i,obj){
						$.each(obj.files, function(j, file){
							ajaxData.append('setImage['+j+']', file);
						})
					});

					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: ajaxData,
						processData: false,  // tell jQuery not to process the data
						contentType: false,   // tell jQuery not to set contentType
						success: function(result){
							// alert(result);
							$('.ocultLoadInfoImages').trigger('click');
						},
						error: function(error){
							alert('Error');
						}
					});
				});
				$('.closePanel').click(function(){
					$('#blockPop').css({ 'opacity': '0', 'z-index': '-1' });
					$('#contendLoadImages').css({ 'opacity': '0', 'z-index': '-1' });
				});
				$(document).on('click', '.deleteImageLibrary', function(){
					var idImage = $(this).attr('data-id');
					var namefunction = 'removeImageGallery';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction: namefunction,
							idImage: idImage
						},
						success: function(result){
							$('.ocultLoadInfoImages').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('insertInterestNote', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/insert-interest-note.html',
			controller: function($document){
				$('.iconFloatClick').click(function(){
					$('#blockPop').css({ 'opacity': '1', 'z-index': '5' });
					$('#contendLoadImages').css({ 'opacity': '1', 'z-index': '10' });
				});
				$('#buttonSave').click(function(){
					$('#formAdd .formsubmit').trigger('click');
				});
				$('#formAdd').submit(function(e){
					e.preventDefault();
					var namefunction = "addNewInterestBlog";
					var data = $(this).serialize();
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction: namefunction,
							data: data
						},
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('listInterestBlog', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/list-interest-blog.html',
			controller: function($document){
				$(document).on('click', '.deleteElement', function(){
					var idInterestBlog = $(this).attr('data-id');
					var namefunction = 'removeInterestPost';
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							idInterestBlog: idInterestBlog,
							namefunction: namefunction
						},
						success: function(result){
							$('.clickoculted').trigger('click');
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
	.directive('editInterestNote', function(){
		return {
			restrict: 'E',
			templateUrl: './../partials/edit-interest-note.html',
			controller: function($document){
				$('.iconFloatClick').click(function(){
					$('#blockPop').css({ 'opacity': '1', 'z-index': '5' });
					$('#contendLoadImages').css({ 'opacity': '1', 'z-index': '10' });
				});
				$('#buttonSave').click(function(){
					$('#formAdd .formsubmit').trigger('click');
				});
				$('#formAdd').submit(function(e){
					e.preventDefault();
					var namefunction = "editNewInterestBlog";
					var data = $(this).serialize();
					$.ajax({
						url: "../php/functions.php",
						type: "POST",
						data: {
							namefunction: namefunction,
							data: data
						},
						success: function(result){
							location.reload();
						},
						error: function(error){
							alert(error);
						}
					});
				});
			}
		}
	})
})();
