document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleSidebarMobile");
    const sidebar = document.getElementById("sidebar");
    const iconOpen = document.getElementById("toggleSidebarMobileHamburger");
    const iconClose = document.getElementById("toggleSidebarMobileClose");

    if (toggleButton && sidebar && iconOpen && iconClose) {
        toggleButton.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");

            iconOpen.classList.toggle("hidden");
            iconClose.classList.toggle("hidden");
        });
    }
});
