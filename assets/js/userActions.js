function subscribe(userTo, userFrom, button) {
  if(userTo == userFrom) {
    alert("You cannot subscribe to yourself");
    return;
  }

  // AJAX call (POST)
  $.post("ajax/subscribe.php", { userTo: userTo, userFrom: userFrom })
  .done(function (data) {
    if(data != null) {
      $(button).toggleClass("subscribe unsubscribe");
      var buttonText = $(button).hasClass("subscribe") ? "SUBSCRIBE" : "SUBSCRIBED";
      $(button).text(buttonText + " " + data);
    } else {
      alert("Something went wrong");
    }
  });

}