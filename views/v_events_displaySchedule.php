<br>
<div id="scheduleWrapper" class="col-md-6">
  		<div id="daySchedule"></div>
  		<button id="printSchedule" class="btn btn-primary">Print the schedule</button>
</div>

<div id='eisenhowerWrapper' class="col-md-6">
  		<div id='eisenhowerQuadrant'>
  			<div id='urgentimportant' class="box ui11"></div>
  			<div id='urgentunimportant' class="box ui10"></div>
   			<div id='notUrgentimportant' class="box ui01"></div>
    		<div id='notUrgentunimportant' class="box ui00"></div>
  		</div>
		<button id="printQuadrant" class="btn btn-primary">Print the quadrant</button>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
	$.ajax({
            type: 'POST',
            url: '/events/p_getSchedule',
            success: function(response) { 

              // Enject the results received from process.php into the results div
            var eventsU=[];
            eventsU.push(JSON.parse(response));
            console.log(eventsU); 
            fillSchedules(eventsU[0]);

            },
            data: {},
        });
});

</script>