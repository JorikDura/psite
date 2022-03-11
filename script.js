const text = document.querySelectorAll('input');
button = text[5];
text[2].addEventListener("change", myButton);
text[3].addEventListener("change", myButton);
text[4].addEventListener("change", myButton);
/*console.log(text);*/

function myButton()
{
    if(text[2].value != "" && text[3].value != "" && text[4].value != "")
    {
        button.disabled = false;
    }
    else
    {
        button.disabled = true;
    }
}
