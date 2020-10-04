// Manipulate aria state on click for expanded state

jQuery(document).ready(function($){

  $("#top-banner__close").on("click", function(e) {
    var state = $("#top-banner__close").attr("aria-expanded");
    $("#top-banner__close").attr("aria-expanded", state === "false" ? "true" : "false");
  });

});
