<div id="sidebar" class="position-fixed bg-white">
                <ul class="p-0">
                    <li class="ms-2">
                        <a href="../pages/authors.php" class="text-dark fs-5 fw-bolder <?php if ($_SESSION['page']=='authors') echo 'active-icon'  ?> sidebar-item mt-3 text center" style="text-decoration: none;display: block;">
                            <i class="fa-solid fa-person fs-4 "></i><span class="ms-2 fs-5 fw-bolder">Authors</span></a>
                    </li>
                    <li class="ms-2">
                        <a href="../pages/dashboard.php" class="text-dark fs-5 fw-bolder <?php if ($_SESSION['page']=='dashboard') echo 'active-icon'  ?> sidebar-item mt-3 text center" style="text-decoration: none;display: block;">
                            <i class="fa-solid fa-chart-line fs-5" ></i><span class="ms-2 fs-5 fw-bolder">Dashboad</span></a>
                    </li>
                    <li class="ms-2">
                        <a href="../pages/categories.php" class="text-dark fs-5 fw-bolder <?php if ($_SESSION['page']=='categories') echo 'active-icon'  ?> sidebar-item mt-3 text center" style="text-decoration: none;display: block;">
                            <i class="fa-solid fa-list fs-5"></i><span class="ms-2 fs-5 fw-bolder">Categories</span></a>
                    </li>
                </ul>
</div>