import '@fortawesome/fontawesome-free/css/all.min.css';

// scroll navbar
document.addEventListener("DOMContentLoaded", () => {
    const navbar = document.getElementById("navbar");
    const links = navbar.querySelectorAll("a");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("bg-white", "shadow-md");
            navbar.classList.remove("bg-transparent");

            // jadi hitam
            links.forEach(link => {
                link.classList.remove("text-white");
                link.classList.add("text-black");
            });

        } else {
            navbar.classList.remove("bg-white", "shadow-md");
            navbar.classList.add("bg-transparent");

            // jadi putih
            links.forEach(link => {
                link.classList.remove("text-black");
                link.classList.add("text-white");
            });
        }
    });
});
// ----------------

