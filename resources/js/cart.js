document.addEventListener("DOMContentLoaded", function () {
    function loadCart() {
        return JSON.parse(localStorage.getItem("cart") || "[]");
    }

    function saveCart(cart) {
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    function renderCartUI() {
        const cart = loadCart();
        document.querySelectorAll(".cart-control").forEach((control) => {
            const id = control.dataset.id;
            const item = cart.find((i) => i.id == id);

            const addBtn = control.querySelector(".add-to-cart");
            const qtyBox = control.querySelector(".quantity-control");
            const qtyText = control.querySelector(".quantity");

            if (item) {
                addBtn.classList.add("hidden");
                qtyBox.classList.remove("hidden");
                qtyText.textContent = item.quantity;
            } else {
                addBtn.classList.remove("hidden");
                qtyBox.classList.add("hidden");
            }
        });
    }

    function addToCart(product) {
        const cart = loadCart();
        const existing = cart.find((i) => i.id === product.id);
        if (existing) {
            existing.quantity++;
        } else {
            cart.push({
                ...product,
                quantity: 1,
            });
        }
        saveCart(cart);
        renderCartUI();
    }

    function changeQuantity(id, delta) {
        let cart = loadCart();
        const item = cart.find((i) => i.id == id);
        if (!item) return;

        item.quantity += delta;
        if (item.quantity <= 0) {
            cart = cart.filter((i) => i.id != id); // remove
        }
        saveCart(cart);
        renderCartUI();
    }

    // Event Delegation
    document.body.addEventListener("click", function (e) {
        const btn = e.target;

        if (btn.classList.contains("add-to-cart")) {
            const id = parseInt(btn.dataset.id);

            addToCart({
                id,
            });
        }

        if (btn.classList.contains("increase")) {
            const id = parseInt(btn.closest(".cart-control").dataset.id);
            changeQuantity(id, 1);
        }

        if (btn.classList.contains("decrease")) {
            const id = parseInt(btn.closest(".cart-control").dataset.id);
            changeQuantity(id, -1);
        }
    });

    // Initial render
    renderCartUI();
});
