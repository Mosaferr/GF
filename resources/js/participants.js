document.addEventListener('DOMContentLoaded', function() {
    const addParticipantBtn = document.getElementById('addParticipantBtn');
    const removeParticipantBtn = document.getElementById('removeParticipantBtn');
    const participantSection = document.getElementById('participantSection');
    const participantTemplate = document.getElementById('participantTemplate').cloneNode(true);

    let participantCount = 1;

    addParticipantBtn.addEventListener('click', function() {
        participantCount++;

        const newParticipant = participantTemplate.cloneNode(true);
        newParticipant.id = '';

        // Dodanie nagłówka dla nowego uczestnika
        const header = document.createElement('h4');
        header.className = 'participant-header mt-5';
        header.innerText = `${participantCount}. Uczestnik wyprawy`;
        newParticipant.prepend(header);

        // Usuwanie pól hasła i zdania informacyjnego dla nowych uczestników
        if (participantCount > 1) {
            const loginData = newParticipant.querySelector('.login-data');
            if (loginData) {
                loginData.remove();
            }
            const loginFields = newParticipant.querySelector('.login-fields');
            if (loginFields) {
                loginFields.remove();
            }
            const loginInfo = newParticipant.querySelector('.login-info');
            if (loginInfo) {
                loginInfo.remove();
            }
        }

        // Aktualizacja identyfikatorów pól
        const inputs = newParticipant.querySelectorAll('input');
        inputs.forEach(input => {
            const newId = input.id + participantCount;
            input.id = newId;
            input.name = input.name.replace('[]', `[${participantCount}]`);
            input.value = ''; // Czyszczenie pól
        });

        participantSection.appendChild(newParticipant);
    });

    removeParticipantBtn.addEventListener('click', function() {
        if (participantSection.children.length > 1) {
            participantSection.removeChild(participantSection.lastElementChild);
            participantCount--;
        }
    });
});
