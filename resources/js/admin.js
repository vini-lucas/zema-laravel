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

    // Fechar mensagem de erro no login
    window.closeMsgError = function() {
        document.getElementById('msgErrorRed').classList.add('translate-x-full');
        document.getElementById('msgErrorRed').classList.remove('translate-x-0');
        document.getElementById('msgErrorRed').textContent = "";
    }

    // Fechar mensagem de sucesso no login
    window.closeMsgSuccess = function() {
        document.getElementById('msgSuccessGreen').classList.add('-translate-x-full');
        document.getElementById('msgSuccessGreen').classList.remove('translate-x-0');
        document.getElementById('msgSuccessGreen').textContent = "";
    }

    // Abrir form esqueceu a senha
    window.openFormRecover = function() {
        document.getElementById('formLogin').classList.add('hidden');
        document.getElementById('formRecover').classList.remove('hidden');
        document.getElementById('formSubscribe').classList.add('hidden');
    }

    // Abrir form conectar-se
    window.openFormConect = function() {
        document.getElementById('formLogin').classList.remove('hidden');
        document.getElementById('formRecover').classList.add('hidden');
        document.getElementById('formSubscribe').classList.add('hidden');
    }

    // Abrir form novo usuário
    window.openFormSubscribe = function() {
        document.getElementById('formLogin').classList.add('hidden');
        document.getElementById('formRecover').classList.add('hidden');
        document.getElementById('formSubscribe').classList.remove('hidden');
    }

    // Arredondar e desaredondar borda do select do formulário editar usuário
    window.alterSelectUpUser = function(id) {
        if (document.getElementById('selectUpUser' + id).classList.contains('rounded-br-md')) {
            document.getElementById('selectUpUser' + id).classList.remove('rounded-br-md');
            document.getElementById('selectUpUser' + id).classList.remove('border-b-2');
        } else {
            document.getElementById('selectUpUser' + id).classList.add('rounded-br-md');
            document.getElementById('selectUpUser' + id).classList.add('border-b-2');
        }
    }
});
