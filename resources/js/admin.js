document.addEventListener('DOMContentLoaded', function () {

    // Sidebar (barra lateral com outros links do site)
    window.openNavbar = function () {
        const aside = document.getElementById('aside');
        if (!aside) return;
        aside.classList.toggle('-translate-x-full');
    };

    const buttonOpenSidebar = document.getElementById('buttonOpenSidebar');
    if (buttonOpenSidebar) {
        buttonOpenSidebar.addEventListener('click', function (e) {
            e.preventDefault();
            openNavbar();
        });
    }

    // Modal opções de perfil
    window.modalOptionsProfile = function () {
        const modal = document.getElementById('modalOptionsProfile');
        if (!modal) return;
        modal.classList.toggle('hidden');
    };

    // Modal detalhes do usuário
    window.openModal = function (id) {
        const modal = document.getElementById('modal-' + id);

        if (!modal) return;

        modal.classList.remove('hidden');
    };

    // Fechar modal detalhes do usuário
    window.closeModal = function(id) {
            document.getElementById('modal-' + id).classList.add('hidden');
        }

});
