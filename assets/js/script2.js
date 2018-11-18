$(document).ready(function(){
  function archivo(evt) {
  var files = evt.target.files; // FileList object
  // Obtenemos el video del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
    //Solo admitimos video.
    if (!f.type.match('video.*')) {
      continue;
    }
    var reader = new FileReader();
    reader.onload = (function(theFile) {
      return function(e) {
  // Insertamos la imagen
  document.getElementById("list").innerHTML = ['<video class="embed-responsive embed-responsive-16by9" src="', e.target.result,'" title="', escape(theFile.name), '"/>'].join('');
  console.log('dentro0');
};
})(f);
reader.readAsDataURL(f);
}
}

document.getElementById('customFile').addEventListener('change', archivo, false)

});