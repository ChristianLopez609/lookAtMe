$(document).ready(function () {

  function archivo(e) {
    var files = e.target.files; // FileList object
    // Obtenemos el video del campo "file".
    for (var i = 0, f; f = files[i]; i++) {
      //Solo admitimos video.
      if (!f.type.match('video.mp4')) {
        continue;
        return false;
      }
      var filesise = this.files[0].size;
      if (filesise > 5000000) {
        $('#divvideo').after('<span id="errorvideo" class="alert alert-danger" role="alert">El archivo no debe superar los 5MB</span>');
        $('#customFile').focus(function () {
          $('#errorvideo').remove();
        });
        this.value = '';
        return false;
      }
      var reader = new FileReader();
      reader.onload = (function (theFile) {
        return function (e) {
          // Insertamos la imagen
          document.getElementById("list").innerHTML = ['<video class="embed-responsive embed-responsive-16by9" src="', e.target.result, '"title="', escape(theFile.name), '"/>'].join('');
          console.log('dentro');
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('customFile').addEventListener('change', archivo, false)

});
