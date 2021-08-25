let cart = loadCart();

function addToCart(productId, minOrder) {
    let clientOrder = document.getElementById("product-order-" + productId).value;
    let newProduct = true;

    for (let i = 0; i < cart.length; i++) {
        if (cart[i].productId === productId) {
            cart[i].clientOrder = parseInt(cart[i].clientOrder) + parseInt(clientOrder);
            newProduct = false;
            break;
        }
    }

    if (newProduct) {
        if (clientOrder < minOrder) {
            alert("O pedido mínimo para esse produto é " + minOrder);
            return;
        }
        cart.push({
            productId,
            clientOrder
        });
    }

    document.cookie = "bacandy_cart=" + JSON.stringify(cart);

    alert("Produto adicionado ao carrinho!");
}

function loadCart() {
    let cookies = `; ${document.cookie}`;
    let cart_cookie = cookies.split(`; bacandy_cart=`)

    if (cart_cookie.length === 2) {
        return JSON.parse(cart_cookie.pop().split(';').shift());
    } else {
        return [];
    }
}

function removeFromCart(productId) {
    for (let i = 0; i < cart.length; i++) {
        if (cart[i].productId === productId) {
            cart.splice(i,1);
            break;
        }
    }
    document.cookie = "bacandy_cart=" + JSON.stringify(cart);

    document.location.reload();
}