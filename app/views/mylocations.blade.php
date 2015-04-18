<!doctype html>

<html>

@include('includes.head')

<script>
//global arays
var fetchedList = []; 
var sendToServer = [];

var printArray = function(fetchedList){
	for (var i = 0; i < fetchedList.length; i++) {
		$('#city-container').append('<p id="' + fetchedList[i] + '" class="user-city">[X] ' + fetchedList[++i] + '</p>');
	}
};

$(function() {
	$.getJSON(
		"/fetch-cities", 
		function(data){
			$.each(data, function(index, value){
				//put id on even indices and name on odd indices
				fetchedList.push(index);
				fetchedList.push(value);
				sendToServer.push(index);
		});
		printArray(fetchedList);
	});
});

$(document).on('click', '.user-city', function(){
	var deleteMe = $(this).attr('id');

	if ($.inArray(deleteMe, sendToServer != -1)){
		sendToServer = jQuery.grep(sendToServer, function(value){
			return value != deleteMe;
		});
	}
	//and always hide it
	$(this).remove();
});

$(document).on('click', '#saveAll', function(){
	$.ajax({
		url: "/save-cities",
		type: "POST",
		data: { allTheData: sendToServer },
		success: function(){
			alert('all done');
		}
	});
})


</script>

<script>
	$(function() {
	function split( val ) {
	  return val.split( /,\s*/ );
	}
	function extractLast( term ) {
	  return split( term ).pop();
	}

	$( "#cities" )
	  // don't navigate away from the field on tab when selecting an item
	  .bind( "keydown", function( event ) {
	    if ( event.keyCode === $.ui.keyCode.TAB &&
	        $( this ).autocomplete( "instance" ).menu.active ) {
	      event.preventDefault();
	    }
	  })
	  .autocomplete({
	    source: function( request, response ) {
	  	$.ajax({
            url: "/select-city",
            dataType: "json",
            data: {term: request.term},
            success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.name,
                            id: item.id
                       };
                }));
            }
        });
	    },
	    search: function() {
	      // custom minLength
	      var term = extractLast( this.value );
	      if ( term.length < 2 ) {
	        return false;
	      }
	    },
	    focus: function() {
	      // prevent value inserted on focus
	      return false;
	    },
	    select: function( event, ui ) {
	      var terms = split( this.value );
	      // remove the current input from the dropdown
	      terms.pop();
	      // add the selected item to sendToServer
	      if ( $.inArray(ui.item.id, sendToServer) == -1) {
	      	sendToServer.push(ui.item.id);
	      	$('#city-container').append('<p id="' + ui.item.id + '" class="user-city">[X] ' + ui.item.value + '</p>');
	      } else {
	      	alert('You are already getting updates for this city.');
	      }
	      $('#cities').val('');

	      return false;
	    }
	  });
	});
</script>

<body>
 
<div class="ui-widget">
  <label for="cities">Cities: </label>
  <input id="cities" size="50">
</div>

<div id="city-container">
	<h2>Your city list</h2>
	<a id="saveAll" href="#">Save my changes</a>

</div>
</body>

</html>
