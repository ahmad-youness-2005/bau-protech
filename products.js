
        // Function to add item to cart
        function addToCart(productTitle, productPrice) {
            // Initialize cart as empty object
            let cart = JSON.parse(localStorage.getItem('cart')) || {};

            // Add product to cart object
            if (cart[productTitle]) {
                cart[productTitle].quantity += 1;
            } else {
                cart[productTitle] = {
                    price: productPrice,
                    quantity: 1
                };
            }

            // Save cart data to local storage
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        // Function to handle cart icon click event
        document.getElementById('cart-icon').addEventListener('click', function() {
            // Redirect to cart page
            window.location.href = 'cart.html';
        });

        // Update cart icon count
        function updateCartIconCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || {};
            const cartIcon = document.getElementById('cart-icon');
            let totalCount = 0;
            for (const item in cart) {
                totalCount += cart[item].quantity;
            }
            cartIcon.innerText = totalCount;
        }

        // Update cart icon count when page loads
        updateCartIconCount();
