// This is a sample count, you can replace it with your actual notification count logic
var notificationCount = 5;

// Update the notification count
function updateNotificationCount() {
  var countElement = document.getElementById("notificationCount");
  countElement.textContent = notificationCount.toString();
}

// Attach event listener to the notification button
var notificationButton = document.getElementById("notificationButton");
notificationButton.addEventListener("click", function() {
  // Perform action when the button is clicked
  // For example, open a notification panel or perform an AJAX request
  console.log("Notification button clicked");
});

// Initialize the notification count
updateNotificationCount();
