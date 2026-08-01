import '@fortawesome/fontawesome-free/css/all.min.css';

// scroll navbar
document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const links = navbar.querySelectorAll("a");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("bg-gray-100", "shadow-md");
            navbar.classList.remove("bg-transparent");

            links.forEach(link => {
                link.classList.remove("text-white");
                link.classList.add("text-black");
            });

        } else {
            navbar.classList.remove("bg-gray-100", "shadow-md");
            navbar.classList.add("bg-transparent");

            links.forEach(link => {
                link.classList.remove("text-black");
                link.classList.add("text-white");
            });
        }
    });
});
// ----------------

// mobile drawer 
document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("mobile-toggle");
    const toggleIcon = document.getElementById("mobile-toggle-icon");
    const drawer = document.getElementById("mobile-drawer");
    const overlay = document.getElementById("mobile-overlay");

    const openDrawer = () => {
        drawer.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
        toggleIcon.classList.remove("fa-bars");
        toggleIcon.classList.add("fa-xmark");
        toggleBtn.setAttribute("aria-expanded", "true");
    };

    const closeDrawer = () => {
        drawer.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
        toggleIcon.classList.add("fa-bars");
        toggleIcon.classList.remove("fa-xmark");
        toggleBtn.setAttribute("aria-expanded", "false");
    };

    toggleBtn.addEventListener("click", () => {
        const isOpen = !drawer.classList.contains("-translate-x-full");
        isOpen ? closeDrawer() : openDrawer();
    });

    overlay.addEventListener("click", closeDrawer);

    drawer.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", closeDrawer);
    });
});
