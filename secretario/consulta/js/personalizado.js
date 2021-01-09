
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale:'pt-br',
    plugins: [ 'interaction', 'dayGrid' ],
    //defaultDate: '2019-04-12',
    editable: true,
    eventLimit: true, 
    events:'consulta.php',

      extraParams: function () {
        return {
         cachebuster: new Date (). valueOf()
        };
      },  

      eventClick: function (info) {
        info.jsEvent.preventDefault();

        $('#visual #title').text(info.event.title);
        $('#visual #start').text(info.event.start.toLocaleString());
        $('#visual').modal('show');


      }, 

      selectable: true,

      select: function(info){
       // alert('Dia da consulta: '+ info.start.toLocaleString());
       $('#cadastrar #start').val(info.start.toLocaleString());
       $('#cadastrar').modal('show');
      }

  });

  calendar.render();
});

//Mascara para o campo data e hora
function DataHora(evento, objeto) {
  var keypress = (window.event) ? event.keyCode : evento.which;
  campo = eval(objeto);
  if (campo.value == '00/00/0000 00:00:00') {
      campo.value = "";
  }

  caracteres = '0123456789';
  separacao1 = '/';
  separacao2 = ' ';
  separacao3 = ':';
  conjunto1 = 2;
  conjunto2 = 5;
  conjunto3 = 10;
  conjunto4 = 13;
  conjunto5 = 16;
  if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
      if (campo.value.length == conjunto1)
          campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto2)
          campo.value = campo.value + separacao1;
      else if (campo.value.length == conjunto3)
          campo.value = campo.value + separacao2;
      else if (campo.value.length == conjunto4)
          campo.value = campo.value + separacao3;
      else if (campo.value.length == conjunto5)
          campo.value = campo.value + separacao3;
  } else {
      event.returnValue = false;
  }
}

