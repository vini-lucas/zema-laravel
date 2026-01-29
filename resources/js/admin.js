document.addEventListener('DOMContentLoaded', function () {

    // Sidebar
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

    // Modal usuário
    window.openModal = function () {
        const modal = document.getElementById('modal');

        if (!modal) return;

        modal.classList.remove('hidden');
    };

    // Fechar modal
    window.closeModal = function() {
            document.getElementById('modal').classList.add('hidden');
        }

});
