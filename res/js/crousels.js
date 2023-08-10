document.addEventListener("DOMContentLoaded", function () {
    const slideContainer = document.querySelector(".slide-container");
    
    window.addEventListener("scroll", function () {
        const scrollTop = window.scrollY;
        slideContainer.style.setProperty("--offset", scrollTop);
    });
});
