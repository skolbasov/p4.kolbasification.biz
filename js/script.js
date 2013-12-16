var events =[];
   
function Event(eventName,eventStartTime,eventEndTime,eventDescription,eventUrgency,eventImportance)
{
this.eventName=eventName;
this.eventStartTime=eventStartTime;
this.eventEndTime=eventEndTime;
this.eventDescription=eventDescription;
this.eventUrgency=eventUrgency;
this.eventImportance=eventImportance;

this.makeDiv=makeDiv;

function makeDiv()
{
return "<div class='"+this.eventUrgency+this.eventImportance+"'><br> Event time "+this.eventStartTime+"-"+this.eventEndTime+"<br> Event name: "+this.eventName+"<br>"+this.eventDescription+"</div>";
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
	$('#hintDiv').html("Important: Tasks you must <b>plan</b> or they`ll become urgent.");
});

$('#unimportant').focusin(function()
{
	$('#hintDiv').html("Unimportant: Tasks <b>to be eliminated</b> or they`ll become urgent.");
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
	console.log($("#eventEndTime").val());
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
$('#urgentunimportant').html('');
$('#notUrgentimportant').html('');
$('#notUrgentunimportant').html('');
for (x in events)
{
	$('#daySchedule').append("<div id='event"+x+"' class='line "+events[x].eventUrgency+events[x].eventImportance+"'>Event date: "+events[x].eventDate+"<br> Event time "+events[x].eventStartTime+"-"+events[x].eventEndTime+"<br> Event name: "+events[x].eventName+"<br>"+events[x].eventDescription+"</div>");

	if (events[x].eventUrgency=="urgent") 
	{
		if (events[x].eventImportance=="important")
		{
		$('#urgentimportant').append(events[x].makeDiv());
		} 
	else $('#urgentunimportant').append(events[x].makeDiv());
	} 
	else 
	{
		if (events[x].eventImportance=="important")
		{
		$('#notUrgentimportant').append(events[x].makeDiv());
		}
		 else $('#notUrgentunimportant').append(events[x].makeDiv());
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

var clientId = '704443940021-nssh124np9slcmfpi64o4gicksceaqta.apps.googleusercontent.com';

      var apiKey = 'AIzaSyCgyw5Ror4wA8MB4qjqtbRqcJcPbZ5PuEg';

      var scopes = 'https://www.googleapis.com/auth/calendar';
      // Use a button to handle authentication the first time.
      function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth,1);
      }

      function checkAuth() {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: true}, handleAuthResult);
      }


      function handleAuthResult(authResult) {
        var authorizeButton = document.getElementById('authorize-button');
        if (authResult && !authResult.error) {
          authorizeButton.style.visibility = 'hidden';
          makeApiCall();
        } else {
          authorizeButton.style.visibility = '';
          authorizeButton.onclick = handleAuthClick;
        }
      }

      function handleAuthClick(event) {
        gapi.auth.authorize({client_id: clientId, scope: scopes, immediate: false}, handleAuthResult);
        return false;
      }

      // Load the API and make an API call.  Display the results on the screen.
      function makeApiCall() {

 /* gapi.client.load('calendar', 'v3', function() {
    var request = gapi.client.calendar.events.list({
      'calendarId': 'primary'
    });
          
    request.execute(function(resp) {
      for (var i = 0; i < resp.items.length; i++) {
        var li = document.createElement('li');
        li.appendChild(document.createTextNode(resp.items[i].summary));
        document.getElementById('events').appendChild(li);
      }
    });
  });
}*/
}
$('#pushButton').click(function(){


gapi.client.load('calendar', 'v3', function() {
console.log($("#eventDate").val());
console.log($("#eventStartTime").val());
    var resource = {
  "summary": $("#eventName").val(),
  "location": "Somewhere",
  "start": {
    "dateTime": $("#eventStartTime").val()+":00.000-07:00"
  },
  "end": {
    "dateTime": $("#eventEndTime").val()+":00.000-07:00"
  }
};


var request = gapi.client.calendar.events.insert({
  'calendarId': 'primary',
  'resource': resource
});
request.execute(function(resp) {
  console.log(resp);
});
})
  alert("Submit clicked");
      });



$.getScript( "https://apis.google.com/js/client.js?onload=handleClientLoad" )
  .done(function( script, textStatus ) {
    console.log( textStatus );
  })
  .fail(function( jqxhr, settings, exception ) {
    $( "div.log" ).text( "Triggered ajaxError handler." );
});




