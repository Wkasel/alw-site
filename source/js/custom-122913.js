$(function () {
  // after video finishes, we're going to direct them to the product itself.
  if ($("#multiplex_video").length != 0) {
    videojs("multiplex_video").one('ended', function(){window.location=document.location.origin+"/content/featured/28";})
  } 
});

