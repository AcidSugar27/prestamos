/**
 * 
 * @param {String} elementID
 * El ID del elemento que se desea imprimir
 */
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

/**
 * Valida un string y determnina si el formato es valido para una cedula
 * @param {String} cedula 
 * @returns
 * true si la cedula tiene un formato valido, false en caso de que no sea valido
 */
function esCedulaValida( cedula )
{
    if( cedula.length == 11 )
    {
        if( isNaN(cedula) )
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    else
    {
        return false;
    }
}