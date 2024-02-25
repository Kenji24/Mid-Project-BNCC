function errorUserMsg(){
    var errorEmail = document.getElementById('errorEmail');
    var errorPassword = document.getElementById('errorPassword');
    var errorText = document.getElementById('errorText');

    errorText.style.display = 'block';
    errorText.style.opacity = '1';
    errorText.style.visibility = 'visible';
    errorEmail.style.borderColor = 'red';
    errorPassword.style.borderColor = 'red';
}