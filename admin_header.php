<!-- Burger Shot Header -->
<header class="header_burgershot">
    <nav class="navigation_burgershot">
        <div class="navigation_logo">
			<a href="index.php">
            	<img src="images/logo/burger-logo.png" alt="Burger Shot Logo">
            </a>
            <h1 class="restaurant-name">Burger Shot</h1>
        </div>
        <div class="navigation_right">
            <div class="navigation_profile">
                <p>Hi, Admin!</p>
                <img src="profile/admin.jpg" alt="Profile" id="img-profile">
                <div class="navigation_profile-dropdown">
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-chart-line"></i></p>
                        <p class="links"><a href="admin_dashboard.php">Admin Dashboard</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-user-group"></i></p>
                        <p class="links"><a href="admin_accounts.php">Client Accounts</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-circle-info"></i></p>
                        <p class="links"><a href="admin_clients-info.php">Client Information</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-envelope"></i></p>
                        <p class="links"><a href="admin_messages.php">Clients Message</a></p>
                    </div>
                    <div class="dropdown_links">
                        <p class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></p>
                        <p class="links"><a href="signout.php">Sign Out</a></p>
                    </div>
                </div>
            </div>
            <label for="hamburger-menu" class="navigation_responsive" id="navigation_responsive">
                <input type="checkbox" id="hamburger-menu" aria-label="Hamburger Navigation">
                <div class="hamburger-menu">
                    <div class="line-top"></div>
                    <div class="line-middle"></div>
                    <div class="line-bottom"></div>
                </div>
            </label>
        </div>
    </nav>
</header>

<!-- Burger Shot Loader -->
<div class="loader_burgershot">
    <div class="container">
        <div></div><div></div>
        <p>Loading</p>
    </div>
</div>