/* JS: add and remove class to the container on click of a button to switch screen */
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});

/* jQuery: add and remove class to the elements on click of a button to apply mode
*/
function toDark() {
    $('.btn').css('background-image',
        'linear-gradient(-45deg, #2b0158 0%, #3c2258 100%)')
        .addClass('BtnToDark')
        .removeClass('BtnToLight');
    $('.container').css('background-color', '#222')
        .addClass('toDark')
        .removeClass('toLight');
    $('.fas').css('color', '#3c2258');
    $('.input-field').css('background-color', '#777');
}

function toLight() {
    $('.btn').css('background-image',
        'linear-gradient(-45deg, #e74011 0%, #e77011 100%)')
        .addClass('BtnToLight')
        .removeClass('BtnToDark');
    $('.container').css('background-color', '#fff')
        .addClass('toLight')
        .removeClass('toDark');
    $('.fas').css('color', '#e74011');
    $('.input-field').css('background-color', '#f0f0f0');
}