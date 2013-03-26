months = [];
months[1] = "Jan";
months[2] = "Feb";
months[3] = "Mar";
months[4] = "Apr";
months[5] = "May";
months[6] = "Jun";
months[7] = "Jul";
months[8] = "Aug";
months[9] = "Sep";
months[10] = "Oct";
months[11] = "Nov";
months[12] = "Dec";

$(function() {	    
    // START OF DATE RANGE BUTTONS
    $('#dateToday').click(function() {
        today = new Date();
        month = months[today.getMonth()+1];
        day = today.getDate();
        
        $('#startMonth').val(month);
        $('#startDay').val(day);
        $('#endMonth').val(month);
        $('#endDay').val(day);
        
        tryGet();
    });
        
    $('#dateYesterday').click(function() {
        today = new Date();
        todayMonth = months[today.getMonth()+1];
        todayDay = today.getDate();
        
        yesterday = today.setDate(today.getDate()-1);
        yesterday = new Date(yesterday);
        yesterdayMonth = months[yesterday.getMonth()+1];
        yesterdayDay = yesterday.getDate();
        
        $('#startMonth').val(yesterdayMonth);
        $('#startDay').val(yesterdayDay);
        $('#endMonth').val(todayMonth);
        $('#endDay').val(yesterdayDay);
        
        tryGet();
    });
        
    $('#datePastWeek').click(function() {
        today = new Date();
        todayMonth = months[today.getMonth()+1];
        todayDay = today.getDate();
        
        lastWeek = today.setDate(today.getDate()-7);
        lastWeek = new Date(lastWeek);
        lastWeekMonth = months[lastWeek.getMonth()+1];
        lastWeekDay = lastWeek.getDate();
        
        $('#startMonth').val(lastWeekMonth);
        $('#startDay').val(lastWeekDay);
        $('#endMonth').val(todayMonth);
        $('#endDay').val(todayDay);
        
        tryGet();
    });
        
    $('#datePastMonth').click(function() {
        today = new Date();
        todayMonth = months[today.getMonth()+1];
        todayDay = today.getDate();
        
        lastMonth = today.setMonth(today.getMonth()-1);
        lastMonth = new Date(lastMonth);
        lastMonthMonth = months[lastMonth.getMonth()+1];
        lastMonthDay = lastMonth.getDate();
        
        $('#startMonth').val(lastMonthMonth);
        $('#startDay').val(lastMonthDay);
        $('#endMonth').val(todayMonth);
        $('#endDay').val(todayDay);
        
        tryGet();
    });
    // END OF DATE RANGE BUTTONS
        
    
    // GO!
    $('#go').click(function() {
    	init();
        get(15);
        $(window).scroll(function(){
            if  ($(window).scrollTop() == $(document).height() - $(window).height()){
                get(5);
            }
        });
    });
    
});

function tryGet() {
	var search = $("#search").val();
	
	if (search) {
		$('#go').click();
	}
}

function init() {
	$("#results").text("");
	getLocations();
}

function getLocations() {
    var data = {};
    data.f = "getLocations";
    dataJSON = $.toJSON(data);
    $.ajax({
        data: dataJSON,
        dataType: 'json',
        type: 'POST',
        url: 'clSearcher.php',
        async: false,
        complete: function(data) {},
        success: function(locations) {
            $(locations).each(function(num, loc) {
                row = '<div class="loc" style="display:none;"><h4><a href="' + loc.link + '" target="blank">' + loc.name + '</a></h4><div data-locurl="' + loc.url + '" class="well" data-loaded="0"></div></div>';
                $('#results').append(row);
            })
        }
    });
}

function get(n) {
    startMonth = $('#startMonth').val();
    startDay = $('#startDay').val();
    endMonth = $('#endMonth').val();
    endDay = $('#endDay').val();
        
    search = $("#search").val();
        
    if (startMonth && startDay && endMonth && endDay) {
        if (search) {
        	
        	startDate = startMonth + " " + startDay;
        	endDate = endMonth + " " + endDay;
        	
            var i = 1;
            $('div[data-loaded="0"]').each(function(num, loc) {
                if (i < n) {
                    locID = $(loc).attr('data-locid');
                    locURL = $(loc).attr('data-locurl');
                    $(loc).attr('data-loaded', '1');
                    $(loc).parent().fadeIn();
                    getJobs(startDate, endDate, locID, locURL, search);
                    i = i+1;
                }
            });
                        
        } else {
            alert("You must select a search term.");
        }
    } else {
        alert("You must select a start and end date.");
    }
}

function getJobs(startDate, endDate, locID, locURL, search) {
	 var data = {};
    data.f = "getJobs";
    data.startDate = startDate;
    data.endDate = endDate;
    data.locID = locID;
    data.locURL = locURL;
    data.search = search;
    data.adds = $('input[name^="add"]:checked').serialize();
    dataJSON = $.toJSON(data);
    $.ajax({
        data: dataJSON,
        dataType: 'json',
        type: 'POST',
        url: 'clSearcher.php',
        complete: function(data) {},
        success: function(jobs) {
            $(jobs).each(function(num, job) {
                row = '<p><a href="'+job.url+'">'+job.title+'</a></p>';
                $('div[data-locurl="'+locURL+'"]').append(row);
            });
        }
    });
}