function LogoutConfirmation() {
  var modal = document.getElementById("confirmationModal");
  modal.style.display = "block";
}

function hideConfirmationModal() {
  var modal = document.getElementById("confirmationModal");
  modal.style.display = "none";
}

function logout() {
  // Logout logic goes here
  console.log("User logged out!");
  // Perform any necessary logout actions, such as clearing session data, redirecting, etc.

  hideConfirmationModal(); // Hide the confirmation modal after logout
}