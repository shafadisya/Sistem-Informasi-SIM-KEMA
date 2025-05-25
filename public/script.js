document
    .getElementById("showFormButton")
    .addEventListener("click", function () {
        const form = document.getElementById("formTambahKegiatan");
        form.style.display = form.style.display === "none" ? "block" : "none";
    });
