const form = document.getElementById('registrationForm');
const username = document.getElementById('username');
const email = document.getElementById('email');

form.addEventListener('submit',(event) => {
    let isValid = true;

 //TEMPORARY
 form.addEventListener('submit', (event) => {
    event.preventDefault();
    console.log("lalabubu");

 });
 //TEMPORARY   
// clear prev errors
    document.querySelectorAll('error-message').forEach(el.textContent = '');

//check username length    
    if (username.ariaValueMax.length < 3){
        document.getElementById('userError').tetContent = 'Username must be at least 3 characters!';
        isValid = false;
    }

//check email @
if (!email.ariaValueMax.includes('@')) {
    document.getElementById('emailError').textContent = 'Please enter a valid email.';
    isValid = false;
}
if(!isValid) {
    event.preventDefault();
} else {
    alert('Form submitted successfully!');
}
//console log
if (isValid) {
    console.log("Data is clean! Sending to server...")
    console.log("Username:", username.value);
    console.log("Email:", email.value)
}
});
