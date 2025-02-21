
document.getElementById("payButton").addEventListener("click", function () {
    var toast = new bootstrap.Toast(document.getElementById("paymentToast"));
    toast.show();
});


document.addEventListener("DOMContentLoaded", function () {
    updateCartView();
});

function addToCart(id, name, price) {
    fetch('/cart/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ id, name, price })
    })
        .then(response => response.json())
        .then(data => {
            updateCartView();
        });
}

function updateCart(action, id) {
    fetch('/cart/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ action, id })
    })
        .then(response => response.json())
        .then(data => {
            updateCartView();
        });
}

function removeFromCart(id) {
    fetch('/cart/remove', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ id })
    })
        .then(response => response.json())
        .then(data => {
            updateCartView();
        });
}

function clearCart() {
    fetch('/cart/clear', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(response => response.json())
        .then(() => {
            updateCartView();
        });
}

function updateCartView() {
    fetch('/cart/data')
        .then(response => response.json())
        .then(data => {
            let cartItems = document.getElementById("cart-items");
            let subtotalAmount = document.getElementById("subtotal-amount");
            let discountAmount = document.getElementById("discount-amount");
            let taxAmount = document.getElementById("tax-amount");
            let totalPriceElement = document.getElementById("total-price");
            let totalPayment = document.getElementById("total-payment");

            let subtotal = 0;
            let discount = 20; // Example fixed discount (You can modify this)
            let taxRate = 0.015; // 1.5% tax

            cartItems.innerHTML = "";

            for (const [id, item] of Object.entries(data.cart || {})) {
                let itemTotal = item.price * item.quantity;
                subtotal += itemTotal;

                cartItems.innerHTML += `
                    <tr>
                        <td><i class="bi bi-trash text-danger" onclick="removeFromCart(${id})"></i> ${item.name}</td>
                        <td class="text-center">
                            <div class="qty-control">
                                <button onclick="updateCart('decrease', ${id})" class="qty-btn">-</button>
                                <span>${item.quantity}</span>
                                <button onclick="updateCart('increase', ${id})" class="qty-btn">+</button>
                            </div>
                        </td>
                        <td>$${itemTotal.toFixed(2)}</td>
                    </tr>`;
            }

            let tax = subtotal * taxRate;
            let total = subtotal - discount + tax;

            subtotalAmount.textContent = `$${subtotal.toFixed(2)}`;
            discountAmount.textContent = `$${discount.toFixed(2)}`;
            taxAmount.textContent = `$${tax.toFixed(2)}`;
            totalPriceElement.textContent = `$${total.toFixed(2)}`;
            totalPayment.textContent = total.toFixed(2);
        });
}


document.querySelector(".btn-outline-danger").addEventListener("click", function () {
    clearCart();
});
