// Cart array to store items
let cart = [];
let total = 0;
        
// Function to add items to cart
function addToCart(name, price) {
    cart.push({name, price});
    total += price;
    updateCartDisplay();
            
    // Auto-open the cart
    const cartOffcanvas = new bootstrap.Offcanvas(document.getElementById('offcanvasScrolling'));
    cartOffcanvas.show();
}
        
// Function to update cart display
function updateCartDisplay() {
    const container = document.getElementById('cartItemsContainer');
    const totalElement = document.getElementById('cartTotal');
            
    // Clear container
    container.innerHTML = '';
            
    if (cart.length === 0) {
        container.innerHTML = '<p class="text-muted text-center">Your cart is empty</p>';
        totalElement.textContent = '0.00';
        return;
    }
            
    // Add each cart item
    cart.forEach(item => {
        const itemElement = document.createElement('div');
        itemElement.className = 'd-flex justify-content-between mb-2';
        itemElement.innerHTML = `
            <span>${item.name}</span>
            <span>$${item.price.toFixed(2)}</span>
        `;
        container.appendChild(itemElement);
    });
            
    // Update total
    totalElement.textContent = total.toFixed(2);
}
