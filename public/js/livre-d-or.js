let indexLivre = 1;
slidesBook(indexLivre);

function plusSlidesLivre(n) {
    slidesBook(indexLivre += n);
}

function slidesBook(n) {
    const slides = document.getElementsByClassName("commentaire");
    if (slides.length !== 0) {
        if (n > slides.length)
        {
            indexLivre = 1;
        }
        if (n < 1)
        {
            indexLivre = slides.length;
        }
        for (let i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        slides[indexLivre - 1].style.display = "block";
    }
}