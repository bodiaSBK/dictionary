function showSeries(n)
{
    var el = document.getElementById('subDiv'+n);

    if ( el.style.display == 'none' )
        el.style.display = 'block'
    else
    if ( el.style.display == 'block' )
        el.style.display = 'none';
};
