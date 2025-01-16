const images = document.querySelectorAll('.upper img');
let currentIndex = 0;

function slideImages() {
    images[currentIndex].classList.remove('active'); // Remove active class from current image
    currentIndex = (currentIndex + 1) % images.length; // Move to the next image
    images[currentIndex].classList.add('active'); // Add active class to the new image
}

// Change the image every 5 seconds
setInterval(slideImages, 5000);
