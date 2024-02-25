function showPopupGreen(){
    var popupCenterGreen = document.getElementById('popupCenterGreen');
    var popupContentGreen = document.getElementById('popupContentGreen');
    var container = document.getElementById('container');

    popupCenterGreen.style.display = 'block';
    popupContentGreen.style.opacity = '1';
    popupContentGreen.style.visibility = 'visible';

    container.style.filter = 'blur(5px)';
    container.style.pointerEvents = 'none';
}

function showPopupRed(text){
    var popupCenterRed = document.getElementById('popupCenterRed');
    var popupContentRed = document.getElementById('popupContentRed');
    var popupTextRed = document.getElementById('popupTextRed');

    popupTextRed.textContent = text;
    popupCenterRed.style.display = 'block';
    popupContentRed.style.opacity = '1';
    popupContentRed.style.visibility = 'visible';
}

function closePopupGreen(){
    var popupCenterGreen = document.getElementById('popupCenterGreen');
    var popupContentGreen = document.getElementById('popupContentGreen');
    var container = document.getElementById('container');
    
    popupCenterGreen.style.display = 'none';
    popupContentGreen.style.opacity = '0';
    popupContentGreen.style.visibility = 'hidden';

    container.style.filter = 'none';
    container.style.pointerEvents = 'all';

    window.location.href = "../dashboard_page.php";
}

function closePopupRed(){
    var popupCenterRed = document.getElementById('popupCenterRed');
    var popupContentRed = document.getElementById('popupContentRed');
    
    popupCenterRed.style.display = 'none';
    popupContentRed.style.opacity = '0';
    popupContentRed.style.visibility = 'hidden';
}

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