<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['manager_user'])) {

    header("location:../Admin/log.php");
    exit();
}

// Rest of the code for the protected page

// Prevent caching
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");
header("Pragma: no-cache");
?>


<!DOCTYPE html>
<html>
<head>
  <style>
    /* CSS styles */
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    tr:hover {
      background-color: #f5f5f5;
    }
  </style>
</head>
<body>
  <table id="pharmacyTable">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Pharmacy Name</th>
        <th>Pharmacy Address</th>
      </tr>
    </thead>
    <tbody>
      <!-- Table body will be populated dynamically -->
    </tbody>
  </table>

  <script>
    // JavaScript code to populate the table dynamically
    const data = [
      { firstName: 'John', lastName: 'Doe', pharmacyName: 'Pharma Plus', pharmacyAddress: '123 Main St' },
      { firstName: 'Jane', lastName: 'Smith', pharmacyName: 'MediMart', pharmacyAddress: '456 Elm St' },
      // Add more data as needed
    ];

    const tableBody = document.querySelector('#pharmacyTable tbody');

    // Iterate through the data and create table rows
    data.forEach(item => {
      const row = document.createElement('tr');
      row.innerHTML = `
        <td>${item.firstName}</td>
        <td>${item.lastName}</td>
        <td>${item.pharmacyName}</td>
        <td>${item.pharmacyAddress}</td>
      `;
      tableBody.appendChild(row);
    });
  </script>
  <button class="them-btn detail-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35.032" height="35.032" viewBox="0 0 38.032 38.032"><g id="Icon_feather-sun" data-name="Icon feather-sun" transform="translate(-0.5 -0.5)"><path id="Path_1389" data-name="Path 1389" d="M26.878,18.689A8.189,8.189,0,1,1,18.689,10.5,8.189,8.189,0,0,1,26.878,18.689Z" transform="translate(0.827 0.827)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1390" data-name="Path 1390" d="M18,1.5V4.776" transform="translate(1.516)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1391" data-name="Path 1391" d="M18,31.5v3.276" transform="translate(1.516 2.756)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1392" data-name="Path 1392" d="M6.33,6.33,8.656,8.656" transform="translate(0.444 0.444)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1393" data-name="Path 1393" d="M27.54,27.54l2.326,2.326" transform="translate(2.392 2.392)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1394" data-name="Path 1394" d="M1.5,18H4.776" transform="translate(0 1.516)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1395" data-name="Path 1395" d="M31.5,18h3.276" transform="translate(2.756 1.516)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1396" data-name="Path 1396" d="M6.33,29.866,8.656,27.54" transform="translate(0.444 2.392)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/><path id="Path_1397" data-name="Path 1397" d="M27.54,8.656,29.866,6.33" transform="translate(2.392 0.444)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/></g></svg>
                </button>
                <button class="notif-btn detail-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32.133" height="32.133" viewBox="0 0 32.133 32.133"><g id="vuesax_linear_notification" data-name="vuesax/linear/notification" transform="translate(-171 -188)"><g id="notification" transform="translate(171 188)"><path id="Vector" d="M10.773,0A8.04,8.04,0,0,0,2.739,8.033V11.9a6.4,6.4,0,0,1-.763,2.758L.436,17.218a2.57,2.57,0,0,0,1.446,3.923,28.011,28.011,0,0,0,17.767,0A2.681,2.681,0,0,0,21.1,17.218l-1.54-2.557a6.574,6.574,0,0,1-.75-2.758V8.033A8.057,8.057,0,0,0,10.773,0Z" transform="translate(5.321 3.896)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-width="1.5"/><path id="Vector-2" data-name="Vector" d="M4.954,1.687a8.106,8.106,0,0,0-1.285-.268A9.043,9.043,0,0,0,0,1.687a2.662,2.662,0,0,1,4.954,0Z" transform="translate(13.616 2.597)" fill="none" stroke="var(--white)" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/><path id="Vector-3" data-name="Vector" d="M8.033,0A4.028,4.028,0,0,1,4.017,4.017,4.031,4.031,0,0,1,1.178,2.838,4.031,4.031,0,0,1,0,0" transform="translate(12.077 25.519)" fill="none" stroke="var(--white)" stroke-width="1.5"/><path id="Vector-4" data-name="Vector" d="M0,0H32.133V32.133H0Z" fill="none" opacity="0"/></g></g></svg>
                    <span class="notif-span">5</span>
                </button>
</body>
</html>
