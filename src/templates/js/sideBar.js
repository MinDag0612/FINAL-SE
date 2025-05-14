const elements = document.querySelectorAll('.product-container');
// const section = container.closest('section')
elements.forEach(el => {
    const style = el.closest('section').id;
    const form = new FormData();
    form.append('style', style)
    fetch('api/products/get_product.php', {
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
                        <img src="" alt="Product Image" class="img-fluid" />
                        <h5>${row.name}</h5>
                        <p>${row.price}</p>
                        <button class="btn btn-primary">Choose</button>
                        </div>
                    </div>
                    `
                });
            } else {
                console.log('Không có dữ liệu sản phẩm');
            }
        })
        .catch(error => {
        console.error('Lỗi:', error);
    });
})