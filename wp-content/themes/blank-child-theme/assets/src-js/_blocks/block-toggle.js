// toggle block
// https://www.hassellinclusion.com/blog/accessible-toggle-pattern/


jQuery(document).ready(function($) {
 
    // Code for toggles
    $hdr = '.toggle-block__header'; // set heading level to look out for
    $acc_id = 1; // global id counter
 
    /* The setup function that runs when the page has loaded */
 
    // Firstly, look for all headers of the right level within an toggle container
    $('.toggle-container').find($hdr).each(function(){
       
       // Store current ID value
       $this_id = $acc_id;
       // Get the current contents of the header
       $this_text = $(this).text(); 
       
       // empty the header
       $(this).empty(); 
       
       // Construct the button string with the attributes we need
       $this_button = '<button class="toggle-togglee" data-id="' + $this_id + '" id="toggle-button-' + $this_id + '" '
          + ' aria-controls="toggle-panel-'+ $this_id +'" aria-expanded="false">'
          + $this_text + '</button>';
 
 
       // Add the button string into the heading
       $(this).append($this_button);
 
       // Get the set of elements between this header and the next header, or the end of 
       // the toggle container
       var $set = $(this).nextUntil($hdr);
 
       // Set up the panel string
       $this_panel = '<div class="toggle-panel hidden" id="toggle-panel-' + $this_id + 
          '" aria-labelledby="toggle-button-' + $this_id + '"></div>';
 
       // Wrap everything in a <div> with the necessary elements included.
       // This will be the toggle panel that is hidden by default and shown on demand.
       $set.wrapAll($this_panel);
 
       // Now increment the $acc_id value ready for the next one
       $acc_id++;
    });
 
    // Now set up the event listeners
    // Look for all buttons that are inside a correct level heading inside the toggle container
    $('.toggle-container').find($hdr).find('button').on('click', function(e) {
       var $thisId = $( this ).attr('data-id');
       if ($(this).attr( 'aria-expanded' ) == 'true') {
          hidetoggle($( this ));
          $( this ).focus();
       } else {
          showtoggle($( this ));
       }
    });
    
    function showtoggle(obj) {
       // Being passed a button
       var $thisId = $( obj ).attr('data-id');
       var $panel = $('#toggle-panel-'+$thisId);
 
       $($panel).removeClass('hidden');
       $(obj).attr('aria-expanded','true');
       $(obj).focus();
    }
    function hidetoggle(obj) {
       // Being passed a button
       var $thisId = $( obj ).attr('data-id');
       var $panel = $('#toggle-panel-'+$thisId);
 
       $($panel).addClass('hidden');
       $(obj).attr('aria-expanded','false');
       $(obj).focus();
    }
 
 
    
 });
 
 
 