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
    window.closeModal = function (id) {
        document.getElementById('modal-' + id).classList.add('hidden');
    }

    // Fechar mensagem de erro no login
    window.closeMsgError = function () {
        document.getElementById('msgErrorRed').classList.add('translate-x-full');
        document.getElementById('msgErrorRed').classList.remove('translate-x-0');
        setTimeout(() => {
            document.getElementById('msgErrorRed').textContent = "";
        }, 300)

    }

    // Fechar mensagem de sucesso no login
    window.closeMsgSuccess = function () {
        document.getElementById('msgSuccessGreen').classList.add('-translate-x-full');
        document.getElementById('msgSuccessGreen').classList.remove('translate-x-0');
        setTimeout(() => {
            document.getElementById('msgSuccessGreen').textContent = "";
        }, 300)
    }

    // Abrir form esqueceu a senha
    window.openFormRecover = function () {
        document.getElementById('formLogin').classList.add('hidden');
        document.getElementById('formRecover').classList.remove('hidden');
        document.getElementById('formSubscribe').classList.add('hidden');
    }

    // Abrir form conectar-se
    window.openFormConect = function () {
        document.getElementById('formLogin').classList.remove('hidden');
        document.getElementById('formRecover').classList.add('hidden');
        document.getElementById('formSubscribe').classList.add('hidden');
    }

    // Abrir form novo usuário
    window.openFormSubscribe = function () {
        document.getElementById('formLogin').classList.add('hidden');
        document.getElementById('formRecover').classList.add('hidden');
        document.getElementById('formSubscribe').classList.remove('hidden');
    }

    // Arredondar e desaredondar borda do select do formulário editar usuário
    window.alterSelectUpUser = function (id) {
        if (document.getElementById('selectUpUser' + id).classList.contains('rounded-br-md')) {
            document.getElementById('selectUpUser' + id).classList.remove('rounded-br-md');
            document.getElementById('selectUpUser' + id).classList.remove('border-b-2');
        } else {
            document.getElementById('selectUpUser' + id).classList.add('rounded-br-md');
            document.getElementById('selectUpUser' + id).classList.add('border-b-2');
        }
    }

    // Arredondar e desaredondar borda do nível de acesso do formulário editar usuário
    window.alterLevelUpUser = function (id) {
        if (document.getElementById('levelUpUser' + id).classList.contains('rounded-br-md')) {
            document.getElementById('levelUpUser' + id).classList.remove('rounded-br-md');
            document.getElementById('levelUpUser' + id).classList.remove('border-b-2');
        } else {
            document.getElementById('levelUpUser' + id).classList.add('rounded-br-md');
            document.getElementById('levelUpUser' + id).classList.add('border-b-2');
        }
    }

    // Fechar modal editar usuário
    window.closeModalEditUser = function (id) {
        document.getElementById('modalEdit-' + id).classList.add('hidden');
    }

    // Fechar modal editar senha do usuário
    window.closeModalEditPass = function (id) {
        document.getElementById('formUpPass-' + id).classList.add('hidden');
    }

    // Abrir modal editar senha do usuário
    window.openModalUpPass = function (id) {
        document.getElementById('modalEdit-' + id).classList.add('hidden');
        document.getElementById('formUpPass-' + id).classList.remove('hidden');
    }

    // Abrir modal editar usuário
    window.openModalEditUser = function (id) {
        document.getElementById('modalEdit-' + id).classList.remove('hidden');
    }
});
