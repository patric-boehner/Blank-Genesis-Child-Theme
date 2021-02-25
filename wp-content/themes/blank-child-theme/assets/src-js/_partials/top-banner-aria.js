// Manipulate aria state on click for expanded state

jQuery(document).ready(function($){

  $("#banner__close").on("click", function(e) {
    var state = $("#banner__close").attr("aria-expanded");
    $("#banner__close").attr("aria-expanded", state === "false" ? "true" : "false");
  });

});
