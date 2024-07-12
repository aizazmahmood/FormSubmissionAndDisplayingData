const form = document.getElementById('registrationForm');
const inputs = form.getElementsByTagName('input');

Array.from(inputs).forEach(input => {
    input.addEventListener('input', validateField);
});

form.addEventListener('submit', function(event) {
    let valid = true;
    Array.from(inputs).forEach(input => {
        if (!validateField({ target: input })) {
            valid = false;
        }
    });
    if (!valid) {
        event.preventDefault();
    }
});

function validateField(event) {
    const input = event.target;
    const errorMessage = input.nextElementSibling;

    if (input.value.trim() === '') {
        errorMessage.textContent = 'This field is required';
        errorMessage.style.display = 'block';
        return false;
    } else if (input.id === 'phone' && !/^03\d{9}$/.test(input.value.trim())) {
        errorMessage.textContent = 'Mobile Number should be of 11 digits and start with 03';
        errorMessage.style.display = 'block';
        return false;
    } else if (input.id === 'idNumber' && !/^\d{13}$/.test(input.value.trim())) {
        errorMessage.textContent = 'ID Number should be of 13 digits';
        errorMessage.style.display = 'block';
        return false;
    } else {
        errorMessage.textContent = '';
        errorMessage.style.display = 'none';
        return true;
    }
}
