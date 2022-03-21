let text = document.querySelectorAll('input:not(input[type=submit])');
let button = document.querySelectorAll('input[type=submit]');

/*console.log(text);*/

function myButton() {
    for (let i = 0; i < text.length; i++)
    {
        if(text[i].value == "")
        {
            button.disabled = true;
            return;
        }
    }
    button.disabled = false;
}

for(let i = 0; i < text.length; i++)
{
    text[i].addEventListener("change", myButton);
}
