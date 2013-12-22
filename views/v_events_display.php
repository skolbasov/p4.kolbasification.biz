<div id="wrapper" class="wrapper">
  <div id="inputForm" class="column">
    <label for='eventName'>Enter the event name</label>
    <input type="text" class="text-field"  id="eventName" maxlength="240" >
    
    <div id="urgencyImportanceSelector">Choose the event parameters:
    <br><input type="radio" name="urgencySelector" class="text-field" value="1" id="urgent">Urgent
    <input type="radio" name="urgencySelector" class="text-field" value="0" id="notUrgent">Not urgent
    </div>
    <br><input type="radio" name="importanceSelector" class="text-field" value="1" id="important">Important
    <input type="radio" name="importanceSelector" class="text-field" value="0" id="unimportant">Unimportant
    
    <br><label for='eventStartTime' class='canBeHidden'>Enter the event start time</label>
    <input type="datetime-local" class="text-field canBeHidden" id="eventStartTime" >
        
    <br><label for='eventEndTime' class='canBeHidden'>Enter the event end time</label>
    <input type="datetime-local" class="text-field canBeHidden" id="eventEndTime" >
          
    <br><label for='eventDescription'>Enter the event description:</label><br>
    <textarea class="text-field" id="eventDescription"></textarea>

    <br><button id="submitButton" class="btn">Add to the tasks list</button>
    <br><button id="pushButton" class="btn">Push to my calendar</button>
     <button id="authorize-button" style="visibility: hidden">Authorize</button>
    <div id="errorDiv"></div>
    <div id="hintDiv"></div>
  </div>
</div>
