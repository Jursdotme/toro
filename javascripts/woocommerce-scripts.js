// apply your matchHeight on DOM ready (they will be automatically re-applied on load or resize)

// get test settings
var byRow = $('body').hasClass('test-rows');

// apply matchHeight to each item container's items
$('.products').each(function() {
    $(this).children('.product').matchHeight(byRow);
});




// SINGLE PRODUCT TABS

$('.description_tab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

$('.description_tab a:first').tab('show') // Select first tab


// TOGGLE SHIPPING CALCULATION

$( ".shipping-calculator-button" ).click(function() {
  $( ".shipping-calculator-form" ).slideToggle( "slow", function() {
    // Animation complete.
  });
});


// SINGLE IMAGE FANCYBOX

$(document).ready(function() {
    $(".zoom").fancybox({
      prevEffect : 'elastic',
      nextEffect : 'elastic',
      helpers    : {
        title    : {
          type   : 'inside'
        }
      }});
  });