
/**
 * 
 * @param {string} type the type of flash message, change the bg-color of the flash
 * @param {string} message the message to display
 */
function generateFlash(type, message) {

    // create new tag
    let container = document.querySelector(".container");
    let div = document.createElement("div");
    let button = document.createElement("button");
    let p = document.createElement("p");
    
    // add list to get it colored in the right way
    div.classList.add("alert", "alert-dismissible", "alert-" + type);

    // prepare the close button
    button.classList.add("btn-close");
    button.setAttribute("data-bs-dismiss", "alert");

    div.innerHTML = message
    div.appendChild(button);

    document.body.insertBefore(div, container);

}


/**
 * 
 * @param {string} email email to validate, must be @normandie.cci.fr or fim-online.net
 * @returns bool
 */
function validateEmail(email) {
    let regex = /^[^@]+@(fim-online\.net|normandie\.cci\.fr)$/;
    return regex.test(email);
}

function dismissAlert(){
    let alerts = document.querySelectorAll(".alert");

    alerts.forEach(alert => {
        setTimeout(()=>{
            alert.style.display = "none";
        }, 5000)
    });
}