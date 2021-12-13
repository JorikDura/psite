const text = document.querySelectorAll('input');
button = text[3];
text[0].addEventListener("change", myButton);
text[1].addEventListener("change", myButton);
text[2].addEventListener("change", myButton);
/*console.log(text);*/

function myButton()
{
    if(text[0].value != "" && text[1].value != "" && text[2].value != "")
    {
        button.disabled = false;
    }
    else
    {
        button.disabled = true;
    }
}
