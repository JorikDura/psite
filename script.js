function lenText() {
    if (text.value.length >= 1) { /* Проверка на длину текста в поле*/
        button.removeAttribute('disabled') /* Убираем атрибут */
    }
    else
        button.setAttribute('disabled', '') /* Ставим атрибут */
}
/* querySelector - позволяет взаимодействовать с тегами, получать значение или передавать */
let text = document.querySelector('#fstr') /* присвоим первое значение  */
let button = document.querySelector('#button') /* наша кнопка */
text.addEventListener('keyup', lenText)