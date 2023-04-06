const fileInput = document.getElementById("gamePhotoPath");
const imgPreview = document.getElementById("img-preview");

fileInput.addEventListener("change", function () {
    const file = this.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function () {
            imgPreview.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
    } else {
        imgPreview.setAttribute("src", "");
    }
});
