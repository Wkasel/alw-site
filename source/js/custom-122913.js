$(function () {
  // after video finishes, we're going to direct them to the product itself.
  
  videojs("multiplex_video").one('ended', function(){window.location="/content/featured/28";})
});

videojs("multiplex_video").one('ended', function(){window.location="/content/featured/28";})