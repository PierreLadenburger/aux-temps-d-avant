let indexAccueil = 0;
slides(indexAccueil);
slidesRec()

function plusSlides(n) {
    slides(indexAccueil += n);
}

function slides(n) {
    const slides = document.getElementsByClassName("slides-accueil");
    if (slides.length !== 0) {
        if (n > slides.length)
        {
            indexAccueil = 1;
        }
        if (n < 1)
        {
            indexAccueil = slides.length;
        }
        for (let i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        slides[indexAccueil - 1].style.display = "block";
    }
}

function slidesRec()
{
    const slides = document.getElementsByClassName("slides-accueil");
    if (slides.length) {
        for (let i = 0; i < slides.length; i++)
        {
            slides[i].style.display = "none";
        }
        indexAccueil++;
        if (indexAccueil > slides.length) {
            indexAccueil = 1;
        }
        slides[indexAccueil - 1].style.display = "block";
        setTimeout(slidesRec, 4000);
    }
}
