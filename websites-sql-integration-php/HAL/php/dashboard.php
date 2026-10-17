<?php
// Start the session.
session_start();

// Redirect users who are not logged in.
if (!isset($_SESSION['logged_in'])) {
    header("Location: form.php");
    exit;
}

// Connect to the database.
$db = new mysqli("localhost", "root", "", "halinventory");

// Stop if the database connection fails.
if ($db->connect_error) die("Database Error");

// Get overall inventory statistics.
$q = $db->query("SELECT
    SUM(delivered) delivered,
    SUM(undelivered) undelivered,
    SUM(ready_to_fly) ready,
    SUM(under_testing) testing,
    SUM(under_development) development
    FROM `hal aerospace`");

// Store the statistics in an array.
$s = $q->fetch_assoc();

// Get the number of aircraft for each model.
$models = $db->query("
    SELECT model_name, COUNT(*) total
    FROM `hal aerospace`
    GROUP BY model_name
    ORDER BY total DESC
");

// Create arrays for the model names and counts.
$names = [];
$counts = [];

// Add each model and its count to the arrays.
while ($m = $models->fetch_assoc()) {
    $names[] = $m['model_name'];
    $counts[] = $m['total'];
}

// Close the database connection.
$db->close();
?>

<!DOCTYPE html>
<html>
<head>

<!-- Set the character encoding. -->
<meta charset="UTF-8">

<!-- Make the page responsive on different screens. -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>HAL Inventory Dashboard</title>

<!-- Load Chart.js for creating graphs. -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* Include padding and borders in element dimensions. */
*{box-sizing:border-box}

body{
    margin:0;
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#001f3f,#002b52,#001a35);
    color:white;
}

/* ==================== NAVBAR ==================== */

.nav{
    height:70px;
    background:#002b52;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 45px;
}

.logo{
    font-size:21px;
    font-weight:bold;
}

.nav select{
    padding:9px 14px;
    border:0;
    border-radius:6px;
}


/* ==================== MAIN CONTAINER ==================== */

.container{
    max-width:1450px;
    margin:auto;
    padding:35px;
}


/* ==================== SEARCH BAR ==================== */

.search{
    width:100%;
    padding:15px 20px;
    border:0;
    border-radius:8px;
    font-size:15px;
    margin-bottom:25px;
}


/* ==================== DASHBOARD CARDS ==================== */

.grid{
    display:grid;
    grid-template-columns:1fr 1fr 1fr;
    gap:22px;
}

.card{
    background:rgba(255,255,255,.90);
    color:#002b52;
    padding:25px;
    border-radius:12px;
    box-shadow:0 12px 35px rgba(0,0,0,.25);
}

.card h3{
    margin-top:0;
}

/* Set the height of chart containers. */
.chart{
    height:260px;
}


/* ==================== ADMIN BUTTONS ==================== */

.admin{
    margin-top:20px;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:15px;
}

.admin button{
    padding:17px;
    border:0;
    border-radius:7px;
    background:white;
    color:#002b52;
    font-weight:bold;
    cursor:pointer;
}

/* Change the button color when hovered. */
.admin button:hover{
    background:#dcecff;
}


/* ==================== RESPONSIVE DESIGN ==================== */

/* Adjust the layout for smaller screens. */
@media(max-width:900px){

    .grid{
        grid-template-columns:1fr;
    }

    .admin{
        grid-template-columns:1fr 1fr;
    }

}

</style>

</head>

<body>


<!-- ==================== NAVBAR ==================== -->

<div class="nav">

    <div class="logo">HAL INVENTORY</div>

    <!-- Navigate to different pages using the dropdown. -->
    <select onchange="location.href=this.value">

        <option>Menu</option>
        <option value="dashboard.php">Dashboard</option>
        <option value="inventory.php">Inventory</option>
        <option value="users.php">Users</option>
        <option value="reports.php">Reports</option>
        <option value="logout.php">Logout</option>

    </select>

</div>


<div class="container">


<!-- ==================== SEARCH ==================== -->

<input
    class="search"
    type="search"
    placeholder="Search aircraft, model or inventory..."
>


<!-- ==================== DASHBOARD ==================== -->

<div class="grid">


    <!-- Show delivery statistics. -->

    <div class="card">

        <h3>Delivery Status</h3>

        <div class="chart">
            <canvas id="delivery"></canvas>
        </div>

        <p>
            Delivered:
            <b><?= $s['delivered'] ?></b>
        </p>

        <p>
            Undelivered:
            <b><?= $s['undelivered'] ?></b>
        </p>

    </div>


    <!-- Show aircraft status statistics. -->

    <div class="card">

        <h3>Aircraft Status</h3>

        <div class="chart">
            <canvas id="status"></canvas>
        </div>

    </div>


    <!-- Show mailbox information. -->

    <div class="card">

        <h3>Mailbox</h3>

        <p>📩 You have new messages</p>

        <button onclick="location.href='www.gmail.com'">
            Open Mailbox
        </button>

    </div>

</div>


<!-- ==================== MODEL GRAPH ==================== -->

<div class="card" style="margin-top:25px">

    <h3>Aircraft Model Distribution</h3>

    <div class="chart">
        <canvas id="models"></canvas>
    </div>

</div>


<!-- ==================== ADMIN CONTROLS ==================== -->

<div class="card" style="margin-top:25px">

    <h3>Administration</h3>

    <div class="admin">

        <!-- Open the inventory page. -->
        <button onclick="location.href='inventory.php'">
            📦 Inventory
        </button>

        <!-- Open the add aircraft page. -->
        <button onclick="location.href='add.php'">
            ➕ Add Aircraft
        </button>

        <!-- Open the users page. -->
        <button onclick="location.href='users.php'">
            👤 Users
        </button>

        <!-- Open the reports page. -->
        <button onclick="location.href='reports.php'">
            📊 Reports
        </button>

        <!-- Open the orders page. -->
        <button onclick="location.href='orders.php'">
            🚚 Orders
        </button>

        <!-- Open the mail page. -->
        <button onclick="location.href='mail.php'">
            ✉️ Mail
        </button>

        <!-- Open the settings page. -->
        <button onclick="location.href='settings.php'">
            ⚙️ Settings
        </button>

        <!-- Log the user out. -->
        <button onclick="location.href='logout.php'">
            🚪 Logout
        </button>

    </div>

</div>

</div>


<script>

/* ==================== DELIVERY CHART ==================== */

// Create a doughnut chart for delivery status.
new Chart(document.getElementById('delivery'),{

    type:'doughnut',

    data:{
        labels:['Delivered','Undelivered'],

        datasets:[{
            data:[
                <?= $s['delivered'] ?>,
                <?= $s['undelivered'] ?>
            ]
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false
    }

});


/* ==================== AIRCRAFT STATUS ==================== */

// Create a bar chart for aircraft status.
new Chart(document.getElementById('status'),{

    type:'bar',

    data:{

        labels:[
            'Ready to Fly',
            'Under Testing',
            'Under Development'
        ],

        datasets:[{

            data:[
                <?= $s['ready'] ?>,
                <?= $s['testing'] ?>,
                <?= $s['development'] ?>
            ]

        }]

    },

    options:{
        responsive:true,
        maintainAspectRatio:false,

        // Hide the chart legend.
        plugins:{
            legend:{display:false}
        }
    }

});


/* ==================== MODEL CHART ==================== */

// Create a bar chart showing aircraft by model.
new Chart(document.getElementById('models'),{

    type:'bar',

    data:{

        // Convert the PHP model array into JavaScript.
        labels:<?= json_encode($names) ?>,

        datasets:[{

            label:'Aircraft',

            // Convert the PHP count array into JavaScript.
            data:<?= json_encode($counts) ?>

        }]

    },

    options:{

        responsive:true,
        maintainAspectRatio:false,

        // Hide the chart legend.
        plugins:{
            legend:{display:false}
        }

    }

});

</script>

</body>
</html>

