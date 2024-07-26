
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css" rel="stylesheet" />
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/full-calendar.css" rel="stylesheet">
    
</head>

<body>
    <div class="position-relative bg-white d-flex p-0">
       
       @include('sidebar')


        <!-- Content Start -->
        <div class="content">
            
            @include('navbar')

            <!-- Content start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-white rounded h-100 p-4 shadow-sm">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h6 class="mb-0">Appointment</h6>
                                <div class="d-flex">
                                    
                                    <a href='/appointment/new' class="btn btn-primary ms-4 border-0 shadow-sm" >
                                        <span class="fa fa-plus"></span> Add Appointment
                                    </a>
                                </div>
                            </div>
                            <div>
                                <div>
                                    <div class="card">
                                        <div class="card-body p-0">
                                        <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
            <!-- Content end -->

            @include('footer')
           
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- calendar modal -->
    <div id="modal-view-event" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
                    <div class="event-body"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form id="add-event">
                    <div class="modal-body">
                        <h4>Add Event Detail</h4>
                        <div class="form-group">
                            <label>Event name</label>
                            <input type="text" class="form-control" name="ename">
                        </div>
                        <div class="form-group">
                            <label>Event Date</label>
                            <input type='text' class="datetimepicker form-control" name="edate">
                        </div>
                        <div class="form-group">
                            <label>Event Description</label>
                            <textarea class="form-control" name="edesc"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Event Color</label>
                            <select class="form-control" name="ecolor">
                                <option value="fc-bg-default">fc-bg-default</option>
                                <option value="fc-bg-blue">fc-bg-blue</option>
                                <option value="fc-bg-lightgreen">fc-bg-lightgreen</option>
                                <option value="fc-bg-pinkred">fc-bg-pinkred</option>
                                <option value="fc-bg-deepskyblue">fc-bg-deepskyblue</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Event Icon</label>
                            <select class="form-control" name="eicon">
                                <option value="circle">circle</option>
                                <option value="cog">cog</option>
                                <option value="group">group</option>
                                <option value="suitcase">suitcase</option>
                                <option value="calendar">calendar</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
jQuery(document).ready(function(){
    jQuery('.datetimepicker').datepicker({
        timepicker: true,
        language: 'en',
        range: true,
        multipleDates: true,
            multipleDatesSeparator: " - "
        });
    jQuery("#add-event").submit(function(){
        alert("Submitted");
        var values = {};
        $.each($('#add-event').serializeArray(), function(i, field) {
            values[field.name] = field.value;
        });
        console.log(
            values
        );
    });
});

(function () {    
    'use strict';
    const modalAdd = new bootstrap.Modal(document.getElementById('modal-view-event-add'), {
       keyboard: false
    });

    const modalView = new bootstrap.Modal(document.getElementById('modal-view-event'), {
       keyboard: false
    });
    // ------------------------------------------------------- //
    // Calendar
    // ------------------------------------------------------ //
	jQuery(function() {
		// page is ready
		jQuery('#calendar').fullCalendar({
			themeSystem: 'bootstrap4',
			// emphasizes business hours
			businessHours: false,
			defaultView: 'month',
			// event dragging & resizing
			editable: true,
            displayEventTime: false,
			// header
			header: {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'today prev,next'
			},
			events: [
				{
					title: 'Barber',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-05-05',
					end: '2024-05-05',
					className: 'fc-bg-default',
					icon : "circle"
				},
				{
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-08T14:00:00',
					end: '2024-08-08T20:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
                {
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-08T20:00:00',
					end: '2024-08-08T21:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
                {
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-08T20:00:00',
					end: '2024-08-08T21:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
                {
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-08T20:00:00',
					end: '2024-08-08T21:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
                {
					title: 'Flight Paris',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-08T20:00:00',
					end: '2024-08-08T21:00:00',
					className: 'fc-bg-deepskyblue',
					icon : "cog",
					allDay: false
				},
				{
					title: 'Team Meeting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-07-10T13:00:00',
					end: '2024-07-10T16:00:00',
					className: 'fc-bg-pinkred',
					icon : "group",
					allDay: false
				},
				{
					title: 'Meeting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-12',
					className: 'fc-bg-lightgreen',
					icon : "suitcase"
				},
				{
					title: 'Conference',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-13',
					end: '2024-08-15',
					className: 'fc-bg-blue',
					icon : "calendar"
				},
				{
					title: 'Baby Shower',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-13',
					end: '2024-08-14',
					className: 'fc-bg-default',
					icon : "child"
				},
				{
					title: 'Birthday',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-09-13',
					end: '2024-09-14',
					className: 'fc-bg-default',
					icon : "birthday-cake"
				},
				{
					title: 'Restaurant',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-10-15T09:30:00',
					end: '2024-10-15T11:45:00',
					className: 'fc-bg-default',
					icon : "glass",
					allDay: false
				},
				{
					title: 'Dinner',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-11-15T20:00:00',
					end: '2024-11-15T22:30:00',
					className: 'fc-bg-default',
					icon : "cutlery",
					allDay: false
				},
				{
					title: 'Shooting',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-08-25',
					end: '2024-08-25',
					className: 'fc-bg-blue',
					icon : "camera"
				},
				{
					title: 'Go Space :)',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-12-27',
					end: '2024-12-27',
					className: 'fc-bg-default',
					icon : "rocket"
				},
				{
					title: 'Dentist',
					description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras eu pellentesque nibh. In nisl nulla, convallis ac nulla eget, pellentesque pellentesque magna.',
					start: '2024-12-29T11:30:00',
					end: '2024-12-29T012:30:00',
					className: 'fc-bg-blue',
					icon : "medkit",
					allDay: false
				}
			],
			// eventRender: function(event, element) {
			// 	if(event.icon){
			// 		element.find(".fc-title").prepend("<i class='fa fa-"+event.icon+"'></i>");
			// 	}
			//   },
            eventRender: function (event, element, view) {
            $(element).each(function () { 
                $(this).attr('date-num', event.start.format('YYYY-MM-DD')); 
            });
        },
        eventAfterAllRender: function(view){
            var cDay;
            for( cDay = view.start.clone(); cDay.isBefore(view.end) ; cDay.add(1, 'day') ){
                var dateNum = cDay.format('YYYY-MM-DD');
                var dayEl = $('.fc-day[data-date="' + dateNum + '"]');
                var eventCount = $('.fc-event[date-num="' + dateNum + '"]').length;
                if(eventCount){
                    var html = '<span class="event-count">' + 
                                '<i>' +
                                eventCount + 
                                '</i>' +
                                ' Events' +
                                '</span>';

                    dayEl.append(html);

                }
            }
        },
			dayClick: function() {
				modalAdd.show();
			},
			eventClick: function(event, jsEvent, view) {
			        jQuery('.event-icon').html("<i class='fa fa-"+event.icon+"'></i>");
					jQuery('.event-title').html(event.title);
					jQuery('.event-body').html(event.description);
					jQuery('.eventUrl').attr('href',event.url);
					modalView.show();
			},
		})
	});
  

})(jQuery);
    </script>
</body>

</html>