var ctx2 = document.getElementById("doughnut").getContext("2d");
var myChart2 = new Chart(ctx2, {
  type: "doughnut",
  data: {
    labels: ["Customer", "SalesMan", "Store Manager", "Cashier"],

    datasets: [
      {
        label: "Employees",
        data: [42, 20, 2, 2],
        backgroundColor: [
          "#f30707",
          "rgb(19, 0, 230)",
          "rgb(252, 183, 9)",
          "rgb(166, 1, 237)",
        ],
        borderColor: [
          "#f30707",
          "rgb(19, 0, 230)",
          "rgb(252, 183, 9)",
          "rgb(166, 1, 237)",
        ],
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
  },
});
