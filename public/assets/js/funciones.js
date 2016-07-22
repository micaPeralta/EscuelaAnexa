var idAlumno=0;
var idResponsable=0;
var idUsuario=0;
var idCuota=0;
var idPago=0;

function mostrar_div(id_div){
  document.getElementById(id_div).style.display = 'inline';
  return true;
}


function ocultar_div(id_div){

 document.getElementById(id_div).style.display = 'none';
 return true;
}
$(document).on('click','#passw',function(e){

	ocultar_div('passw');
	mostrar_div('modf_clave');

});



$(document).on('click','#resp',function(e){

  ocultar_div('resp');
  mostrar_div('cambiar_resp');

});

  function  toggle_o_nada(myid,idvecino){
           var checkbox1=document.getElementById(myid);
           var checkbox2=document.getElementById(idvecino);
           var select=document.getElementById('pagador');
            if(checkbox1.checked){
              select.hidden=false;
              checkbox2.disabled=true;
            }
            else{ 
              checkbox2.disabled=false;
              select.hidden=true; 
            }
      }


/*-------------------------------------------------------*/
 function eliminarDiv(id){
     $('#eliminar_'+id).remove();
  }


 
/*-----------------eliminar alumno--------------------*/


 function eliminarAlumno(id){
    var route = "/alumno/"+id;
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'PUT',
      dataType:'json',
      success:function(){
         eliminarDiv(idAlumno);
         $('#msj-success').fadeIn();
      },
      error:function(){
         $('#msj-error').fadeIn();
      }

    });
 }

    function confirmarBorradoAlum(id){
      idAlumno=id;
      bootbox.confirm("¿Está seguro de borrar este alumno?", function(result) {
        if (result){
           eliminarAlumno(id);
        };
      }); 
    }
 /*------------------fin eliminar alumno------------------------------*/




/*----------------eliminar responsable---------------------*/



 function eliminarResponsable(id){
    var route = "/responsable/"+id;
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'PUT',
      dataType:'json',
      success:function(){
         eliminarDiv(idResponsable);
         $('#msj-success').fadeIn();
      },
      error:function(){
         $('#msj-error').fadeIn();
      }

    });
 }


 
  function confirmarBorradoResp(id){
    idResponsable=id;
     bootbox.confirm("¿Está seguro de borrar este responsable?", function(result) {
        if (result){
           eliminarResponsable(id);
       };
    }); 
  
 }


 /*-----------------------fin elimnar responsable-----------*/


/*----------------eliminar responsable alumno --------------------*/


 function confirmarBorradoRespAlum(){
   bootbox.confirm("¿Está seguro de borrar este responsable para este alumno?", function(result) {
        if (result){
          document.formElimRA.submit();
         };
      }); 
  
  
}

/*---------------------fin eliminar reponsable alumno---------------*/
/*----------------eliminar responsable usuario --------------------*/


 function eliminarResponsableUsuario(){
   
 
    var route = "/usuario/"+idUsuario+"/responsable";
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'DELETE',
      data:{idUsuario:idUsuario,idResponsable:idResponsable},
      dataType:'html',
      error:function(){
         $('#msj-error').fadeIn();
      },
      success:function(){
        $('#msj-success').fadeIn();
      }

    });
 }

 function confirmarBorradoRespUsuario(){   
    bootbox.confirm("¿Está seguro de borrar este responsable para este usuario?", function(result) {
        if (result){
           document.formElimRU.submit();
        };
    }); 
    
}

/*---------------------fin eliminar reponsable usuario---------------*/
/*---------------------eliminar usuario----------------------*/



 function eliminarUsuario(id){
    var route = "usuario/"+id;
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'PUT',
      dataType:'json',
      success:function(){
         eliminarDiv(idUsuario);
         $('#msj-success').fadeIn();
      },
      error:function(){
         $('#msj-error').fadeIn();
      }

    });
 }
 function confirmarBorradoUsuario(id){
      idUsuario=id;
     bootbox.confirm("¿Está seguro de borrar este usuario?", function(result) {
        if (result){
           eliminarUsuario(id);
       };
    }); 
  }

/*---------------------fin eliminar usuario-------------------*/

function eliminarCuota(id){
    var route = "/cuota/"+id;
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'PUT',
      dataType:'json',
      success:function(){
         eliminarDiv(idCuota);
         $('#msj-success').fadeIn();
      },
      error:function(){
         $('#msj-error').fadeIn();
      }

    });
 }


function confirmarBorradoCuota(id){
    idCuota=id;
     bootbox.confirm("¿Está seguro de borrar esta cuota?", function(result) {
        if (result){
          eliminarCuota(id);
        };
    }); 
    
 }

 /*function confirmarBorradoPago(idCuota,idAlumno){
   bootbox.confirm("¿Está seguro de borrar el pago de esta cuota?", function(result) {
        if (result){
           window.location="/alumno/"+idAlumno+"/borrarPago/"+idCuota;
  */


  function eliminarPago(id){
    var route ='/alumno/'+idAlumno+'/cuota/'+idCuota;
    var token = $('#token').val();

    $.ajax({
      url:route,
      headers:{'X-CSRF-TOKEN':token},
      type:'DELETE',
      dataType:'json',
      success:function(){
         eliminarDiv(idCuota);
         $('#msj-success').fadeIn();
      },
      error:function(){
         $('#msj-error').fadeIn();
      }

    });
 }
 function confirmarBorradoPago(idC,idA){
  idCuota=idC;
  idAlumno=idA;
   bootbox.confirm("¿Está seguro de borrar el pago de esta cuota?", function(result) {
        if (result){
           eliminarPago(idCuota);
       };
    }); 
  
 }









/*--------------------paginacion--------------------------*/



$(document).on('click',' #alumnos .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];

  var route = "/alumnos";

  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){
      $('#alumnos').html(respuesta);
    }
  });
});


$(document).on('click','#cuotas .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];
  var route = "/cuotas";
  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){
      $('#cuotas').html(respuesta);
    }
  });
});

$(document).on('click','#cuotas_pagadas .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];
  var route = "/cuotas_pagadas_o_becadas";
  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){
      $('#cuotas_pagadas').html(respuesta);
    }
  });
});



$(document).on('click','#responsables .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];

  var route = "/responsables";
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){


      $('#responsables').html(respuesta);

    }
  });
});
  

$(document).on('click','#cuotas_impagas .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];


  var route = "/cuotas_impagas_vencidas";


  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){


      $('#cuotas_impagas').html(respuesta);

    }
  });
});

$(document).on('click','#alumnos_matriculas .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];

  var route = "/alumnos_matriculas_pagas";
  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){
     
      $('#alumnos_matriculas').html(respuesta);

    }
  });
});

function guardarIdAlumno(id){
    idAlumno=id;
}

$(document).on('click','#matriculas_pagas_del_alumno .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];

  var route = "alumno/"+idAlumno+"/matriculas";
/*   var route=document.location;*/
  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){


      $('#matriculas_pagas_del_alumno').html(respuesta);

    }
  });
});

$(document).on('click','#alumnos_y_cuotas .pagination a',function(e){
  e.preventDefault();
  var pag = $(this).attr('href').split('page=')[1];

  var route = "/alumnos_y_cuotas";

  
  $.ajax({
    url:route,
    data:{page:pag},
    type:'GET',
    dataType:'json',
    success:function(respuesta){


      $('#alumnos_y_cuotas').html(respuesta);

    }
  });
});
