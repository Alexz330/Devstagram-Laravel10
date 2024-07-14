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

    init: function () {
      console.log(document.querySelector("[name=imagen]").value.trim());            

        if (document.querySelector("[name=imagen]").value.trim()) {
         const imagePublicada = {};
            imagePublicada.size = 1234;
            imagePublicada.name = document.querySelector("[name=imagen]").value;
            this.options.addedfile.call(this, imagePublicada);
            this.options.thumbnail.call(
                this,
                imagePublicada,
                `/uploads/${imagePublicada.name}`
            );
            imagePublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    document.querySelector("[name=imagen]").value = response.imagen;
});

dropzone.on("removedfile", function (file) {
   document.querySelector("[name=imagen]").value = "";
});
