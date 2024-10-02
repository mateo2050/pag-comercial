document.addEventListener('DOMContentLoaded', () => {
    const products = [
        { name: 'Combo de 6 panchos', price: 'medium', precio: 15900 , quality: 'medium', img: './multimedia/images.jpg' },
        { name: 'Hamburguesa Combo 4', price: 'low', precio: 3550 , quality: 'low', img: './multimedia/ug.jpg' },
        { name: 'Lays', price: 'low', precio: 1900 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Caramelos', price: 'low', precio: 50 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Combo de 6 panchos', price: 'medium', precio: 15900 , quality: 'medium', img: './multimedia/images.jpg' },
        { name: 'Hamburguesa Combo 8', price: 'medium', precio:  12000, quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Lays', price: 'low', precio: 1900 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Caramelos', price: 'low', precio: 50 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Combo de 6 panchos', price: 'medium', precio: 15900 , quality: 'medium', img: './multimedia/images.jpg' },
        { name: 'Hamburguesa Combo12', price: 'high', precio: 18000, quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Lays', price: 'low', precio: 1900 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Caramelos', price: 'low', precio: 50 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Combo de 6 panchos', price: 'medium', precio: 15900 , quality: 'medium', img: './multimedia/images.jpg' },
        { name: 'Hamburguesa Combo 72', price: 'high', precio: 180000 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Lays', price: 'low', precio: 1900 , quality: 'low', img: './multimedia/images.jpg' },
        { name: 'Caramelos', price: 'low', precio: 50 , quality: 'low', img: './multimedia/images.jpg' },
      
        // Otros productos...
    ];

    const cart = [];

    const productList = document.getElementById('productList');
    const searchBar = document.getElementById('searchBar');
    const priceFilter = document.getElementById('priceFilter');
    const qualityFilter = document.getElementById('qualityFilter');
    const cartButton = document.getElementById('cartButton');
    const cartModal = document.getElementById('cartModal');
    const closeModal = document.getElementsByClassName('close')[0];
    const cartItems = document.getElementById('cartItems');

    function displayProducts(filteredProducts) {
        productList.innerHTML = '';
        filteredProducts.forEach((product, index) => {
            const productDiv = document.createElement('div');
            productDiv.classList.add('product');
            productDiv.innerHTML = `
                <img src="${product.img}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>Precio: $${product.precio}</p>
                <div class="counter">
                    <button class="minus" data-index="${index}">-</button>
                    <input type="number" value="1" min="1" data-index="${index}">
                    <button class="plus" data-index="${index}">+</button>
                </div>
                <button class="add-to-cart" data-index="${index}">Agregar al carrito</button>
            `;
            productList.appendChild(productDiv);
        });

        document.querySelectorAll('.minus').forEach(button => {
            button.addEventListener('click', () => {
                const index = button.getAttribute('data-index');
                const input = document.querySelector(`input[data-index="${index}"]`);
                if (input.value > 1) {
                    input.value--;
                }
            });
        });

        document.querySelectorAll('.plus').forEach(button => {
            button.addEventListener('click', () => {
                const index = button.getAttribute('data-index');
                const input = document.querySelector(`input[data-index="${index}"]`);
                input.value++;
            });
        });

        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', () => {
                const index = button.getAttribute('data-index');
                const input = document.querySelector(`input[data-index="${index}"]`);
                addToCart(products[index], parseInt(input.value));
            });
        });
    }

    function filterProducts() {
        const searchTerm = searchBar.value.toLowerCase();
        const selectedPrice = priceFilter.value;
        const selectedQuality = qualityFilter.value;

        const filteredProducts = products.filter(product => {
            const matchesSearch = product.name.toLowerCase().includes(searchTerm);
            const matchesPrice = selectedPrice === 'all' || product.price === selectedPrice;
            const matchesQuality = selectedQuality === 'all' || product.quality === selectedQuality;

            return matchesSearch && matchesPrice && matchesQuality;
        });

        displayProducts(filteredProducts);
    }

    function addToCart(product, quantity) {
        const cartItem = cart.find(item => item.name === product.name);
        if (cartItem) {
            cartItem.quantity += quantity;
        } else {
            cart.push({ ...product, quantity });
        }
        updateCart();
    }

    function updateCart() {
        cartItems.innerHTML = '';
        let subtotal = 0;
        cart.forEach((item, index) => {
            const li = document.createElement('li');
            li.textContent = `${item.name} - Cantidad: ${item.quantity} - Precio: $${item.precio * item.quantity}`;
            
            // Botón de eliminar
            const removeButton = document.createElement('button');
            removeButton.textContent = 'Eliminar';
            removeButton.style.marginLeft = '10px';
            removeButton.addEventListener('click', () => {
                removeFromCart(index);
            });
            li.appendChild(removeButton);

            cartItems.appendChild(li);
            subtotal += item.precio * item.quantity;
        });

        const subtotalElement = document.createElement('li');
        subtotalElement.textContent = `Subtotal: $${subtotal}`;
        cartItems.appendChild(subtotalElement);
    }

    function removeFromCart(index) {
        cart.splice(index, 1);  // Elimina el producto del carrito
        updateCart();  // Actualiza el carrito
    }

    searchBar.addEventListener('input', filterProducts);
    priceFilter.addEventListener('change', filterProducts);
    qualityFilter.addEventListener('change', filterProducts);

    cartButton.addEventListener('click', () => {
        cartModal.style.display = 'block';
    });

    closeModal.addEventListener('click', () => {
        cartModal.style.display = 'none';
    });

    window.addEventListener('click', (event) => {
        if (event.target == cartModal) {
            cartModal.style.display = 'none';
        }
    });

    


    displayProducts(products); // Mostrar todos los productos inicialmente
});
