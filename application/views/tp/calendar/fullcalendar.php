<!DOCTYPE html>
<html>
<head>
<link href='<?php echo base_url(); ?>resources/calendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url(); ?>resources/calendar/fullcalendar.print.css' rel='stylesheet' media='print' />

<script src='<?php echo base_url(); ?>resources/calendar/jquery/jquery-1.10.2.js'></script>
<script src='<?php echo base_url(); ?>resources/calendar/jquery/jquery-ui.custom.min.js'></script>

<script src='<?php echo base_url(); ?>resources/calendar/fullcalendar.js'></script>

<link href="<?php echo base_url(); ?>resources/css/bootstrap.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>resources/js/bootstrap.min.js"></script>
<script>
var g_start;
	$(document).ready(function() {
	    var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		/*  className colors
		
		className: default(transparent), important(red), chill(pink), success(green), info(blue)
		
		*/		
		
		  
		/* initialize the external events
		-----------------------------------------------------------------*/
	
		$('#external-events div.external-event').each(function() {
		
			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};
			
			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);
			
			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});
			
		});
		
		// var arr = [
		// 		{
		// 			title: 'All Day Event',
		// 			start: new Date(y, m, 1)
		// 		},
		// 		{
		// 			id: 999,
		// 			title: 'Repeating Event',
		// 			start: new Date(y, m, d-3, 16, 0),
		// 			allDay: false,
		// 			className: 'info'
		// 		},
		// 		{
		// 			id: 999,
		// 			title: 'Repeating Event',
		// 			start: new Date(y, m, d+4, 16, 0),
		// 			allDay: false,
		// 			className: 'info'
		// 		},
		// 		{
		// 			title: 'Meeting',
		// 			start: new Date(y, m, d, 10, 30),
		// 			allDay: false,
		// 			className: 'important'
		// 		},
		// 		{
		// 			title: 'Lunch',
		// 			start: new Date(y, m, d, 12, 0),
		// 			end: new Date(y, m, d, 14, 0),
		// 			allDay: false,
		// 			className: 'important'
		// 		},
		// 		{
		// 			title: 'Birthday Party',
		// 			start: new Date(y, m, d+1, 19, 0),
		// 			end: new Date(y, m, d+1, 22, 30),
		// 			allDay: false,
		// 		},
		// 		{
		// 			title: 'Click for Google',
		// 			start: new Date(y, m, 28),
		// 			end: new Date(y, m, 29),
		// 			url: 'http://google.com/',
		// 			className: 'success'
		// 		}
		// 	];
		var arr = [{"id":822017,"start":"2017-03-07T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":1822017,"start":"2017-03-17T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":1622017,"start":"2017-03-15T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":1022017,"start":"2017-03-09T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":2222017,"start":"2017-03-21T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":2422017,"start":"2017-03-23T18:30:00.000Z","end":null,"title":"Meeting","allDay":true,"className":["info"]},{"id":132017,"start":"2017-03-31T18:30:00.000Z","end":null,"title":"Set :- 2","allDay":true,"className":["info"]}];
	
		/* initialize the calendar
		-----------------------------------------------------------------*/
		
		 calendar =  $('#calendar').fullCalendar({
			header: {
				left: 'title',
				center: 'month',
				right: ''
			},
			editable: false,
			firstDay: 1, //  1(Monday) this can be changed to 0(Sunday) for the USA system
			selectable: <?php echo $selectable; ?>,
			defaultView: 'month',
			month : <?php echo $month; ?>,
			year : <?php echo $year; ?>,
			axisFormat: 'h:mm',
			columnFormat: {
                month: 'ddd',    // Mon
                week: 'ddd d', // Mon 7
                day: 'dddd M/d',  // Monday 9/7
                agendaDay: 'dddd d'
            },
            titleFormat: {
                month: 'MMMM yyyy', // September 2009
                week: "MMMM yyyy", // September 2009
                day: 'MMMM yyyy'                  // Tuesday, Sep 8, 2009
            },
			allDaySlot: false,
			selectHelper: true,
			// select: function(start, end, allDay) {
			// 	var title = prompt('Event Title:');
			// 	if (title) {
			// 		calendar.fullCalendar('renderEvent',
			// 			{
			// 				title: title,
			// 				start: start,
			// 				end: end,
			// 				allDay: allDay
			// 			},
			// 			true // make the event "stick"
			// 		);
			// 	}
			// 	calendar.fullCalendar('unselect');
			// },
			select: function(start, end, allDay) {
	            // $('#modalTitle').html(event.title);
	            // $('#modalBody').html(event.description);
	            // $('#eventUrl').attr('href',event.url);
	            $('#calendarModal').modal();
	            g_start = start;

	        },
			
			
			events: arr ,			
		});
		
		var button = '<span class="fc-button fc-button-month fc-state-default fc-corner-left fc-corner-right fc-state-active" onclick="<?php echo $function ?>;"><?php echo $button_title ?></span>';
		$('.fc-event-title').css('font-size', '1.65em');
		$('.fc-event-title').css('color', '#000');
        $('.fc-header-center').html(button);
   
	});

	function fill(flag) {
		var title;
		if(flag == 0){
			title = 'Set :- ' + $('#plan').val(); //title = $('#plan').val();
			if($('#plan').val() == ''){$('#plan').val('');$('#close').click();return;}
		}else if(flag == 1){
			title = 'Meeting';
		}else if(flag == 2){
			title = 'Leave';
		}
		$('#plan').val('');
		$('#close').click();
		if (title) {
				window.calendar.fullCalendar( 'removeEvents', [parseInt(""+g_start.getDate()+g_start.getMonth()+g_start.getFullYear())]);
				window.calendar.fullCalendar('renderEvent',
					{	
						id: parseInt(""+g_start.getDate()+g_start.getMonth()+g_start.getFullYear()),
						title: title,
						start: g_start,
						end: g_start,
						allDay: true,
						className: 'info'
					},
					true
				);
			}
			$('.fc-event-title').css('font-size', '1.65em');
			$('.fc-event-title').css('color', '#000');
			window.calendar.fullCalendar('unselect');
	}

	function submit(){
		var eventsFromCalendar = $('#calendar').fullCalendar('clientEvents');
        var eventsForCookie = [];
	    $.each(eventsFromCalendar, function(index,value) {
	        var event = new Object();
	        event.id = value.id;            
	        event.start = value.start;
	        event.end = value.end;
	        event.title = value.title;
	    	event.allDay = value.allDay;
	    	event.className = value.className;
	        eventsForCookie.push(event);
	    });             
	    console.log(JSON.stringify(eventsForCookie));
	}



</script>

<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Helvetica Nueue",Arial,Verdana,sans-serif;
		background-color: #DDDDDD;
		}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
		}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		text-align: left;
		}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
		}
		
	.external-event { /* try to mimick the look of a real event */
		margin: 10px 0;
		padding: 2px 4px;
		background: #3366CC;
		color: #fff;
		font-size: .85em;
		cursor: pointer;
		}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
		}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
		}

	#calendar {
/* 		float: right; */
        margin: 0 auto;
		width: 900px;
		background-color: #FFFFFF;
		  border-radius: 6px;
        box-shadow: 0 1px 2px #C3C3C3;
		}

</style>
</head>
<body>

<div id='wrap'>

<div id='calendar'></div>

<div style='clear:both'></div>

</div>

<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        	<span><h3>Add Schedule:-</h3>
        	</span>
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
            <h4 id="modalTitle" class="modal-title"></h4>
        </div>
        <div id="modalBody" class="modal-body">
        
        <input type="number" placeholder="Set no. of doctors to visit" id="plan" name="plan" /> Or <button type="button" class="btn btn-primary" onclick="fill(1);">Meeting</button> Or <button type="button" class="btn btn-primary" onclick="fill(2);">Leave</button>
         </div>
        <div class="modal-footer">
        	
        	<br>
       		<button type="button" class="btn btn-primary" onclick="fill(0);">Add</button>
            <button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>
</body>
</html>
