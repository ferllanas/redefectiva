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
	                action : 'save_alumno',
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
});