$(document).ready(function() {
  $(".qty-plus").click(function() {
    counter++;
    $(this)
      .closest(".quantity")
      .find("#quantity")
      .val(counter);
  });

  $(".invite .close-icon, .startup-entry button").click(function() {
    $(".modal-backdrop, .modal")
      .removeClass("show")
      .hide();
  });

  $(".mini-messaging .list-item a").click(function(event) {
    event.preventDefault();
    $(".mini-messaging .chat-wrap").show();
    $(".mini-messaging .chat-list-wrap").hide();
  });

  $(".item-action.back-to").click(function(event) {
    event.preventDefault();
    $(".mini-messaging .chat-wrap").hide();
    $(".mini-messaging .chat-list-wrap").show();
  });
});
