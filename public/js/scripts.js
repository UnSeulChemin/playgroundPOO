window.onload = () => {
    let boutons = document.querySelectorAll(".checkbox")

    for (let bouton of boutons)
    {
        bouton.addEventListener("click", start)
    }
}

function start()
{
    let xmlhttp = new XMLHttpRequest;

    xmlhttp.open('GET', '../admin/favoriteContact/'+this.dataset.id)
    xmlhttp.send()
}