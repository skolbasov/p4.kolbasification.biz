<div class="form-group">
    <label for='eventName' class="control-label">Enter the event name</label>
    <input type="text" class="form-control"  id="eventName" maxlength="240" >
</div>
<div id="urgencyImportanceSelector" class="form-group">Choose the event parameters:
    <br>
    <label class="radio-inline">
    <input type="radio" name="urgencySelector" class="radio-inline" value="1" id="urgent">Urgent
    </label>
    <label class="radio-inline">
    <input type="radio" name="urgencySelector" class="radio-inline" value="0" id="notUrgent">Not urgent
    </label>
    <br>
    <label class="radio-inline">
    <input type="radio" name="importanceSelector" class="radio-inline"value="1" id="important">Important
    </label>
    <label class="radio-inline">
    <input type="radio" name="importanceSelector" class="radio-inline"value="0" id="unimportant">Unimportant
    </label>
</div>
<div class="form-group">
    <label for='eventStartTime' class='canBeHidden control-label'>Enter the event start time:</label>
    <input type="datetime-local" class="form-control canBeHidden" id="eventStartTime" >
</div>
<div class="form-group">   
    <label for='eventEndTime' class='canBeHidden control-label'>Enter the event end time:</label>
    <input type="datetime-local" class="form-control canBeHidden" id="eventEndTime" >
</div>
<div class="form-group">      
    <label for='eventDescription' class="control-label">Enter the event description:</label>
    <textarea class="form-control text-primary" id="eventDescription" rows="5"></textarea>
</div>
    <button id="submitButton" class="btn btn-primary">Add to the tasks list</button>

<div id="errorDiv"></div>
<div id="hintDiv"></div>