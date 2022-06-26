    /*==============================================================
                        Calendar  Js
    =============================================================*/
    $(document).ready(function() {
        $('#calendar').fullCalendar({
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2018-1-25',
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
              var title = prompt('Event Title:');
              var eventData;
              if (title) {
                eventData = {
                  title: title,
                  start: start,
                };
                $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
              }
              $('#calendar').fullCalendar('unselect');
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
              {
                title: 'Events Group',
                start: '2018-1-03'
              },
              {
                title: 'Birthday',
                start: '2018-1-11',
              },
              {
                title: 'Meeting',
                start: '2018-1-13',
              },
              {
                title: 'Ninja Team Events',
                start: '2018-1-21',
              },
              {
                title: 'Group',
                start: '2018-1-25',
              },
            ]
        });
    });
