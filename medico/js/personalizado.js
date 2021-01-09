
document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');

  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale:'pt-br',
    plugins: [ 'interaction', 'dayGrid' ],
    editable: true,
    eventLimit: true, 
    events:'consulta.php',

      extraParams: function () {
        return {
         cachebuster: new Date (). valueOf()
        };
      },  

      eventClick: function (info) {
        $("#paciente").attr("href", "ver/ver.php?id=" + info.event.title);
        info.jsEvent.preventDefault();
     

        $('#visual #id').text(info.event.id);
        $('#visual #title').text(info.event.title);
        $('#visual #start').text(info.event.start.toLocaleString());
        $('#visual').modal('show');


      }
      

  });

  calendar.render();
});

