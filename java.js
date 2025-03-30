document.addEventListener('DOMContentLoaded', () => {
    const cartCountElement = document.getElementById('cart-count');
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    const updateCartCount = () => {
        cartCountElement.textContent = cart.length;
    };

    const addToCart = (productId) => {
        cart.push(productId);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartCount();
    };

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', (event) => {
            const productId = event.target.closest('.product').dataset.id;
            addToCart(productId);
        });
    });

    updateCartCount();
});

document.addEventListener('DOMContentLoaded', function () {
    var swiper = new Swiper('.swiper-container', {
        loop: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
    });
});

document.addEventListener("DOMContentLoaded", function () {
    // Initialiser tous les carrousels Swiper dans les catégories
    const carousels = document.querySelectorAll(".swiper-container");
    carousels.forEach((carousel) => {
        new Swiper(carousel, {
            loop: true, // Boucle infinie
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            autoplay: {
                delay: 3000, // Défiler automatiquement toutes les 3 secondes
                disableOnInteraction: false,
            },
        });
    });
});

document.getElementById("orderForm").addEventListener("submit", function (event) {
    const name = document.getElementById("name").value;
    const product = document.getElementById("product").value;
    const quantity = document.getElementById("quantity").value;

    const confirmation = confirm(
        `Confirmez-vous votre commande de ${quantity} ${product}(s) au nom de ${name} ?`
    );

    if (!confirmation) {
        event.preventDefault(); // Annule l'envoi du formulaire si l'utilisateur annule
    }
});
