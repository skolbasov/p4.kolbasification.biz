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


      function handleAuthResult(authResult)
       {

        var authorizeButton = document.getElementById('authorize-button');
        if (authResult && !authResult.error) {
        authorizeButton.style.visibility = 'hidden';
        makeApiCall();
         } else 
          {
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
      
    });*/


}

    $.getScript( "https://apis.google.com/js/client.js?onload=handleClientLoad" )
      .done(function( script, textStatus )
      {
      console.log( "script load status: "+textStatus );
      })
      .fail(function( jqxhr, settings, exception ) 
      {

          $("div.log").text("Triggered ajaxError handler.");
       });

function apiCall(){
  
  gapi.client.load('calendar', 'v3', function() {
    var request = gapi.client.calendar.events.list({
      'calendarId': 'primary',
      'timeMin': new Date(),
      "orderBy": "updated"
    });
          
    request.execute(function(resp) {
      
      for (var i = 0; i < resp.items.length; i++) {
       /* var li = document.createElement('li');
        li.appendChild(document.createTextNode(resp.items[i].summary));
        document.getElementById('events').appendChild(li);*/
        console.log(resp.items[i]);
        var color=parseInt(resp.items[i].colorId);
        console.log(color);
        var importance=0;
        var urgency=0;
        if (color==11) {
              urgency=0;
              importance=0;
            }else if (color==10){
              urgency=1;
              importance=1;
              } else if(color==9){
              urgency=1;
              importance=0;
              } else if (color==5){
            
              urgency=0;
              importance=1;
              
            }

         $.ajax({
            type: 'POST',
            url: '/events/p_add',
            success: function(response) { 

              // Enject the results received from process.php into the results div
              $("#syncStat").html(response);
            },
            data: { name: resp.items[i].summary,
            startTime:resp.items[i].start.dateTime,
            endTime:resp.items[i].end.dateTime,
            description:resp.items[i].description,
            urgency:urgency,
            importance:importance,
            googleEventId:resp.items[i].id,
            },
          });

      }
    });
  });



}
