document.addEventListener('DOMContentLoaded', function() {
    console.log('JavaScript file loaded successfully');

    const addParticipantBtn = document.getElementById('addParticipantBtn');
    const removeParticipantBtn = document.getElementById('removeParticipantBtn');
    const participantSection = document.getElementById('participantSection');
    const participantTemplate = document.getElementById('participantTemplate');
    const submitBtn = document.querySelector('button[type="submit"]');

    if (!addParticipantBtn || !removeParticipantBtn || !participantSection || !participantTemplate || !submitBtn) {
        console.error('One or more elements are missing. Ensure all elements are correctly defined.');
        return;
    }

    let participantCount = 0;

    function addInputListeners(inputs) {
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                console.log(`Input event: ID: ${input.id}, Name: ${input.name}, Value: ${input.value}, Checked: ${input.checked}`);
            });
            input.addEventListener('change', function() {
                console.log(`Change event: ID: ${input.id}, Name: ${input.name}, Value: ${input.value}, Checked: ${input.checked}`);
            });
        });
    }

    addParticipantBtn.addEventListener('click', function() {
        console.log('Add participant button clicked');
        participantCount++;

        const newParticipant = participantTemplate.cloneNode(true);
        newParticipant.id = '';
        newParticipant.classList.add('participant-section');
        console.log('New participant template cloned');

        // Dodanie nagłówka dla nowego uczestnika
        const header = document.createElement('h4');
        header.className = 'participant-header mt-5';
        header.innerText = `${participantCount + 1}. Uczestnik wyprawy`;
        newParticipant.prepend(header);
        console.log('Header added to new participant');

        if (participantCount > 0) {
            const loginData = newParticipant.querySelector('.login-data');
            if (loginData) {
                loginData.remove();
                console.log('Login data removed');
            }
            const loginFields = newParticipant.querySelector('.login-fields');
            if (loginFields) {
                loginFields.remove();
                console.log('Login fields removed');
            }
            const loginInfo = newParticipant.querySelector('.login-info');
            if (loginInfo) {
                loginInfo.remove();
                console.log('Login info removed');
            }
        }

        const inputs = newParticipant.querySelectorAll('input, select');
        inputs.forEach(input => {
            const newId = input.id + '_' + participantCount;
            input.id = newId;
            if (input.name.includes('[0]')) {
                input.name = input.name.replace('[0]', `[${participantCount}]`);
            } else {
                const nameParts = input.name.split('[');
                nameParts[1] = `[${participantCount}]` + nameParts[1].substring(nameParts[1].indexOf(']'));
                input.name = nameParts.join('');
            }
            input.value = ''; // Czyszczenie pól
            if (input.type === 'radio') {
                input.checked = false; // Odznaczenie domyślnie zaznaczonego pola
            }
        });
        console.log('Inputs updated for new participant');
        addInputListeners(inputs);

        // Logowanie nowo dodanych pól uczestnika, w tym gender
        console.log(`Participant ${participantCount} fields:`);
        inputs.forEach(input => {
            console.log(`ID: ${input.id}, Name: ${input.name}, Value: ${input.value}, Checked: ${input.checked}`);
            // if (input.name.includes('gender')) {
            //     console.log(`Gender input: ID: ${input.id}, Name: ${input.name}, Checked: ${input.checked}`);
            // }
        });

        participantSection.appendChild(newParticipant);
        console.log('New participant added to the section');
    });

    removeParticipantBtn.addEventListener('click', function() {
        if (participantSection.children.length > 1) {
            participantSection.removeChild(participantSection.lastElementChild);
            participantCount--;
            console.log('Last participant removed');
        }
    });

    submitBtn.addEventListener('click', function(event) {
        const participants = document.querySelectorAll('.participant-section');
        participants.forEach((participant, index) => {
            const inputs = participant.querySelectorAll('input, select');
            console.log(`Participant ${index + 1} data before submit:`);
            inputs.forEach(input => {
                console.log(`ID: ${input.id}, Name: ${input.name}, Value: ${input.value}, Checked: ${input.checked}`);
                // if (input.name.includes('gender')) {
                //     console.log(`Gender input: ID: ${input.id}, Name: ${input.name}, Checked: ${input.checked}`);
                // }
            });
        });
    });
});
