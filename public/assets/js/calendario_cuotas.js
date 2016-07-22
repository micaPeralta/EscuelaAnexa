var events=[];
var year;
var fechaDefault;

function createEvent(titleString,dateString,color){
  var newEvent = new Object();
  newEvent.title = titleString;
  newEvent.start = parseDate(dateString);  
  newEvent.color=color; 
  newEvent.allDay = true;

  $("#calendar").fullCalendar( 'addEventSource', [ newEvent ] );

}


function parseDate(strDate){
  var dateParts = strDate.split("-");
  var date = new Date(dateParts[0], (dateParts[1] - 1), dateParts[2]);
  return date;
}




function crearCalendario(dni,anio){

  $("#calendar").fullCalendar({ 
   
    defaultDate: anio+'-01-01',
    header: {
        right: 'prev,next '    
      
    },
      eventSources: [ events ]
  });
   mostrarCalendario(dni,anio);
}

function mostrarCalendario(dni,anio){
 

  $.getJSON(("api-rest/index.php/cuotas/"+ dni +"/"+ anio),function(data){
      data.cuotas_impagas.forEach(function(cuota){

        createEvent("\nCuota Nro: " + cuota.numero + "\nTipo: " + cuota.tipo + "\nMonto:$"+cuota.monto,cuota.anio+"-"+cuota.mes+"-"+"30","#CC0033");
      });
      data.cuotas_pagas.forEach(function(cuota){
        createEvent( "\n Cuota Nro: " + cuota.numero + "\nTipo: " + cuota.tipo + "\nBecada:"+cuota.beca+"\nMonto:$"+cuota.monto+"\nFecha pago:"+cuota.fecha,cuota.anio+"-"+cuota.mes+"-"+"01","#33CC33");
      });
  });
}