function postComment(button, postedBy, videoId, replyTo, containerClass) {
  var textarea = $(button).siblings("textarea");
  var commentText = textarea.val();
  textarea.val("");

  if (commentText) {
    // AJAX call
    $.post("ajax/postComment.php", {
        commentText: commentText,
        postedBy: postedBy,
        videoId: videoId,
        responseTo: replyTo
      })
      .done(function (comment) {

        $("." + containerClass).prepend(comment);

      });
  } else {
    alert("You can't post an empty comment");
  }
}