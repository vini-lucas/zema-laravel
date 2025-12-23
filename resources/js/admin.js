// Executa somente quando o DOM estiver montado na página.
document.addEventListener('DOMContentLoaded', function () {
    const btnOpenModalCreateProposal = document.getElementById('btnOpenModalCreateProposal'); // Botão abrir modal p/ criar INSS.
    const modalCreateProposal = document.getElementById('modalCreateProposal'); // Modal p/ criar INSS.

    btnOpenModalCreateProposal.addEventListener('click', function (e) {
        e.preventDefault();
        modalCreateProposal.style.display == 'block' ? modalCreateProposal.style.display = 'none' : modalCreateProposal.style.display = 'block';

        if (modalCreateProposal.style.display == 'block') {
            document.addEventListener('click', (e) => {
                e.preventDefault();
                modalCreateProposal.style.display = 'none'
            })
        }
    })
})
