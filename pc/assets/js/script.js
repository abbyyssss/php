// Formatação de campos monetários
document.querySelectorAll('.money').forEach(input => {
    input.addEventListener('input', function(e) {
        let value = this.value.replace(/\D/g, '');
        value = (value / 100).toFixed(2) + '';
        value = value.replace('.', ',');
        value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
        
        if (value === '0,00') {
            this.value = '';
        } else {
            this.value = value;
        }
    });
});

// Confirmação para ações importantes
document.querySelectorAll('[data-confirm]').forEach(element => {
    element.addEventListener('click', function(e) {
        if (!confirm(this.dataset.confirm)) {
            e.preventDefault();
        }
    });
});

// Toggle para menus mobile
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.createElement('button');
    menuToggle.className = 'menu-toggle';
    menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
    
    const menu = document.querySelector('.menu');
    const navegacao = document.querySelector('.navegacao');
    
    if (menu && navegacao) {
        navegacao.insertBefore(menuToggle, menu);
        
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('active');
        });
    }
});