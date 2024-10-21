document.addEventListener('DOMContentLoaded', function() {
    const secondaryHeaderLinks = document.querySelectorAll('.secondary-header a');
    const logoLink = document.querySelector('.logo a');

    function createCustomAlert(link) {
        const customAlert = document.createElement('div');
        customAlert.style.position = 'fixed';
        customAlert.style.top = '50%';
        customAlert.style.left = '50%';
        customAlert.style.transform = 'translate(-50%, -50%)';
        customAlert.style.backgroundColor = 'white';
        customAlert.style.padding = '20px';
        customAlert.style.border = '1px solid black';
        customAlert.style.zIndex = '1000';

        customAlert.innerHTML = `
            <p>Esta acción te desconectará. ¿Deseas continuar?</p>
            <button id="cancelBtn">Cancelar</button>
            <button id="proceedBtn">Continuar</button>
        `;

        document.body.appendChild(customAlert);

        document.getElementById('cancelBtn').addEventListener('click', function() {
            document.body.removeChild(customAlert);
        });

        document.getElementById('proceedBtn').addEventListener('click', function() {
            window.location.href = link.href;
        });
    }

    function handleLinkClick(event) {
        event.preventDefault();
        createCustomAlert(this);
    }

    secondaryHeaderLinks.forEach(link => {
        link.addEventListener('click', handleLinkClick);
    });

    if (logoLink) {
        logoLink.addEventListener('click', handleLinkClick);
    }
});