// Skip links mobile fix
/*
 * May not be necessary in the future depending
 * on browser support.
 * https://axesslab.com/skip-links/
 *
 * Author: Paul J. Adam
 * Link: http://www.pauljadam.com/
 */



$('.genesis-skip-link a').click(function(e) {
  e.preventDefault();
  $(':header:first').attr('tabindex', '-1').focus();
});
