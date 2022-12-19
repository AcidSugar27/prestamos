function imprimir( elementID )
{
    var el = document.getElementById(elementID);
    var HTML = document.body.innerHTML;

    if( el == undefined )
    {
        console.log('NO SE PUEDE IMPRIMIR LA TABLA POR QUE NO SE ECNONTRO EL ID DEL ELEMENTO');
    }
    else
    {
        document.body.innerHTML = el.innerHTML;
        window.print();
        document.body.innerHTML = HTML;
    }
}