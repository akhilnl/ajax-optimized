<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
////https://learn.jquery.com/ajax
$(document).ready(function(){
	// Using the core $.ajax() method
	$.ajax({
	 
		// The URL for the request
		url: "post.php",
	 
		// The data to send (will be converted to a query string)
		data: {
			id: 123
		},
	 
		// Whether this is a POST or GET request
		type: "GET",
	 
		// The type of data we expect back
		dataType : "json",
	 
		// Code to run if the request succeeds;
		// the response is passed to the function
		success: function( json ) {
			$( "<h1>" ).text( json.title ).appendTo( "body" );
			$( "<div class=\"content\">").html( json.html ).appendTo( "body" );
		},
	 
		// Code to run if the request fails; the raw request and
		// status codes are passed to the function
		error: function( xhr, status, errorThrown ) {
			alert( "Sorry, there was a problem!" );
			console.log( "Error: " + errorThrown );
			console.log( "Status: " + status );
			console.dir( xhr );
		},
		// A pre-request callback function that can be used to modify the jqXHR 
		beforeSend: function (xhr){
			
				//loader
				alert('start sending')
		},
	 
		// Code to run regardless of success or failure
		complete: function( xhr, status ) {
			
			//remove loader
			alert( "The request is complete!" );
		}
	});
	
	
	$.get( "/users.php", {
		userId: 1234
	}, function( resp ) {
		console.log( resp ); // server response
	});
	 
	// Add a script to the page, then run a function defined in it
	$.getScript( "/static/js/myScript.js", function() {
		functionFromMyScript();
	});
	 
	// Get JSON-formatted data from the server
	$.getJSON( "/details.php", function( resp ) {
	 
		// Log each key in the response data
		$.each( resp, function( key, value ) {
			console.log( key + " : " + value );
		});
	});
	
	// Using .load() to populate an element based on a selector
	$( "#newContent" ).load( "/foo.html #myDiv h1:first", function( html ) {
		alert( "Content updated!" );
	});
	
	//Save some data to the server and notify the user once it's complete.

	$.ajax({
	  method: "POST",
	  url: "some.php",
	  data: { name: "John", location: "Boston" }
	})
	  .done(function( msg ) {
		alert( "Data Saved: " + msg );
	  });
   //Retrieve the latest version of an HTML page.

	$.ajax({
	  url: "test.html",
	  cache: false
	})
	  .done(function( html ) {
		$( "#results" ).append( html );
	  });
	
	xmlRequest.done( handleResponse );
	//Send an id as data to the server, save some data to the server, and notify the user once it's complete. If the request fails, alert the user.

	var menuId = $( "ul.nav" ).first().attr( "id" );
	var request = $.ajax({
	  url: "script.php",
	  method: "POST",
	  data: { id : menuId },
	  dataType: "html"
	});
	 
	request.done(function( msg ) {
	  $( "#log" ).html( msg );
	});
	 
	request.fail(function( jqXHR, textStatus ) {
	  alert( "Request failed: " + textStatus );
	});
	//Load and execute a JavaScript file.
	
	$.ajax({
	  method: "GET",
	  url: "test.js",
	  dataType: "script"
	});
	
	// Turning form data into a query string
	$( "#myForm" ).serialize();
	 
	// Creates a query string like this:
	// field_1=something&field2=somethingElse
	
	// Creating an array of objects containing form data
	$( "#myForm" ).serializeArray();
	 
	// Creates a structure like this:
	// [
	//   {
	//     name : "field_1",
	//     value : "something"
	//   },
	//   {
	//     name : "field_2",
	//     value : "somethingElse"
	//   }
	// ]

	// Using validation to check for the presence of an input
	$( "#form" ).submit(function( event ) {
	 
		// If .required's value's length is zero
		if ( $( ".required" ).val().length === 0 ) {
	 
			// Usually show some kind of error message here
	 
			// Prevent the form from submitting
			event.preventDefault();
		} else {
	 
			// Run $.ajax() here
		}
	});
	
	
});
</script>