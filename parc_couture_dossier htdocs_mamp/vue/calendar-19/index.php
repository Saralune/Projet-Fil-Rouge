  <div class="content">
    <div id='calendar'></div>
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
          defaultDate: '2020-02-19', //2021-11-19 novembre 21
          editable: true,
          eventLimit: true, // allow "more" link when too many events
          events: [
            {
              title: 'All Day Event',
              start: '2020-02-01'
            },
            {
              title: 'Ouverture du parc',
              start: '2021-11-19'
            },
            {
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
            }
          ]
        });

        calendar.render();
      });

    </script>