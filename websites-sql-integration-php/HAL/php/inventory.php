<?php
session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: form.php");
    exit;
}

$db = new mysqli("localhost", "root", "", "halinventory");

if ($db->connect_error) die("Database Error");

/* DELETE */

if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $db->query("DELETE FROM `hal aerospace` WHERE id=$id");
    header("Location: inventory.php");
    exit;
}

/* ADD / UPDATE */

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = (int)($_POST['id'] ?? 0);
    $model = $_POST['model_name'];
    $undelivered = (int)$_POST['undelivered'];
    $ready = (int)$_POST['ready_to_fly'];
    $testing = (int)$_POST['under_testing'];
    $development = (int)$_POST['under_development'];
    $delivered = (int)$_POST['delivered'];

    if ($id) {

        $stmt = $db->prepare("
            UPDATE `hal aerospace`
            SET model_name=?,
                undelivered=?,
                ready_to_fly=?,
                under_testing=?,
                under_development=?,
                delivered=?
            WHERE id=?
        ");

        $stmt->bind_param(
            "siiiiii",
            $model,
            $undelivered,
            $ready,
            $testing,
            $development,
            $delivered,
            $id
        );

    } else {

        $stmt = $db->prepare("
            INSERT INTO `hal aerospace`
            (model_name,undelivered,ready_to_fly,under_testing,under_development,delivered)
            VALUES (?,?,?,?,?,?)
        ");

        $stmt->bind_param(
            "siiiii",
            $model,
            $undelivered,
            $ready,
            $testing,
            $development,
            $delivered
        );
    }

    $stmt->execute();

    header("Location: inventory.php");
    exit;
}

/* EDIT */

$edit = null;

if (isset($_GET['edit'])) {

    $id = (int)$_GET['edit'];

    $edit = $db
        ->query("SELECT * FROM `hal aerospace` WHERE id=$id")
        ->fetch_assoc();
}

/* ALL DATA */

$data = $db->query("
    SELECT *
    FROM `hal aerospace`
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width,initial-scale=1">

<title>HAL Inventory</title>

<style>

* {
    box-sizing:border-box;
}

body {
    margin:0;

    font-family:Arial,sans-serif;

    background:
        linear-gradient(
            135deg,
            #001f3f,
            #002b52,
            #001a35
        );

    color:white;
}

/* NAVBAR */

.nav {
    height:70px;

    background:#002b52;

    display:flex;
    align-items:center;
    justify-content:space-between;

    padding:0 45px;
}

.logo {
    font-size:21px;
    font-weight:bold;
}

.nav a {
    color:white;
    text-decoration:none;
}

/* MAIN */

.container {
    max-width:1500px;
    margin:auto;
    padding:35px;
}

/* CARD */

.card {
    background:rgba(255,255,255,.92);

    color:#002b52;

    padding:25px;

    border-radius:12px;

    box-shadow:
        0 12px 35px rgba(0,0,0,.25);

    margin-bottom:25px;
}

/* FORM */

.form-grid {
    display:grid;

    grid-template-columns:
        repeat(3,1fr);

    gap:15px;
}

input {
    width:100%;

    padding:11px;

    border:1px solid #ccd6df;

    border-radius:6px;
}

label {
    display:block;

    margin-bottom:6px;

    font-weight:bold;
}

button {
    border:0;

    padding:11px 20px;

    border-radius:6px;

    background:#002b52;

    color:white;

    cursor:pointer;
}

button:hover {
    background:#004474;
}

/* TABLE */

.table-wrapper {
    overflow-x:auto;
}

table {
    width:100%;

    border-collapse:collapse;
}

th {
    background:#002b52;
    color:white;
}

th,td {
    padding:12px;

    border-bottom:1px solid #ddd;

    text-align:center;
}

td:first-child,
th:first-child {
    text-align:left;
}

/* ACTIONS */

.edit {
    color:#005b91;

    text-decoration:none;

    font-weight:bold;
}

.delete {
    color:#b00020;

    text-decoration:none;

    font-weight:bold;

    margin-left:12px;
}

/* RESPONSIVE */

@media(max-width:900px) {

    .form-grid {
        grid-template-columns:1fr;
    }

    .container {
        padding:20px;
    }

}

</style>

</head>

<body>


<!-- NAVBAR -->

<div class="nav">

    <div class="logo">
        HAL INVENTORY
    </div>

    <a href="dashboard.php">
        ← Dashboard
    </a>

</div>


<div class="container">


<!-- ADD / UPDATE -->

<div class="card">

    <h2>
        <?= $edit ? "Update Inventory" : "Add Inventory" ?>
    </h2>

    <form method="POST">

        <?php if ($edit): ?>

            <input
                type="hidden"
                name="id"
                value="<?= $edit['id'] ?>"
            >

        <?php endif; ?>


        <div class="form-grid">


            <div>

                <label>Model Name</label>

                <input
                    type="text"
                    name="model_name"
                    required
                    value="<?= htmlspecialchars($edit['model_name'] ?? '') ?>"
                >

            </div>


            <div>

                <label>Undelivered</label>

                <input
                    type="number"
                    name="undelivered"
                    min="0"
                    value="<?= $edit['undelivered'] ?? 0 ?>"
                >

            </div>


            <div>

                <label>Ready To Fly</label>

                <input
                    type="number"
                    name="ready_to_fly"
                    min="0"
                    value="<?= $edit['ready_to_fly'] ?? 0 ?>"
                >

            </div>


            <div>

                <label>Under Testing</label>

                <input
                    type="number"
                    name="under_testing"
                    min="0"
                    value="<?= $edit['under_testing'] ?? 0 ?>"
                >

            </div>


            <div>

                <label>Under Development</label>

                <input
                    type="number"
                    name="under_development"
                    min="0"
                    value="<?= $edit['under_development'] ?? 0 ?>"
                >

            </div>


            <div>

                <label>Delivered</label>

                <input
                    type="number"
                    name="delivered"
                    min="0"
                    value="<?= $edit['delivered'] ?? 0 ?>"
                >

            </div>

        </div>


        <br>

        <button type="submit">

            <?= $edit ? "Update Inventory" : "Add Inventory" ?>

        </button>


        <?php if ($edit): ?>

            <a href="inventory.php"
               style="margin-left:15px">

                Cancel

            </a>

        <?php endif; ?>

    </form>

</div>


<!-- INVENTORY TABLE -->

<div class="card">

    <h2>Inventory</h2>

    <div class="table-wrapper">

        <table>

            <tr>

                <th>ID</th>

                <th>Model</th>

                <th>Undelivered</th>

                <th>Ready To Fly</th>

                <th>Testing</th>

                <th>Development</th>

                <th>Delivered</th>

                <th>Actions</th>

            </tr>


            <?php while ($row = $data->fetch_assoc()): ?>

            <tr>

                <td>
                    <?= $row['id'] ?>
                </td>

                <td>
                    <?= htmlspecialchars($row['model_name']) ?>
                </td>

                <td>
                    <?= $row['undelivered'] ?>
                </td>

                <td>
                    <?= $row['ready_to_fly'] ?>
                </td>

                <td>
                    <?= $row['under_testing'] ?>
                </td>

                <td>
                    <?= $row['under_development'] ?>
                </td>

                <td>
                    <?= $row['delivered'] ?>
                </td>

                <td>

                    <a
                        class="edit"
                        href="?edit=<?= $row['id'] ?>"
                    >
                        Edit
                    </a>

                    <a
                        class="delete"
                        href="?delete=<?= $row['id'] ?>"
                        onclick="return confirm('Delete this inventory record?')"
                    >
                        Delete
                    </a>

                </td>

            </tr>

            <?php endwhile; ?>

        </table>

    </div>

</div>


</div>

</body>
</html> 