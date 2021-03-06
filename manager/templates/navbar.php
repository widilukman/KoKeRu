<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: ../login.php');
}
$nama = $_SESSION['nama'];
require_once('../functions/db_login.php');
$query_nama = " SELECT * FROM manager ";
$result = $db->query($query_nama);
$row_nama = $result->fetch_object();
if ($nama != $row_nama->nama_manager) {
    header('Location: ../');
}

?>
<!------------------------------------------------------------ NAVBAR ------------------------------------------------------------>
<header class="mdl-layout__header d-print-none">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">
            <span class="material-icons">
                cleaning_services
            </span>
            KoKeRu</span>
        <div class="mdl-layout-spacer"></div>
        <span class="mdl-layout-title">Gedung Bersama Maju</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation -->
        <nav class="mdl-navigation">
            <!-- account button
                        Di screen kecil pindah ke sidebar-->
            <div class="pls-margin-x mdl-layout--large-screen-only">
                <button id="account" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    <span class="material-icons">account_circle</span>
                    <span class="account-name"><?php echo $nama; ?></span>
                </button>
                <!-- list menu saat tombol di click -->
                <ul class="mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect" for="account">
                    <!-- menu yang hanya digunakan pada fase development -->
                    <li class="mdl-menu__item"><a class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent mdl-js-ripple-effect" href="../functions/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>