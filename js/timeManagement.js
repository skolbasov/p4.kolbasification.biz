function Event(name,startTime,endTime,description,urgency,importance)
{
this.name=name;
this.startTime=startTime;
this.endTime=endTime;
this.description=description;
this.urgency=urgency;
this.importance=importance;

this.makeDiv=makeDiv;

function makeDiv()
{
return "<div class='"+this.urgency+this.importance+"'><br> Event time "+this.startTime+"-"+this.endTime+"<br> Event name: "+this.name+"<br>"+this.description+"</div>";
}
}


function sort(ev)
{
	for (y in ev)
	{
	for (x=0;x<ev.length-1;x++)
	{
		if (ev[x].startTime>ev[x+1].startTime)
		{
			var temp=ev[x];
			ev[x]=ev[x+1];
			ev[x+1]=temp;
		} 
		else 
		{
		if (ev[x].startTime==ev[x+1].startTime)
		{
			if ((ev[x+1].urgency=="1")&&(ev[x].urgency!="1"))
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
};


$('#urgent').click(function(){
	$('.canBeHidden').css('visibility','visible');
		$('#hintDiv').html("Urgent: First importance tasks. You have to <strong>do</strong> them now.");

});


$('#notUrgent').click(function(){
	
  //$('.canBeHidden').css('visibility','hidden');
		$('#hintDiv').html("Not urgent: Tasks to be delegated. Not added-value tasks.");

});


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


$("#eventEndTime").focusout(function()
{
	console.log($("#eventEndTime").val());
	if ($("#eventEndTime").val()<$("#eventStartTime").val()) {$("#errorDiv").html("End time should be after start time") }else $("#errorDiv").html("");
});


$("#eventStartTime").focusout(function(){

	var ed=new Date($("#eventStartTime").val());
	if (ed<(new Date())) {$("#errorDiv").html("Only future plans are supported") }else $("#errorDiv").html("");
});


$('#submitButton').click(function()
{
  if (($("#eventName").val()=="")||($("#eventStartTime").val()=="")||($("#eventEndTime").val()=="")||($("#eventDescription").val()=="")||($('input:radio[name=urgencySelector]:checked').val()=="")||($('input:radio[name=importanceSelector]:checked').val()=="")||($('input:radio[name=urgencySelector]:checked').val()==undefined)||($('input:radio[name=importanceSelector]:checked').val()==undefined))
  {
	$("#errorDiv").html("some fields are empty");
	
  } 
  else
  { 
  var event=new Event($("#eventName").val(),$("#eventStartTime").val(),$("#eventEndTime").val(),$("#eventDescription").val(),$('input:radio[name=urgencySelector]:checked').val(),$('input:radio[name=importanceSelector]:checked').val());
  $.ajax({
            type: 'POST',
            url: '/events/p_add',
            success: function(response) { 

              // Enject the results received from process.php into the results div
              $("#errorDiv").html(response);
            },
            data: { name: $('#eventName').val(),
            startTime:$('#eventStartTime').val(),
            endTime:$('#eventEndTime').val(),
            description:$('#eventDescription').val(),
            urgency:$('input:radio[name=urgencySelector]:checked').val(),
            importance:$('input:radio[name=importanceSelector]:checked').val(),
            },
          });
  }
});


function fillSchedules(eventsU){
  
  var events=[];
  console.log(eventsU);

  for (x in eventsU){
   var event=new Event(eventsU[x].name,eventsU[x].startTime,eventsU[x].endTime,eventsU[x].description,eventsU[x].urgency,eventsU[x].importance);
   console.log(event);
    events.push(event);
  }

  $('#daySchedule').html('');
  sort(events);

  $('#urgentimportant').html('');
  $('#urgentunimportant').html('');
  $('#notUrgentimportant').html('');
  $('#notUrgentunimportant').html('');
  for (x in events)
    {
	$('#daySchedule').append("<div id='event"+x+"' class='line ui"+events[x].urgency+events[x].importance+"'><br> Event time "+events[x].startTime+"-"+events[x].endTime+"<br> Event name: "+events[x].name+"<br>"+events[x].description+"</div>");

	if (events[x].urgency=="1") 
	{
		if (events[x].importance=="1")
		{
		$('#urgentimportant').append(events[x].makeDiv());
		} 
	else $('#urgentunimportant').append(events[x].makeDiv());
	} 
	else 
	{
		if (events[x].importance=="1")
		{
		$('#notUrgentimportant').append(events[x].makeDiv());
		}
		 else $('#notUrgentunimportant').append(events[x].makeDiv());
	}
    }
  $('#errorDiv').html('');	
};


$('#printSchedule').click(function()
{

    var daySchedule_clone = $('#daySchedule').clone();
    var canvas = daySchedule_clone.prop('outerHTML'); 
    var new_tab_contents  = '<html>';
    new_tab_contents += '<head>';
    new_tab_contents += '<link rel="stylesheet" href="/css/print.css" type="text/css">';
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
    new_tab_contents += '<link rel="stylesheet" href="/css/print.css" type="text/css">';
    new_tab_contents += '</head>';
    new_tab_contents += '<body>'; 
    new_tab_contents += canvas;
    new_tab_contents += '</body></html>';
    var new_tab =  window.open();
    new_tab.document.open();
    new_tab.document.write(new_tab_contents);
    new_tab.document.close();
    		
});


  $('#googleSync').click(function()
{
      apiCall();
});



