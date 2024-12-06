document.addEventListener('DOMContentLoaded', () => {
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalPrice = document.querySelector('#cart-total-price');
    const checkoutButton = document.getElementById('checkout-btn');
    let isPaymentInProgress = false; // Menyimpan status pembayaran

    // Fungsi untuk mengupdate total harga di UI
    function updateTotalPrice(cart) {
        const totalPrice = cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
        cartTotalPrice.textContent = `Rp ${totalPrice.toLocaleString()}`;
    }

    // Fungsi untuk mendapatkan total harga dari elemen cartTotalPrice
    function getTotalPrice() {
        const priceText = cartTotalPrice.textContent.replace(/[^0-9.-]+/g, ""); // Hapus simbol non-numerik
        const price = parseFloat(priceText);
        return isNaN(price) || price < 0.01 ? 0 : price; // Pastikan >= 0.01
    }

    // Fungsi untuk mengarahkan ke halaman checkout
    function redirectToCheckout() {
        if (isPaymentInProgress) {
            alert("Pembayaran sedang diproses. Harap tunggu beberapa saat.");
            return;
        }

        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const totalPembayaran = getTotalPrice();

        if (totalPembayaran <= 0) {
            alert("Total pembayaran tidak valid.");
            return;
        }

        console.log("Total pembayaran:", totalPembayaran);

        const transactionData = {
            order_id: `ORDER-${Date.now()}`, // ID unik
            gross_amount: totalPembayaran,
            item_details: cart.map(item => ({
                id: item.title.replace(/\s+/g, '-'),
                price: item.price,
                quantity: item.quantity,
                name: item.title,
            })),
            customer_details: {
                first_name: "John",
                last_name: "Doe",
                email: "johndoe@example.com",
                phone: "08123456789",
            }
        };

        console.log("Data transaksi yang dikirim ke server:", transactionData);

        fetch("Payment/examples/snap/checkout-process-simple-version.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(transactionData),
        })
        .then((response) => response.text())
        .then((snap_token) => {
            if (!snap_token) {
                throw new Error("Token Snap tidak valid.");
            }

            console.log("Token Snap diterima:", snap_token);

            isPaymentInProgress = true;

            snap.pay(snap_token, {
                onSuccess: function(result) {
                    alert("Pembayaran berhasil!");
                    console.log(result);
                    localStorage.removeItem('cart'); // Bersihkan keranjang setelah pembayaran sukses
                    renderCartItems(); // Perbarui tampilan setelah pembayaran
                    isPaymentInProgress = false;
                },
                onPending: function(result) {
                    alert("Pembayaran dalam proses!");
                    console.log(result);
                    isPaymentInProgress = false;
                },
                onError: function(result) {
                    alert("Pembayaran gagal!");
                    console.log(result);
                    isPaymentInProgress = false;
                },
                onClose: function() {
                    alert("Payment popup closed!");
                    isPaymentInProgress = false;
                }
            });
        })
        .catch((error) => {
            console.error("Error fetching snap_token:", error);
            alert("Terjadi kesalahan saat memulai pembayaran.");
            isPaymentInProgress = false;
        });
    }

    // Tambahkan event listener untuk tombol checkout
    checkoutButton.addEventListener("click", redirectToCheckout);

    // Fungsi untuk menyimpan keranjang yang diperbarui ke localStorage
    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    // Fungsi untuk memperbarui tampilan item keranjang
    function renderCartItems() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartItemsContainer.innerHTML = ''; // Bersihkan konten lama

        cart.forEach((item, index) => {
            const itemTotal = item.price * item.quantity;
            const itemElement = document.createElement('div');
            itemElement.classList.add('cart-item', 'd-flex', 'justify-content-between', 'align-items-center');

            itemElement.innerHTML = `
                <div class="d-flex align-items-center">
                    <img src="${item.image}" alt="${item.title}" class="me-3" style="max-width: 80px;"/>
                    <div>
                        <h5>${item.title}</h5>
                        <p>Harga: Rp ${item.price.toLocaleString()}</p>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-secondary btn-sm me-2 decrease-quantity" data-index="${index}">-</button>
                            <span>${item.quantity}</span>
                            <button class="btn btn-outline-secondary btn-sm ms-2 increase-quantity" data-index="${index}">+</button>
                        </div>
                    </div>
                </div>
                <div>
                    <p>Rp ${itemTotal.toLocaleString()}</p>
                    <button class="btn btn-danger btn-sm remove-item" data-index="${index}">Hapus</button>
                </div>
            `;

            cartItemsContainer.appendChild(itemElement);
        });

        updateTotalPrice(cart);
    }

    // Event handler untuk menambah atau mengurangi quantity dan menghapus item
    cartItemsContainer.addEventListener('click', (event) => {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        const index = event.target.getAttribute('data-index');

        if (event.target.classList.contains('increase-quantity')) {
            cart[index].quantity += 1;
            saveCart(cart);
            renderCartItems();
        } else if (event.target.classList.contains('decrease-quantity')) {
            if (cart[index].quantity > 1) {
                cart[index].quantity -= 1;
            } else {
                cart.splice(index, 1);
            }
            saveCart(cart);
            renderCartItems();
        } else if (event.target.classList.contains('remove-item')) {
            cart.splice(index, 1);
            saveCart(cart);
            renderCartItems();
        }
    });

    // Render ulang item di cart saat halaman dimuat
    renderCartItems();
});
