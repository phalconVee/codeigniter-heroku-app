<?php 
if(empty($userData)){
    echo 'No records available at the moment. Click <a href="'.base_url('social_auth').'">here</a> to go back';
}else{
    
?>

<div class="wrapper">
    <h1>Social Profile Details </h1>
    <?php
    echo '<div class="welcome_txt">Welcome <b>'.$userData['first_name'].'</b></div>';
    echo '<div class="google_box">';
    echo '<p class="image"><img src="'.$userData['picture_url'].'" alt="" width="300" height="220"/></p>';
    echo '<p><b>Social ID : </b>' . $userData['oauth_uid'].'</p>';
    echo '<p><b>Name : </b>' . $userData['first_name'].' '.$userData['last_name'].'</p>';
    echo '<p><b>Email : </b>' . $userData['email'].'</p>';
    echo '<p><b>Gender : </b>' . $userData['gender'].'</p>';
    echo '<p><b>Locale : </b>' . $userData['locale'].'</p>';
    echo '<p><b>Profile Link : </b>' . $userData['profile_url'].'</p>';
    echo '<p><b>You are logged in with : </b>' . $userData['oauth_provider'].'</p>';
    echo '<p><b>Logout from <a href="'.base_url().'social_auth/logout">Profile</a></b></p>';
    echo '</div>';
    ?>
</div>

<?php 
}
?>