/*
Template Name: Eatsie - Pick Up & Delivery Food Template
Author: Askbootstrap
Author URI: https://themeforest.net/user/askbootstrap
Version: 0.1
*/

/*
- Add Cart
- Tooltip
*/

(function($) {
  "use strict"; // Start of use strict

  // Add Cart
  $('.minus').click(function() {
      var $input = $(this).parent().find('.box');
      var count = parseInt($input.val()) - 1;
      count = count < 1 ? 1 : count;
      $input.val(count);
      $input.change();
      return false;
  });
  $('.plus').click(function() {
      var $input = $(this).parent().find('.box');
      $input.val(parseInt($input.val()) + 1);
      $input.change();
      return false;
  });

  // Tooltip
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
  const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

})(jQuery); // End of use strict