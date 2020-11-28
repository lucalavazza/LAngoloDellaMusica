function leavePhone() {
    if (window.confirm("Sei sicuro di procedere? Effettuerai una chiamata, se il dispositivo è abilitato.")) {
        window.location.href = "tel:+390302120951";
    }
}
function leaveWA() {
    if (confirm("Sei sicuro di uscire? Verrai reindirizzato a WhatsApp.")) {
        window.open(
                'https://api.whatsapp.com/send?phone=393391762352','_blank');
    }
}
function leaveMail() {
    if (confirm("Sei sicuro di voler procedere? Verrai reindirizzato al client mail.")) {
        window.location.href = "mailto:info@langolodellamusica.com";
    }
}
function leaveFB() {
    if (confirm("Sei sicuro di voler uscire dal sito? Verrai reindirizzato alla pagina Facebook.")) {
        window.open(
                'https://www.facebook.com/langolodellamusicabs/','_blank');
    }
}
function leaveIG() {
    if (confirm("Sei sicuro di voler uscire dal sito? Verrai reindirizzato alla pagina Instagram.")) {
        window.open(
                'https://www.instagram.com/langolodellamusica/','_blank');
    }
}
function leaveMap() {
    if (confirm("Sei sicuro di voler uscire dal sito? Verrai reindirizzato alla mappa.")) {
        window.open(
                'https://g.page/langolodellamusica?share_blank');
    }
}
function leaveWeb() {
    if (confirm("Sei sicuro di voler uscire da questo sito? Verrai reindirizzato ad un sito esterno.")) {
        window.open(
                'https://g.page/langolodellamusica?share_blank');
    }
}

function confirmChange() {
        return confirm("Sei sicuro/a di voler procedere?");
}

function confirmDelete() {
    return confirm('Vuoi davvero eliminare il tuo account?');
}

function loginAlert() {
    alert("Per aggiungere prodotti alla Wishlist e per accedervi è necessario aver effettuato il login!");
}
function loginWrongAlertUser() {
    alert("Attenzione, si è verificato un errore durante l\'accesso! Per cortesia controllare di inserire lo username correttamente.");
}
function loginWrongAlertPwd() {
    alert("Attenzione, si è verificato un errore durante l\'accesso! Per cortesia controllare di inserire la password correttamente.");
}
function wishlistAlert() {
    alert("Per accedere alla pagina è necessario avere effettuato l\'accesso!");
}
function registrationAlert() {
    alert("Attenzione, si è verificato un errore durante la registrazione. Le password inserite sono differenti!");
}
function registrationDoubleAlertUser() {
    alert("Attenzione, si è verificato un errore durante la registrazione. Lo username risulta già preso!");
}

function registrationDoubleAlertMail() {
    alert("Attenzione, si è verificato un errore durante la registrazione. La mail risulta già in uso!");
}

function wrongOldPwd() {
    alert("Attenzione, la vecchia password è errata!");
}

function wrongRepetition() {
    alert("Attenzione, le nuove password non coincidono!");
}
