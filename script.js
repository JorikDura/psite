/* НАДО ОБНОВИТЬ */
function lenText() {
    /* Проверка на длину текста в поле*/
    if (text.value.length >= 1 && date.value.length >= 1) {
        /* Убираем атрибут */
        button.removeAttribute('disabled')
    }
    else
        /* Ставим атрибут */
        button.setAttribute('disabled', '')
}
/* querySelector - позволяет взаимодействовать с тегами, получать значение или передавать */
/* присвоим первое значение  */
let text = document.querySelector('#fstr')
/* наша кнопка */
let date = document.querySelector('#time')
let button = document.querySelector('#button')
/* новый ивент */
text.addEventListener('keyup', lenText)