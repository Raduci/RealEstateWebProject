// Function to change slides
function moveSlide(direction, carouselId) {
    var carousel = document.getElementById(carouselId);
    var slides = carousel.getElementsByClassName('carousel-item');
    var slideCount = slides.length;

    // Get the current index of the visible slide
    var currentIndex = parseInt(carousel.getAttribute('data-current-index')) || 0;

    // Calculate the new index
    var newIndex = currentIndex + direction;

    // If the new index exceeds the limit, reset it
    if (newIndex >= slideCount) {
        newIndex = 0;
    } else if (newIndex < 0) {
        newIndex = slideCount - 1;
    }

    // Change the position of the carousel
    carousel.style.transform = 'translateX(' + (-newIndex * 100) + '%)';
    carousel.setAttribute('data-current-index', newIndex);  // Update the current index
}

// Function to add swipe listener
function addSwipeListener(carouselId) {
    var carousel = document.getElementById(carouselId);
    var startX;

    carousel.addEventListener('touchstart', function(event) {
        startX = event.touches[0].clientX;
    });

    carousel.addEventListener('touchend', function(event) {
        var endX = event.changedTouches[0].clientX;
        var deltaX = endX - startX;

        if (deltaX > 50) {
            // Swipe right
            moveSlide(-1, carouselId);
        } else if (deltaX < -50) {
            // Swipe left
            moveSlide(1, carouselId);
        }
    });
}

// Function to start autoplay
function startAutoplay(carouselId, interval) {
    setInterval(function() {
        moveSlide(1, carouselId);
    }, interval);
}

// Add swipe listener and start autoplay for each carousel
document.addEventListener('DOMContentLoaded', function() {
    var carousels = ['carousel1', 'carousel2', 'carousel3'];
    carousels.forEach(function(carouselId) {
        addSwipeListener(carouselId);
        startAutoplay(carouselId, 3000); // Autoplay interval set to 3000ms (3 seconds)
    });
});