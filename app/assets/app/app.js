$(function($) {

		$hostMaster = "http://localhost:8888/redefectiva/api";

 	    $("#form-nalumno").submit(function(e) {
	        
	        e.preventDefault();

	        var button = $(this).find('button[type="submit"]');
	        var matricula = $(this).find('input[name="matricula"]');
	        var nombre = $(this).find('input[name="nombre"]');
	        var appat = $(this).find('input[name="appat"]');
	        var apmat = $(this).find('input[name="apmat"]');
	        var fecnac = $(this).find('input[name="fecnac"]');
	        var genero = $(this).find('select[name="genero"]');
	        var grado = $(this).find('input[name="grado"]');
	        var idalumno = $(this).find('input[name="idalumno"]');


	        var form = $('.needs-validation')
	            form.removeClass('was-validated');

	        console.log($hostMaster+'/api.php');

	        $.ajax({
	            url : $hostMaster+'/api.php',
	            type : 'post',
	            dataType: 'json',
	            contentType: 'application/json',
	            data : JSON.stringify({
	            	object : "alumno",
	                action : 'save',
	                matricula: matricula.val(),
	                nombre : nombre.val(),
	                appat : appat.val(),
	                apmat : apmat.val(),
	                fecnac : fecnac.val(),
	                genero : genero.val(),
	                grado : grado.val(),
	                id : idalumno.val()
	            }),
	            beforeSend: function(){
	            	button.prop('disabled', true);
	            	button.html('<span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>Loading...');
	            },
	            success : function( response ) {

	            	console.log(response);
	            	if (response[0].error) {

	                 	
	                    button.prop('disabled', false);
	                    button.text('Guardar');

	                    form.addClass('was-validated');
	                    //username.focus().val('');
	            		
	                    if(parseINT(response[0].error)==56){
	                    	 $.toast({ loader: true, 
	                                heading: 'Warning', 
	                                text: 'La matricula que estas usando ya se encuentra registrada', 
	                                icon: 'warning',
	                                afterHidden: function () 
	                                {
	                                    location.href = './index.php';
	                                }
	                            });	       
	                    }
	                    

	            	} else {
	                    console.log("PASA 02");
	                    $.toast({ loader: true, 
	                                heading: 'Alerta', 
	                                text: 'List!.', 
	                                icon: 'success',
	                                afterHidden: function () 
	                                {
	                                    location.href = './index.php';
	                                }
	                            });	                    
	            	}
	            }
	        });
	    });



 	    //Funcionalidad de tabla principal
 	    if ( $('#lista-alumnos').length ) {
	    	var ft = FooTable.init('.table_alumnos', {
	            "useParentWidth": false,
	            "showToggle": false,
	            "paging": { "enabled": true },
	            "sorting": { "enabled": true },
	            "showHeader": true,
	            "editing": {
	                //enabled: false,
	                //alwaysShow: false,
	                
	                //allowAdd: false,
	                
	                showText: '<span class="fa fa-pencil" aria-hidden="true"></span> Editar Alumnos',
	                hideText: "Cancelar",
	                
	                addText: '<i class="fa fa-plus" aria-hidden="true"></i>Agregar Alumno',

	                allowEdit: true,
	                editText: '<i class="fa fa-pencil" aria-hidden="true"></i>',

	                allowDelete: true,
	                deleteText: '<i class="fa fa-trash" aria-hidden="true"></i>',
	                addRow: function(row){
	                    window.location.href = 'registro.php';
	                },
	                editRow: function(row){
	                    var values = row.val();
	                    window.location.href = 'registro.php?alumnoid='+values.id;
	                },
	                deleteRow: function(row){

	                    var values = row.val();

	                    if (confirm('¿Estás seguro de que deseas eliminar de forma permanente este alumno?')){
	                        
	                        $.ajax({
	                            url : $hostMaster+'/api.php',
	                            type : 'post',
	                            dataType: 'json',
	                            contentType: 'application/json',
	                            data : JSON.stringify({
	                            	object : "alumno",
	                                action : 'delete',
	                                id: values.id
	                            }),
	                            beforeSend: function(){ },
	                            success : function( data ) {

	                                if (data.error) {
	                                    $.toast({ loader: true, heading: 'Error', text: data.message, icon: 'error'})
	                                } else {
	                                    $.toast({loader: true, heading: 'Éxito', text: data.message, icon: 'success', showHideTransition: 'fade'})
	                                    row.delete();
	                                }
	                            }
	                        });

	                    }
	                }
	            },
	            "column": {
	                "classes": "footable-editing",
	                "name": "editing",
	                "title": "ACCIONES",
	                "filterable": true,
	                "sortable": true
	            },
	            "columns": $.getJSON($hostMaster +"/api.php?object=alumno&action=columns"),
	            "rows": $.getJSON($hostMaster +"/api.php?object=alumno&action=getActivos")
	        });

	        ///////////////////////////////////////////////
	        $("#form-ver-listxgrupo").submit(function(e) {
	        
		        e.preventDefault();

		        var button = $(this).find('button[type="submit"]');
		        var grado = $(this).find('input[name="grado"]');

		        if(grado.val()==undefined || grado.val()<=0)
		        {
		        	$.toast({ loader: true, 
	                                heading: 'Warning', 
	                                text: 'Favor de ingresar el grado que desea buscar', 
	                                icon: 'warning',
	                                afterHidden: function () 
	                                {
	                                    grado.focus();
	                                }
	                            });
		        	return false;
		        }

		        var form = $('.needs-validation')
		            form.removeClass('was-validated');

		        $.get($hostMaster+"/api.php?object=alumno&action=search&key=grado_ingresar&value="+grado.val()).then(function (rows) {
	           
	                ft.loadRows(rows, false);

	                $("#titleDasboard").html("Alumnos de "+grado.val()+" grado");
	                console.log($("#cancelSearch").hasClass("d-none"));
	                if($("#cancelSearch").hasClass("d-none")==true)
	                	$("#cancelSearch").toggleClass("d-none d-inline-block");
	        
	            });

		        
		    });
	    }

	    $("#cancelSearch").click(function(e){
	    	e.preventDefault();
	    	$("#titleDasboard").html("Alumnos");
	    	$("#cancelSearch").toggleClass("d-inline-block d-none");

	    	var grado = $("#grado");
	        grado.val('');

	    	$.get($hostMaster+"/api.php?object=alumno&action=getActivos").then(function (rows) {
	           
	                ft.loadRows(rows, false);

	        });

	    });
});