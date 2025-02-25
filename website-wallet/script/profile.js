document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch("http://localhost/website-wallet/php/profileData.php");
        const data = await response.json();

        if (data.error) {
            document.querySelector(".profile-body").innerHTML = `<p style="color:red;">${data.error}</p>`;
        } else {
            // Update text content instead of form inputs
            document.getElementById("username").textContent = data.username;
            document.getElementById("email").textContent = data.email;
            document.getElementById("phone").textContent = data.phone || "Not Provided";
            document.getElementById("address").textContent = data.address || "Not Provided";

            // Update greeting with the user's name
            document.getElementById("greeting").textContent = "Welcome, " + data.username;
        }
    } catch (error) {
        console.error("Error fetching profile data:", error);
    }
});
