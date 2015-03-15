jQuery(document).ready(function($) {

  // get the action filter option item on page load
  var $filterType = $('#member-sort li.active a').attr('class');

  // get and assign the ourHolder element to the
    // $holder varible for use later
  var $holder = $('#member-group .sort-container');

  // clone all items within the pre-assigned $holder element
  var $data = $holder.clone();

  // attempt to call Quicksand when a filter option
    // item is clicked
    $('#member-sort li a').click(function(e) {
        // reset the active class on all the buttons
        $('#member-sort li').removeClass('active');

        // assign the class of the clicked filter option
        // element to our $filterType variable
        var $filterType = $(this).attr('class');
        $(this).parent().addClass('active');

        if ($filterType == 'all') {
            // assign all li items to the $filteredData var when
            // the 'All' filter option is clicked
            var $filteredData = $data.find('.item');
        }
        else {
            // find all li elements that have our required $filterType
            // values for the data-type element
            var $filteredData = $data.find('.item[data-type~=' + $filterType + ']');
        }

        // call quicksand and assign transition parameters
        $holder.quicksand($filteredData, {
            easing: 'easeInOutExpo',
            duration: 500
        });
        return false;
    });
});

jQuery(document).ready(function($){ 
  // fade in divs
  var fadein = $('#member-group');
  $.each(fadein, function(i, item) {
       setTimeout(function() {
            $(item).fadeIn(1000); // duration of fadein
       }, 1000 * i); // duration between fadeins
  });
});