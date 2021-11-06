  <div class="content">
    <div id='calendar'></div>
    <?php include('vue_modal.php') ;
    //include('../../create_atelier.php')
     ?>
  </div>

    <script src="calendar-19/js/jquery-3.3.1.min.js"></script>
    <script src="calendar-19/js/popper.min.js"></script>
    <script src="calendar-19/js/bootstrap.min.js"></script>

    <script src='calendar-19/fullcalendar/packages/core/main.js'></script>
    <script src='calendar-19/fullcalendar/packages/interaction/main.js'></script>
    <script src='calendar-19/fullcalendar/packages/daygrid/main.js'></script>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          timeZone: 'Europe/Paris',
          locale: 'fr',
          plugins: [ 'interaction', 'dayGrid' ],
          defaultDate: '2021-11-01', //2021-11-19 novembre 21
          editable: true,
          eventLimit: true, // allow "more" link when too many events

          //eventClick : click on event in calendar will open a Bootstrap Modal
          eventClick:  function(event) {

            console.log('modal : ', event);
            let modalTitle = document.getElementById('modalTitle');

            console.log("modalTitle : ", modalTitle);
            console.log("essai : ", event.event._def.title);

            let nom_atelier = event.event._def.title;
            $('#modalTitle').html(nom_atelier);
            //console.log('nom_atelier : ', nom_atelier);

            let description_atelier = event.event._def.extendedProps.description
            $('#modalBody').html(description_atelier);
            //console.log("Description de l'évenment : ", description_atelier);

            let date_atelier = event.event.start;
            $('#modalDate').html(date_atelier);
            //console.log("Date de l'évenment : ", date_atelier);

            $('#fullCalModal').modal('show'); //affiche la modal ('show') !important!
          },
            events: 'http://localhost:8888/parc_couture/controler/event_controler.php'
        });
        calendar.render();
      });
      //eventClick : click on event in calendar and open a Bootstrap Modal
    </script>

    


<!-- //créer le modal sans le bouton et faire un getelementbyid pour récupérer ce modal et le faire sur le click/onclick/
 -->

<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Essai popup modal sur event</button>
-->







