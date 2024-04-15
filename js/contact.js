var modal = document.getElementById("contactModal");
var btn = document.getElementById("contact");
var span = document.getElementsByClassName("modal__button-close")[0];

// Когда пользователь нажимает на кнопку, открывается модальное окно
btn.onclick = function() {
    modal.classList.add("modal--show");
    document.body.classList.add("stop-scrolling");
}
function closeModalForm() {
    modal.classList.remove("modal--show");
    document.body.classList.remove("stop-scrolling");
}
// Когда пользователь нажимает на (x), закрывается модальное окно
span.onclick = function() {
    closeModalForm();
}

// Когда пользователь кликает вне модального окна, оно закрывается
window.onclick = function(event) {
    if (event.target == modal) {
        closeModalForm();
    }
}