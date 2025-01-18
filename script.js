// Image Slider Functionality
const images = document.querySelectorAll('.upper img');
let currentIndex = 0;

function slideImages() {
    images[currentIndex].classList.remove('active'); // Remove active class from current image
    currentIndex = (currentIndex + 1) % images.length; // Move to the next image
    images[currentIndex].classList.add('active'); // Add active class to the new image
}

// Change the image every 5 seconds
setInterval(slideImages, 5000);

// Sidebar Menu Toggle Functionality
function toggleSidebar() {
    const sidebar = document.getElementById("sidebar");
    sidebar.classList.toggle("minimized");
}

// Sidebar Menu Dynamic Content Loading
document.addEventListener("DOMContentLoaded", () => {
    const links = document.querySelectorAll(".menu-items a");
    const content = document.getElementById("content");

    links.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const target = link.getAttribute("data-target");

            // Fetch and display content for the clicked menu item
            let contentHtml = "";
            switch (target) {
                case "transport":
                    contentHtml = "<h1>Transport Services</h1><p>Details about transport services.</p>";
                    break;
                case "soko-errand":
                    contentHtml = "<h1>Soko Errand</h1><p>Details about soko errand services.</p>";
                    break;
                case "deliveries":
                    contentHtml = "<h1>Deliveries</h1><p>Details about delivery services.</p>";
                    break;
                case "shopping-errand":
                    contentHtml = "<h1>Shopping Errand</h1><p>Details about shopping errand services.</p>";
                    break;
                default:
                    contentHtml = "<h1>Welcome to Our Services</h1><p>Select a service from the menu to view details.</p>";
            }
            content.innerHTML = contentHtml;
        });
    });
});
