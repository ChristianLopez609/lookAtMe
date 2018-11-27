$(document).ready(function () {
  
  $(function () {
    $("#playlist div").on("click", function () {
      $("#videoarea").attr({
        "src": $(this).attr("movieurl"),
        "poster": "",
        "autoplay": "autoplay"
      })
    })
    $("#videoarea").attr({
      "src": $("#playlist div").eq(0).attr("movieurl"),
      "poster": $("#playlist div").eq(0).attr("moviesposter")
    })
  })


});