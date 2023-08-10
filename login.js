document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".login-form");
    const customDialog = document.getElementById("custom-dialog");
    const customDialogMessage = document.getElementById("custom-dialog-message");
    const customDialogButton = document.getElementById("custom-dialog-button");
    const warning = document.getElementById("login-warning");

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch("login.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(result => {
            if (result === "success") {
                window.location.href = "index.php";
            } else if (result === "error") {
                customDialogMessage.textContent = "Incorrect credentials. Please try again.";
                customDialog.style.display = "flex";
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });

    customDialogButton.addEventListener("click", function () {
        customDialog.style.display = "none";
    });
});
