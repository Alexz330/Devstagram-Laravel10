import Dropzone from "dropzone";

Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
   dictDefaultMessage: "Sube tu imagen aquí",
   acceptedFiles: ".jpg,.png,.jpeg,.gif,.bmp",
   addRemoveLinks: true,
   dictRemoveFile: "Borrar archivo",
   maxFiles: 1,
   uploadMultiple: false,

});