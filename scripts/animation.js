// Write your Code here// Write your Code here
const hiddenLogin = document.querySelectorAll(".login .hidden");
const hiddenSignUp = document.querySelectorAll(".signup .hidden");

const b1 = document.querySelector(".login button");
const b2 = document.querySelector(".signup button");

const login = document.querySelector(".login");
const signup = document.querySelector(".signup");

window.addEventListener("DOMContentLoaded", () => {
    show(hiddenLogin);
    b1.addEventListener("click", () => {
        hide(hiddenLogin, login, signup);
        show(hiddenSignUp);
    });
    b2.addEventListener("click", () => {
        hide(hiddenSignUp, signup, login);
        show(hiddenLogin);
    });
});

function hide(hiddenElements, form1, form2) {
    form1.style.opacity = "0";
    form1.style.zIndex = "1";

    hiddenElements.forEach((hiddenElement, index) => {
        hiddenElement.style.opacity = "0";
        hiddenElement.style.transform = "translateY(50px)";
    });

    form2.style.opacity = "1";
    form2.style.zIndex = "2";
}

function show(hiddenElements) {
    hiddenElements.forEach((hiddenElement, index) => {
        hiddenElement.style.transitionDelay = 0.3 * index + "s";
        hiddenElement.style.opacity = "1";
        hiddenElement.style.transform = "translateY(0px)";
        setTimeout(() => {
            hiddenElement.style.transitionDelay = "0s";
        }, 300);
    });
}
