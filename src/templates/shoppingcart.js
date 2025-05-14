
// COUNTER

// Cart object to store items with quantities
let cart = {};
let total = 0;

console.log("Counter.js loaded");

function updateCartDisplay() {
    console.log("Updating cart display");
    const container = document.getElementById('cartItemsContainer');
    const totalElement = document.getElementById('cartTotal');
    
    if (!container || !totalElement) {
        console.error("Cart elements not found!");
        return;
    }
    
    container.innerHTML = '';
    
    if (Object.keys(cart).length === 0) {
        container.innerHTML = '<p class="text-center">Your cart is empty</p>';
        totalElement.textContent = '0.00';
        return;
    }
    
    for (const [name, item] of Object.entries(cart)) {
        const itemElement = document.createElement('div');
        itemElement.className = 'd-flex justify-content-between mb-2';
        itemElement.innerHTML = `
            <span>${name} × ${item.quantity}</span>
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
        `;
        container.appendChild(itemElement);
    }
    
    totalElement.textContent = total.toFixed(2);
    console.log("Cart updated:", cart);
}




function initializeCounter(card) {
    console.log("Initializing counter for card:", card);
    
    const nameElement = card.querySelector('h5');
    const priceElement = card.querySelector('p');
    const plusBtn = card.querySelector('.plus');
    const minusBtn = card.querySelector('.minus');
    const countDisplay = card.querySelector('.count');
    
    if (!nameElement || !priceElement || !plusBtn || !minusBtn || !countDisplay) {
        console.error("Missing elements in card:", card);
        return;
    }
    
    const name = nameElement.textContent;
    const priceText = priceElement.textContent;
    const price = parseFloat(priceText.replace('$', '').trim());
    
    console.log(`Initializing: ${name} at $${price}`);
    
    let count = 0;
    
    plusBtn.addEventListener('click', (e) => {
        e.preventDefault();
        count++;
        countDisplay.textContent = count;
        console.log(`Added ${name}, count: ${count}`);
        
        cart[name] = { price, quantity: count };
        total = Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        updateCartDisplay();
        
        try {
            const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasScrolling'));
            cartOffcanvas.show();
        } catch (err) {
            console.error("Error showing cart:", err);
        }
    });
    
    minusBtn.addEventListener('click', (e) => {
        e.preventDefault();
        if (count > 0) {
            count--;
            countDisplay.textContent = count;
            console.log(`Removed ${name}, count: ${count}`);
            
            if (count === 0) {
                delete cart[name];
            } else {
                cart[name] = { price, quantity: count };
            }
            
            total = Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
            updateCartDisplay();
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    console.log("DOM fully loaded");
    
    const drinkCards = document.querySelectorAll('.drink-card');
    console.log(`Found ${drinkCards.length} drink cards`);
    
    drinkCards.forEach(card => {
        initializeCounter(card);
    });

    updateCartDisplay();
});





// The disappearance of the button :(((

document.addEventListener('DOMContentLoaded', function() {
    const cartButton = document.getElementById('cartButton');
    const offcanvas = document.getElementById('offcanvasScrolling');
    
    offcanvas.addEventListener('show.bs.offcanvas', function () {
        cartButton.style.display = 'none';
    });
    
    offcanvas.addEventListener('hide.bs.offcanvas', function () {
        cartButton.style.display = 'block';
    });
});






document.addEventListener('DOMContentLoaded', function() {
  const offcanvas = document.getElementById('offcanvasScrolling');
  
  offcanvas.addEventListener('show.bs.offcanvas', function() {
    document.querySelector('main').style.marginRight = '250px';
    document.querySelector('.content-container').classList.add('offcanvas-open');
  });
  
  offcanvas.addEventListener('hide.bs.offcanvas', function() {
    document.querySelector('main').style.marginRight = '0';
    document.querySelector('.content-container').classList.remove('offcanvas-open');
  });
});





// REMOVE

function updateCartDisplay() {
    console.log("Updating cart display");
    const container = document.getElementById('cartItemsContainer');
    const totalElement = document.getElementById('cartTotal');
    
    if (!container || !totalElement) {
        console.error("Cart elements not found!");
        return;
    }
    
    container.innerHTML = '';
    
    if (Object.keys(cart).length === 0) {
        container.innerHTML = '<p class="text-center">Your cart is empty</p>';
        totalElement.textContent = '0.00';
        return;
    }
    
    for (const [name, item] of Object.entries(cart)) {
        const itemElement = document.createElement('div');
        itemElement.className = 'd-flex justify-content-between align-items-center mb-2';
        itemElement.innerHTML = `
            <div>
                <span>${name} × ${item.quantity}</span>
                <span class="ms-2">$${(item.price * item.quantity).toFixed(2)}</span>
            </div>
            <button class="btn btn-sm btn-outline-danger remove-item" data-name="${name}">
                ×
            </button>
        `;
        container.appendChild(itemElement);
    }
    
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const itemName = this.getAttribute('data-name');
            removeItemFromCart(itemName);
        });
    });
    
    totalElement.textContent = total.toFixed(2);
    console.log("Cart updated:", cart);
}

function removeItemFromCart(name) {
    console.log(`Removing ${name} from cart`);
    if (cart[name]) {
        total -= cart[name].price * cart[name].quantity;
        delete cart[name];
        updateCartDisplay();
        
    }
}