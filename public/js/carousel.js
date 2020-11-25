let indexForge = 0;
let indexGrange = 0;
let indexAlcove = 0;

slidesForge();
slidesGrange();
slidesAlcove();

function slidesForge() {
    const slides = document.getElementsByClassName("slides-forge");
    if (slides.length !== 0) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        indexForge++;
        if (indexForge > slides.length) {
            indexForge = 1;
        }
        slides[indexForge - 1].style.display = "block";
        setTimeout(slidesForge, 4000);
    }
}

function slidesGrange() {
    const slides = document.getElementsByClassName("slides-grange");
    if (slides.length !== 0) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        indexGrange++;
        if (indexGrange > slides.length) {
            indexGrange = 1;
        }
        slides[indexGrange - 1].style.display = "block";
        setTimeout(slidesForge, 4000);
    }
}

function slidesAlcove() {
    const slides = document.getElementsByClassName("slides-alcove");
    if (slides.length !== 0) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        indexAlcove++;
        if (indexAlcove > slides.length) {
            indexAlcove = 1;
        }
        slides[indexAlcove - 1].style.display = "block";
        setTimeout(slidesForge, 4000);
    }
}