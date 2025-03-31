//Funcția pentru schimbarea imaginilor
function moveSlide(direction, carouselId) {
    var carousel = document.getElementById(carouselId);
    var slides = carousel.getElementsByClassName('carousel-item');
    var slideCount = slides.length;

    // Obține indexul curent al imaginii vizibile
    var currentIndex = parseInt(carousel.getAttribute('data-current-index')) || 0;

    // Calculăm noul index
    var newIndex = currentIndex + direction;

    // Dacă noul index depășește limita, îl resetăm
    if (newIndex >= slideCount) {
        newIndex = 0;
    } else if (newIndex < 0) {
        newIndex = slideCount - 1;
    }

    // Schimbăm poziția caruselului
    carousel.style.transform = 'translateX(' + (-newIndex * 100) + '%)';
    carousel.setAttribute('data-current-index', newIndex);  // Actualizăm indexul curent
}

