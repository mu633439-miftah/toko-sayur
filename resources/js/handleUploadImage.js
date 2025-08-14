document.addEventListener("DOMContentLoaded", () => {
    document
        .querySelectorAll(".image-upload-component")
        .forEach((component) => {
            const inputFile = component.querySelector(".image-input");
            const imagePreview = component.querySelector(".image-preview");
            const imageUrl = component.querySelector(".image-url");

            if (!inputFile || !imagePreview || !imageUrl) return;

            inputFile.addEventListener("change", async function () {
                console.log("test klikk");

                const file = this.files[0];
                if (!file) return;

                // Preview gambar
                const reader = new FileReader();
                reader.onload = function (e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);

                // Upload ke server
                const formData = new FormData();
                formData.append("image", file);

                try {
                    const res = await fetch("/api/upload", {
                        method: "POST",
                        body: formData,
                        headers: {
                            Accept: "application/json",
                        },
                    });

                    const data = await res.json();

                    if (!data.url) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: "Gagal upload gambar! Format harus .jpg, .png, .jpeg, .webp dan maksimal 2MB",
                        });
                        return;
                    }

                    imagePreview.src = data.url;
                    imageUrl.value = data.url;
                } catch (error) {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal",
                        text: "Terjadi kesalahan saat mengupload gambar.",
                    });
                }
            });
        });
});
