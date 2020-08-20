<style>
    body{
        height: 1400px;
    }
    #userpic{
    border-radius: 50%;
    width: 24px;
    height: 24px;
    margin-right: 5px;
}
</style>

<!-- Header Begin -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="#" style="margin-right:50px;">MaSkShop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img id="userpic" src="<?php echo $pic.'Houbet.jpg' ?>" alt="">
                     Houssam
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fa fa-pencil" aria-hidden="true" style="margin-right:5px;"></i> Edite Profile</a>
                    <a class="dropdown-item" href="#"><i class="fa fa-cogs" aria-hidden="true" style="margin-right:5px;"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true" style="margin-right:5px;"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
<!-- Header End -->