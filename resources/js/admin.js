// Executa somente quando o DOM estiver montado na página.
document.addEventListener('DOMContentLoaded', function () {

    // Botão abrir modal p/ criar INSS.
    const btnOpenModalCreateProposal = document.getElementById('btnOpenModalCreateProposal');

    // Modal p/ criar INSS.
    const modalCreateProposal = document.getElementById('modalCreateProposal');

    // Evento de abrir modal p/ criar INSS.
    btnOpenModalCreateProposal.addEventListener('click', function (e) {
        e.preventDefault();
        modalCreateProposal.style.display == 'block' ? modalCreateProposal.style.display = 'none' : modalCreateProposal.style.display = 'block';
    })
})
