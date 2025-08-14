const container = document.getElementById("tab-container");
const buttons = document.querySelectorAll(".tab-button");
const searchInput = document.getElementById("product-search");
const productCards = document.querySelectorAll(".product-card");

// if (!container || !buttons || !searchInput || !productCards) return;
if (container && buttons.length > 0 && searchInput && productCards.length > 0) {
    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const index = parseInt(button.dataset.index);
            const width = container.clientWidth;
            container.scrollTo({
                left: index * width,
                behavior: "smooth",
            });

            // Optional: update active style
            buttons.forEach((btn) => btn.classList.remove("text-green-600"));
            button.classList.add("text-green-600");
        });
    });

    searchInput.addEventListener("input", function () {
        const query = this.value.toLowerCase();

        productCards.forEach((card) => {
            const name = card.dataset.name;
            card.style.display = name.includes(query) ? "block" : "none";
        });
    });
}
