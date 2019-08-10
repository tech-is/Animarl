﻿<!-- body start -->
<section class="content">
    <div class="container-fluid">
        <!-- Body Copy -->
        <div class="row clearfix">
            <div class="card">
                <div class="col-12">
                    <h2 class="card-inside-title">メールヘッダー</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div id="event_list"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jquery Core Js -->
<script src="../../assets/cms/plugins/jquery/jquery.min.js"></script>

<!-- moment js -->
<script src='../../assets/cms/plugins/momentjs/moment.js'></script>

<!-- full calender -->
<script src="../../assets/cms/plugins/fullcalendar/packages/core/main.js"></script>
<script src="../../assets/cms/plugins/fullcalendar/packages/daygrid/main.js"></script>
<script src="../../assets/cms/plugins/fullcalendar/packages/interaction/main.js"></script>
<script src="../../assets/cms/plugins/fullcalendar/packages/timegrid/main.js"></script>
<script src="../../assets/cms/plugins/fullcalendar/packages/list/main.js"></script>
<script src="../../assets/cms/plugins/fullcalendar/packages/core/locales/ja.js"></script>


<!-- Bootstrap Core Js -->
<script src=" ../../assets/cms/plugins/bootstrap/js/bootstrap.js"> </script> <!-- Select Plugin Js -->
<script src="../../assets/cms/plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="../../assets/cms/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../assets/cms/plugins/node-waves/waves.js"></script>

<!-- Morris Plugin Js -->
<script src="../../assets/cms/plugins/raphael/raphael.min.js"></script>
<script src="../../assets/cms/plugins/morrisjs/morris.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="../../assets/cms/plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="../../assets/cms/js/admin.js"></script>

<!-- Demo Js -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        calendar_lend();
        calendar_list();
    });

    function calendar_lend() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid'],
            locale: 'ja',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2019-06-01'
                },
                {
                    title: 'Long Event',
                    start: '2019-01-01',
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-06-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-06-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2019-06-11',
                    end: '2019-06-13'
                },
                {
                    title: 'Meeting',
                    start: '2019-06-12T10:30:00',
                    end: '2019-06-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2019-06-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2019-06-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2019-06-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2019-06-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2019-07-28T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2019-06-28'
                }
            ]
        });
        calendar.render();
    }
    function calendar_list() {
        var calendarEl = document.getElementById('event_list');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['list'],
            locale: 'ja',
            defaultView: 'listWeek',
            events: [
                {
                    title: 'All Day Event',
                    start: '2019-06-01'
                },
                {
                    title: 'Long Event',
                    start: '2019-01-01',
                    end: '2019-12-10'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-06-09T16:00:00'
                },
                {
                    groupId: 999,
                    title: 'Repeating Event',
                    start: '2019-06-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2019-06-11',
                    end: '2019-06-13'
                },
                {
                    title: 'Meeting',
                    start: '2019-06-12T10:30:00',
                    end: '2019-06-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2019-06-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2019-06-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2019-06-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2019-06-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2019-07-28T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2019-06-28'
                }
            ]
        });
        calendar.render();
    }
</script>
</body>

</html>