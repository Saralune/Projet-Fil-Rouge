  <div class="content">
    <div id='calendar'></div>
    <?php include('vue_modal.php') ?>
    <?php include('../../create_atelier.php') ?>
  </div>

  <!--<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.css' rel='stylesheet' />
<link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.min.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.4/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.4/jquery.min.js'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modal.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/css/bootstrap-modal-bs3patch.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/css/bootstrap-modal.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/img/ajax-loader.gif"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modalmanager.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-modal/2.2.5/js/bootstrap-modalmanager.min.js"></script>
-->


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
            //$('#modalTitle').html(event.title);
            /*console.log("titre de l'évenement : ", event.title);*/

              /*let nom_atelier = document.getElementById('modalTitle');*/
              let nom_atelier = event.event._def.title;
              /*nom_atelier.innerHTML = this.title;*/
              console.log('nom_atelier : ', nom_atelier);

            /*$('#modalBody').html(event.description);*/
              let description_atelier = event.event._def.extendedProps.description
            $('#modalBody').html(description_atelier);
            console.log("Description de l'évenment : ", description_atelier);
            //$('#eventUrl').attr('href',event.url);*/
            $('#fullCalModal').modal('show'); //affiche la modal ('show') !important!
          }, 

     

          events: //'event_controler.php' voir : https://fullcalendar.io/docs/events-json-feed
         
          [/*
             {
              title: 'All Day Event',
              start: '2020-02-01'
            },*/
            {
              id: '',
              title: "Ouverture du parc",
              start: '2021-11-19T14:30:00',
              extendedProps: {    //my own non-standart fields
                category: 'Upcycling',
                description: "Ceci est une description, blablbalaablabalbalnabalaba",
                animateur: '',
                price: ''
              },
            },
              {
              id: '',
              title: "Essai 12",
              start: '2021-11-29T14:30:00',
              extendedProps: {    //my own non-standart fields
                category: 'Débutant',
                description: "ESsai esaiesaiienfemzkfnzefnezmln ezfkzjbnfzmk vkjq ejkf zekf zebf ekzj fbzbefib",
                animateur: 'Sarah',
                price: '50€'
              },
            },
            {
              title: 'Long Event',
              start: '2021-11-07',
              end: '2021-11-10'
            }/*,
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
            }*/
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







