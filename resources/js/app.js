import Dropzone from "dropzone";

Dropzone.autoDiscover = false;
console.log("hola que pedo");

const dropzone = new Dropzone("#dropzone", {
   dictDefaultMessage: "Sube tu imagen aquí",
   acceptedFiles: ".jpg,.png,.jpeg,.gif,.bmp",
   addRemoveLinks: true,
   dictRemoveFile: "Borrar archivo",
   maxFiles: 1,
   uploadMultiple: false,

});

dropzone.on('sending', function(file, xhr, formData) {
   console.log(formData);
});

dropzone.on('success', function(file, response) {  
   console.log(response);
});

dropzone.on('error', function(file, response) {    
   console.log(response);
});

dropzone.on('removedfile', function(file) {
   console.log('file removed');
});
