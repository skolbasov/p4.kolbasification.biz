My final project is a future development of the time-management tool, which I created for the p3. The time-management tool is based on the Eisenhower`s time-management method (http://en.wikipedia.org/wiki/Time_management#The_Eisenhower_Method). All events, which are entered by the user are stored in the local database and are mapped to the user. Moreover, there is a possibility to sync events with the google calendar.

Features:
	additional print pages;
	pull google calendar events;
	User authentication;
	Account confirmation email`s;

JavaScript is used for frontend logic (event listeners, input verification, schedule creation and so on). Moreover JS Google API is used.

Please use your own testing google account to try the pull the events, or add events manually via "add an event" menu point.
You can specify different events in your google calendar, add the colors to them(red, green, blue and orange are supported).

Colors matrix:
 red - not urgent, unimportant event;
 green- urgent and important event;
 blue - urgent, unimportant event;
 orange - not urgent, but important event.


Restrictions:
Only future events are supported for sync.
Only primary calendar is supported.
