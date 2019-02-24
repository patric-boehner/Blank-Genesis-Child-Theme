// Manipulate aria state on click for expanded state

jQuery(document).ready(function($){

  $("#top-banner-close").on("click", function(e) {
    var state = $("#top-banner-close").attr("aria-expanded");
    $("#top-banner-close").attr("aria-expanded", state === "false" ? "true" : "false");
  });

});
