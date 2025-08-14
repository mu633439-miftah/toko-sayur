document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".nav-link");

    links.forEach((link) => {
        link.addEventListener("click", function () {
            links.forEach((l) => {
                l.classList.remove(
                    "text-white",
                    "bg-primary",
                    "md:bg-transparent",
                    "md:text-primary"
                );
                l.classList.add(
                    "text-gray-900",
                    "hover:bg-gray-100",
                    "md:hover:bg-transparent",
                    "md:hover:text-primary"
                );
            });

            this.classList.remove(
                "text-gray-900",
                "hover:bg-gray-100",
                "md:hover:bg-transparent",
                "md:hover:text-primary"
            );
            this.classList.add(
                "text-white",
                "bg-primary",
                "md:bg-transparent",
                "md:text-primary"
            );
        });
    });
});
