<?php 

	session_start();
	include 'init.php';

// Get the User ID from Session
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
function getSingleValue($con, $sql, $parameters){
    $q = $con->prepare($sql);
    $q->execute($parameters);
    return $q->fetchColumn();
}
$userid = getSingleValue($con, "SELECT UserID FROM users WHERE username=?", [$_SESSION['user']]);

// Select All Data Depend On This ID

$stmt = $con->prepare("SELECT * FROM users WHERE UserID = ? LIMIT 1");

// Execute Query

$stmt->execute(array($userid));

// Fetch The Data

$row = $stmt->fetch();

// The Row Count

$count = $stmt->rowCount();

// If There's Such ID Show The Form

if ($count > 0) { ?>

    <h1 class="text-center">Edit My Informations</h1>
    <div class="container">
        <form class="form-horizontal" action="UpdateProfile.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="userid" value="<?php echo $userid ?>" />
            <!-- Start Username Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Username</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="username" class="form-control" value="<?php echo $row['Username'] ?>" autocomplete="off"/>
                </div>
            </div>
            <!-- End Username Field -->
            <!-- Start Password Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10 col-md-6">
                    <input type="hidden" name="oldpassword" value="<?php echo $row['Password'] ?>" />
                    <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want To Change" />
                </div>
            </div>
            <!-- End Password Field -->
            <!-- Start Email Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10 col-md-6">
                    <input type="email" name="email" value="<?php echo $row['Email'] ?>" class="form-control"/>
                </div>
            </div>
            <!-- End Email Field -->
            <!-- Start Full Name Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Full Name</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="full" value="<?php echo $row['FullName']; }?>" class="form-control"x />
                </div>
            </div>
            <!-- End Full Name Field -->
            <!-- Start Submit Field -->
            <div class="form-group form-group-lg">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" value="Save" class="btn btn-primary btn-lg" />
                </div>
            </div>
            <!-- End Submit Field -->
        </form>
    </div>


<?php include $tpl . 'footer.php'; ?>