document.getElementById('form-carrinho').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    fetch('atualizar_carrinho.php', {
        method: 'POST',
        body: formData
    }).then(response => response.text())
    .then(data => {
        document.getElementById('carrinho').innerHTML = data;
    });
});
