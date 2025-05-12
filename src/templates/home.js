// Cart object to store items with quantities
let cart = {};
let total = 0;

// Function to update cart display
function updateCartDisplay() {
    const container = document.getElementById('cartItemsContainer');
    const totalElement = document.getElementById('cartTotal');
    
    // Clear container
    container.innerHTML = '';
    
    if (Object.keys(cart).length === 0) {
        container.innerHTML = '<p class="text-center">Yo shit is empty bruh</p>';
        totalElement.textContent = '0.00';
        return;
    }
    
    // Add each cart item
    for (const [name, item] of Object.entries(cart)) {
        const itemElement = document.createElement('div');
        itemElement.className = 'd-flex justify-content-between mb-2';
        itemElement.innerHTML = `
            <span>${name} × ${item.quantity}</span>
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
        `;
        container.appendChild(itemElement);
    }
    
    // Update total
    totalElement.textContent = total.toFixed(2);
}

// Initialize counters
document.querySelectorAll('.menu--item').forEach(item => {
    const name = item.querySelector('h5').textContent;
    const price = parseFloat(item.querySelector('p').textContent.replace('$', ''));
    const plusBtn = item.querySelector('.plus');
    const minusBtn = item.querySelector('.minus');
    const countDisplay = item.querySelector('.count');
    
    let count = 0;
    
    plusBtn.addEventListener('click', () => {
        count++;
        countDisplay.textContent = count;
        
        // Update cart
        if (cart[name]) {
            cart[name].quantity = count;
        } else {
            cart[name] = { price, quantity: count };
        }
        
        // Recalculate total
        total = Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
        
        updateCartDisplay();
    });
    
    minusBtn.addEventListener('click', () => {
        if (count > 0) {
            count--;
            countDisplay.textContent = count;
            
            // Update cart
            if (count === 0) {
                delete cart[name];
            } else {
                cart[name].quantity = count;
            }
            
            // Recalculate total
            total = Object.values(cart).reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            updateCartDisplay();
        }
    });
});

// Initialize empty cart display
updateCartDisplay();