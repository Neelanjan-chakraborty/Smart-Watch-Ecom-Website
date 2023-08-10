document.addEventListener("DOMContentLoaded", function () {
    const description = document.querySelector(".product-description p");
    const readMoreButton = document.querySelector(".read-more-button");

    readMoreButton.addEventListener("click", function () {
        if (description.classList.contains("collapsed")) {
            description.classList.remove("collapsed");
            description.classList.add("expanded");
            readMoreButton.textContent = "Read Less";
        } else {
            description.classList.remove("expanded");
            description.classList.add("collapsed");
            readMoreButton.textContent = "Read More";
        }
    });
});
