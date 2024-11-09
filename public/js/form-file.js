$(document).ready(function(){
    $('#dropzone-file').change(function(e){
        var fileName = e.target.files[0].name;
          $("#inst").hide();$("#type").hide();
          $("#file-area").append("<p id='file-name' class='text-sm text-gray-500 font-semibold'>",fileName,"</p>");
        alert('The file "' + fileName +  '" has been selected.');
    });
});