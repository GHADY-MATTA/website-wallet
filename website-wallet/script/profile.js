document.addEventListener("DOMContentLoaded", async () => {
    try {
        const response = await fetch("/website-wallet/php/profileData.php");
        const data = await response.json();

        if (data.error) {
            window.location.href = "/website-wallet/front/login.html"; // Redirect if not logged in
            return;
        }

        // Update profile details
        document.getElementById("username").textContent = data.username;
        document.getElementById("email").textContent = data.email;
        document.getElementById("phone").textContent = data.phone || "Not Provided";
        document.getElementById("address").textContent = data.address || "Not Provided";

        // Update greeting message
        document.getElementById("greeting").textContent = "Welcome, " + data.username;
    } catch (error) {
        console.error("Error fetching profile data:", error);
        document.querySelector(".profile-body").innerHTML = `<p style="color:red;">Failed to load profile.</p>`;
    }
});

// Logout functionality
document.getElementById("logout").addEventListener("click", async () => {
    await fetch("/website-wallet/php/logout.php");
    window.location.href = "/website-wallet/front/login.html"; // Redirect to login page
});
