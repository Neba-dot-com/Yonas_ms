// Get the necessary elements
var editButton = document.getElementById("editButton");
var saveButton = document.getElementById("saveButton");
var cancelButton = document.getElementById("cancelButton");
var edit= document.getElementById("editButton2");
var save= document.getElementById("saveButton2");
var cancel= document.getElementById("cancelButton2");

// Hide the save and cancel buttons initially
saveButton.style.display = "none";
cancelButton.style.display = "none";
save.style.display = "none";
cancel.style.display = "none";

// Add click event listener to the edit button
editButton.addEventListener("click", function() {
  // Show the save and cancel buttons
  saveButton.style.display = "inline-block";
  cancelButton.style.display = "inline-block";
  save.style.display = "inline-block";
  cancel.style.display = "inline-block";
});
