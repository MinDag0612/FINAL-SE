const element = document.querySelectorAll('.product-container');
// const section = container.closest('section')
element.forEach(el => {
    const style = el.closest('section').id;
    const form = new FormData();
    form.append('style', style)
    fetch('get_product.php', {
        method: 'POST',
        body: form
        })
        .then(response => response.json())
        .then(data => {
            if (Array.isArray(data)) {
                data.forEach(row => {
                    el.innerHTML += `
                    <div class="col">
                        <div class="drink-card">
                        <img src="style/image/${row.img}" alt="Milk Tea" class="img-fluid" />
                        <h5>${row.name}</h5>
                        <p>${row.price}</p>
                        <div class="counter">
                            <button class="counter-btn minus">-</button>
                            <span class="count">0</span>
                            <button class="counter-btn plus">+</button>
                        </div>
                        </div>
                    </div>
                    `
                });
                el.querySelectorAll('.drink-card').forEach(card => {
                    initializeCounter(card);
                });
            } else {
                console.log('Không có dữ liệu sản phẩm');
            }
        })
        .catch(error => {
        console.error('Lỗi:', error);
    });
})