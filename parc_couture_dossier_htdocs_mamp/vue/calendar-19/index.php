  <div class="content">
    <div id='calendar'></div>

<!--     <a href="vue_modal.php" data-toggle="modal" data-bs-target="#exampleModal" role="button" class="btn-u btn-block">Add</a>
 -->  
    <?php include('vue_modal.php') ?>
  </div>
  
    <script src="calendar-19/js/jquery-3.3.1.min.js"></script>
    <script src="calendar-19/js/popper.min.js"></script>
    <script src="calendar-19/js/bootstrap.min.js"></script>

    <script src='calendar-19/fullcalendar/packages/core/main.js'></script>
    <script src='calendar-19/fullcalendar/packages/interaction/main.js'></script>
    <script src='calendar-19/fullcalendar/packages/daygrid/main.js'></script>

    <!--SRC for eventClick link to modal bootstrap-->
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.6.1/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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

          //eventClick : click on event in calendar and open a Bootstrap Modal
          eventClick:  function(event, jsEvent, view) {
              $('#modalTitle').html(event.title);
              $('#modalBody').html(event.description);
              $('#eventUrl').attr('href',event.url);
              $('#fullCalModal').modal();
              return false;
            },

          events: [
            /* {
              title: 'All Day Event',
              start: '2020-02-01'
            }, */
            {
              id: '',
              title: 'Ouverture du parc',
              start: '2021-11-19',
              extendedProps: { //my own non-standart fields
                category: 'Upcycling',
                description: ""
              },
            },
            /* {
              title: 'Long Event',
              start: '2020-02-07',
              end: '2020-02-10'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2020-02-09T16:00:00'
            },
            {
              groupId: 999,
              title: 'Repeating Event',
              start: '2020-02-16T16:00:00'
            },
            {
              title: 'Conference',
              start: '2020-02-11',
              end: '2020-02-13'
            },
            {
              title: 'Meeting',
              start: '2020-02-12T10:30:00',
              end: '2020-02-12T12:30:00'
            },
            {
              title: 'Lunch',
              start: '2020-02-12T12:00:00'
            },
            {
              title: 'Meeting',
              start: '2020-02-12T14:30:00'
            },
            {
              title: 'Happy Hour',
              start: '2020-02-12T17:30:00'
            },
            {
              title: 'Dinner',
              start: '2020-02-12T20:00:00'
            },
            {
              title: 'Birthday Party',
              start: '2020-02-13T07:00:00'
            },
            {
              title: 'Click for Google',
              url: '',
              start: '2020-02-28'
            } */
          ],

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







