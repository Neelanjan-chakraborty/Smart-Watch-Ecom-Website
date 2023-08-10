<div class="modal" id="termsModal">
  <div class="modal-content">
    <div class="avatar">
      <img src="res/AVATAR.png" alt="Avatar">
    </div>
    <div class="terms">
      <h2>Welcome to Our E-commerce Site</h2>
      <p>This e-commerce project is a property of Neelanjan Chakraborty and is made for submission to Hyscaler.</p>
      <p>Please read and agree to our terms and conditions:</p>
      <p>
        By using this website, you agree to the following terms and conditions:
      </p>
      <ul>
        <li>This website is for educational purposes and demonstration only.</li>
        <li>The products listed are not real and cannot be purchased.</li>
        <li>No actual transactions can be made on this site.</li>
        <li>This site is not affiliated with any real e-commerce company.</li>
        <li>Your usage of this website is subject to monitoring and data collection for educational purposes.</li>
      </ul>
      <p>
        Please note that this website is a demonstration project and is not meant for real-world transactions. By clicking "I Agree," you acknowledge and accept the terms and conditions outlined above.
      </p>
      <button id="agreeButton">I Agree</button>
    </div>
  </div>
</div>
<style>
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  backdrop-filter: blur(10px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 1000;
  display: none;
}
h2{
  color: :#1877F2;
}
.modal-content {
  background-color: azure;
  padding: 20px;
  border-radius: 10px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  width: 80%;
  max-width: 400px;
}

.avatar img {
    width: 160px;
    height: 160px;
    border-radius: 10%;
    margin-bottom: 10px;
    border: 10px;
    border-color: #1877F2;
}
.avatar{
    border: 10px;
    border-color: #1877F2;
}
.terms {
  margin-top: 20px;
  color: black;
}

#agreeButton {
    display: inline-block;
    height: 40px;
    width: 150px;
    border-radius: 20px;
    margin: 10px 0;
    background-color: #1877F2 !important;
    border: none;
    user-select: none;
    outline: none;
    color: azure;
    font-weight: 600;
    cursor: pointer;
    transition: opacity 0.2s, box-shadow 0.2s;
    box-shadow: 0 0 10px #1877F2 !important;
}

</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("termsModal");
    const agreeButton = document.getElementById("agreeButton");

    // Show modal when page loads for new users
    modal.style.display = "flex";

    // Hide modal and unblur background when "I Agree" button is clicked
    agreeButton.addEventListener("click", function () {
        modal.style.display = "none";
        document.body.style.overflow = "auto"; // Restore scrolling
    });
});

</script