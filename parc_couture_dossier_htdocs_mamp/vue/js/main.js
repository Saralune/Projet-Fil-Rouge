//eventClick : click on event in calendar and open a Bootstrap Modal
/* $(document).ready(function() {
    $('#bootstrapModalFullCalendar').fullCalendar({
        eventClick:  function(event, jsEvent, view) {
            $('#modalTitle').html(event.title);
            $('#modalBody').html(event.description);
            $('#eventUrl').attr('href',event.url);
            $('#fullCalModal').modal();
            return false;
        },
        events:
        [
           {
              title: "Free Pizza",
              allday: "false",
              description: "<p>This is just a fake description for the Free Pizza.</p><p>Nothing to see!</p>",
              start: moment().subtract('days',14),
              end: moment().subtract('days',14),
              url: "http://www.mikesmithdev.com/blog/coding-without-music-vs-coding-with-music/"
           }
        ]
    });
}); */
/* <!--source clic sur event calendar : https://github.com/MikeSmithDev/FullCalModal/blob/master/index.html --> */