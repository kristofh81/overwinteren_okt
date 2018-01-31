(function($) {
    var jsonResource = $("#ical-json-resource").attr('data-url');

	$.getJSON( "https://www.overwinteren.nl/api/ical-convert.json?url=" + jsonResource , function( data ) {
		if (data) {
		 		/*
		 		var eventList = [];
		 		for (var i = 0; i < data.length; i++) {
		 			var obj = {};
		 			obj.datetime = new Date(data[i].datetime.y, data[i].datetime.m-1, data[i].datetime.d, 13);

		 			eventList.push(obj);
		 		}
				$("#ical-ecalendar").eCalendar({
		 			events : eventList
		 		});*/

		 		// data : array of dates
		 var moment = rome.moment;

		rome(icalecalendar, { 
			monthsInCalendar: 3, 
			weekStart : 1,
			monthFormat: "MMM YYYY",
			dateValidator: rome.val.except(data)
			});
		} else {
		 	console.log('ical feed error/ not publiek gemaakt? of op api?');
		}
	});      	
})(jQuery);