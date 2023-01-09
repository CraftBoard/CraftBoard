<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include 'common.php';
?>
</head>

<body>
    <div class="container-fluid position-relative bg-white d-flex p-0">
    <div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
    <a href="/" class="navbar-brand mx-4 mb-3">
        <h3 class="text-primary"><i class="fa-solid fa-cube me-2"></i>CraftBoard</h3>
    </a>
    <div class="navbar-nav w-100">
        <a href="/" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Dashboard</a>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-server me-2"></i>Servers</a>
            <div class="dropdown-menu bg-transparent border-0">
            <?php
                    if ($handle = opendir('./files/servers')) {

                        while (false !== ($entry = readdir($handle))) {
                    
                            if ($entry != "." && $entry != "..") {
                    
                                echo '<a href="server.php?server_name=' . $entry . '" class="dropdown-item">'. $entry .'</a>';
                            }
                        }
                    
                        closedir($handle);
                    }
            ?>
            </div>
        </div>
        <a href="templates.php" class="nav-item nav-link"><i class="fa-solid fa-folder me-2"></i>Templates</a>
        <a href="backups.php" class="nav-item nav-link active"><i class="fa-solid fa-floppy-disk me-2"></i>Backups</a>
        <a href="settings.php" class="nav-item nav-link"><i class="fa-solid fa-gear me-2"></i>Settings</a>
        <a href="create.php" class="nav-item nav-link"><i class="fa fa-plus me-2"></i>Create New Server</a>
    </div>
    </nav>
    </div> 
        <div class="content">
            <?php
                include 'navbar.php';
            ?>
            <div class="container-fluid pt-4 px-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                    <?php
                    if ($handle = opendir('./files/backups')) {

                        while (false !== ($entry = readdir($handle))) {
                    
                            if ($entry != "." && $entry != "..") {
                    
                                echo "$entry";
                                echo '<a onclick="return confirm(\'Are you sure?\')" href="backups-delete.php?backup_name=' . $entry . '"><button type="button" class="btn btn-sm btn-danger m-2"><i class="fa-solid fa-trash"></i></button></a>';
                                echo '<a href="backuptotemplate.php?backup_name=' . $entry . '"> <button type="button" class="btn btn-sm btn-secondary m-2">Convert to template</button></a>';
                                echo '<a href="/files/backups/' . $entry . '"><button type="button" class="btn btn-sm btn-secondary m-2">Download</button></a>';
                                echo "<br>";
                            }
                        }
                    
                        closedir($handle);
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>