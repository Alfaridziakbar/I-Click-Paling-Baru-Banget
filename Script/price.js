document.getElementById('get-price').addEventListener('click', function () {
    const productDetail = document.getElementById('product-detail');
    const productPrice = productDetail.getAttribute('data-price');

    // Kirim data-price ke backend dengan fetch API
    fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ price: productPrice }),
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error:', error));
});
