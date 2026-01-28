// Executa somente quando o DOM estiver montado na página.
document.addEventListener('DOMContentLoaded', function () {

    // Fechar e abrir navbar
    function openNavbar() {
            if (document.getElementById('aside').classList.contains('-translate-x-full')) {
                document.getElementById('aside').classList.remove('-translate-x-full');
            } else {
                document.getElementById('aside').classList.add('-translate-x-full');
            }
        }

        document.getElementById('buttonOpenSidebar').addEventListener('click', (e) => {
            e.preventDefault();
            openNavbar();
        })

        // Abrir modal detalhes do usuário
        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
            document.getElementById('content').classList.remove('blur-sm', 'pointer-events-none');
        }

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('content').classList.add('blur-sm', 'pointer-events-none');
        }

        function modalOptionsProfile() {
            if (document.getElementById('modalOptionsProfile').classList.contains('hidden')) {
                document.getElementById('modalOptionsProfile').classList.remove('hidden');
            } else {
                document.getElementById('modalOptionsProfile').classList.add('hidden');
            }
        }
})
