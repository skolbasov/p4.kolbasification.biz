var events =[];
   
function Event(eventName,eventDate,eventStartTime,eventEndTime,eventDescription,eventUrgency,eventImportance)
{
this.eventName=eventName;
this.eventDate=eventDate;
this.eventStartTime=eventStartTime;
this.eventEndTime=eventEndTime;
this.eventDescription=eventDescription;
this.eventUrgency=eventUrgency;
this.eventImportance=eventImportance;

this.makeDiv=makeDiv;

function makeDiv()
{
return "<div class='"+this.eventUrgency+this.eventImportance+"'>Event date: "+this.eventDate+"<br> Event time "+this.eventStartTime+"-"+this.eventEndTime+"<br> Event name: "+this.eventName+"<br>"+this.eventDescription+"</div>";
}

}

function sort(ev)
{
	for (y in ev)
	{
	for (x=0;x<ev.length-1;x++)
	{
		if (ev[x].eventDate>ev[x+1].eventDate)
		{
			var temp=ev[x];
			ev[x]=ev[x+1];
			ev[x+1]=temp;
		} 
		else 
		{
		if (ev[x].eventDate==ev[x+1].eventDate)
		{
			if (ev[x].eventStartTime>ev[x+1].eventStartTime)
			{
			var temp=ev[x];
			ev[x]=ev[x+1];
			ev[x+1]=temp;
			}
		}
		}
	}	
	}
	return ev;
}



$('#urgent').click(function(){
	$('.canBeHidden').css('visibility','visible');
		$('#hintDiv').html("Urgent: First importance tasks. You have to <strong>do</strong> them now.");

})

$('#notUrgent').click(function(){
	$('.canBeHidden').css('visibility','hidden');
		$('#hintDiv').html("Not urgent: Tasks to be delegated. Not added-value tasks.");

})


$('#important').focusin(function()
{
	$('#hintDiv').html("Tasks you must <b>plan</b> or they`ll become urgent.");
});

$('#notImportant').focusin(function()
{
	$('#hintDiv').html("Tasks <b>to be eliminated</b> or they`ll become urgent.");
});

$("input:radio").focusout(function()
{
	$('#hintDiv').html("");
});


$("#eventDate").focusout(function()
{
	var ed=new Date($("#eventDate").val());
	console.log(ed);
	if (ed<(new Date())) {$("#errorDiv").html("Only future plans are supported") }else $("#errorDiv").html("");
});

$("#eventEndTime").focusout(function()
{

	if ($("#eventEndTime").val()<$("#eventStartTime").val()) {$("#errorDiv").html("End time should be after start time") }else $("#errorDiv").html("");
});

$('#submitButton').click(function()
{

if (($("#eventName").val()=="")||($("#eventDate").val()=="")||($("#eventStartTime").val()=="")||($("#eventEndTime").val()=="")||($("#eventDescription").val()=="")||($('input:radio[name=urgencySelector]:checked').val()=="")||($('input:radio[name=importanceSelector]:checked').val()=="")||($('input:radio[name=urgencySelector]:checked').val()==undefined)||($('input:radio[name=importanceSelector]:checked').val()==undefined))
{
	$("#errorDiv").html("some fields are empty");
	
} 
else
{
var event=new Event($("#eventName").val(),$("#eventDate").val(),$("#eventStartTime").val(),$("#eventEndTime").val(),$("#eventDescription").val(),$('input:radio[name=urgencySelector]:checked').val(),$('input:radio[name=importanceSelector]:checked').val());
events.push(event);
$('#daySchedule').html('');
sort(events);

$('#urgentimportant').html('');
$('#urgentnotImportant').html('');
$('#notUrgentimportant').html('');
$('#notUrgentnotImportant').html('');
for (x in events)
{
	$('#daySchedule').append("<div id='event"+x+"' class='line "+events[x].eventUrgency+events[x].eventImportance+"'>Event date: "+events[x].eventDate+"<br> Event time "+events[x].eventStartTime+"-"+events[x].eventEndTime+"<br> Event name: "+events[x].eventName+"<br>"+events[x].eventDescription+"</div>");

	if (events[x].eventUrgency=="urgent") 
	{
		if (events[x].eventImportance=="important")
		{
		$('#urgentimportant').append(events[x].makeDiv());
		} 
	else $('#urgentnotImportant').append(events[x].makeDiv());
	} 
	else 
	{
		if (events[x].eventImportance=="important")
		{
		$('#notUrgentimportant').append(events[x].makeDiv());
		}
		 else $('#notUrgentnotImportant').append(events[x].makeDiv());
	}
}
$('#errorDiv').html('');	
}
});

$('#printSchedule').click(function()
{

    var daySchedule_clone = $('#daySchedule').clone();
    var canvas = daySchedule_clone.prop('outerHTML'); 
    var new_tab_contents  = '<html>';
    new_tab_contents += '<head>';
    new_tab_contents += '<link rel="stylesheet" href="css/print.css" type="text/css">';
    new_tab_contents += '</head>';
    new_tab_contents += '<body>'; 
    new_tab_contents += canvas;
    new_tab_contents += '</body></html>';
    var new_tab =  window.open();
	new_tab.document.open();
    new_tab.document.write(new_tab_contents);
    new_tab.document.close();
    		
});
$('#printQuadrant').click(function()
{

    var quadrant_clone = $('#eisenhowerQuadrant').clone();
    var canvas = quadrant_clone.prop('outerHTML'); 
    var new_tab_contents  = '<html>';
    new_tab_contents += '<head>';
    new_tab_contents += '<link rel="stylesheet" href="css/print.css" type="text/css">';
    new_tab_contents += '</head>';
    new_tab_contents += '<body>'; 
    new_tab_contents += canvas;
    new_tab_contents += '</body></html>';
    var new_tab =  window.open();
    new_tab.document.open();
    new_tab.document.write(new_tab_contents);
    new_tab.document.close();
    		
});





