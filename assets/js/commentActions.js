function postComment(button, postedBy, videoId, replyTo, containerClass) {
  var textarea = $(button).siblings("textarea");
  var commentText = textarea.val();
  // Clear comment box
  textarea.val("");

  if (commentText) {
    // AJAX call
    $.post("ajax/postComment.php", {
        commentText: commentText,
        postedBy: postedBy,
        videoId: videoId,
        responseTo: replyTo
      })
      .done(function (data) {
        alert(data);
      });
  } else {
    alert("You can't post an empty comment");
  }
}