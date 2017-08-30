<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Social_auth extends CI_Controller
{
    function __construct() {
        parent::__construct();
        // Include the google api php libraries
        include_once APPPATH."libraries/google-api-php-client/Google_Client.php";
        include_once APPPATH."libraries/google-api-php-client/contrib/Google_Oauth2Service.php";
        
        $this->load->config('google');
        $this->load->library('facebook');
        $this->load->model('social');
    }

    public function index() {

        $clientId     = $this->config->item('clientId');
        $clientSecret = $this->config->item('clientSecret');
        $redirectUrl  = $this->config->item('redirectUrl');
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codeigniter Auth app');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        $data['googelAuthUrl']   = $gClient->createAuthUrl();
        $data['facebookAuthUrl'] = $this->facebook->login_url();

        $this->load->view('home', $data);
    }
    
    /**
    initiate google login using OAUTH API 
    **/
    public function google(){        
        
        $clientId     = $this->config->item('clientId');
        $clientSecret = $this->config->item('clientSecret');
        $redirectUrl  = $this->config->item('redirectUrl');
        
        // Google Client Configuration
        $gClient = new Google_Client();
        $gClient->setApplicationName('Login to codeigniter Auth app');
        $gClient->setClientId($clientId);
        $gClient->setClientSecret($clientSecret);
        $gClient->setRedirectUri($redirectUrl);
        $google_oauthV2 = new Google_Oauth2Service($gClient);

        if (isset($_REQUEST['code'])) {
            $gClient->authenticate();
            $this->session->set_userdata('token', $gClient->getAccessToken());
            redirect($redirectUrl);
        }

        $token = $this->session->userdata('token');
        if (!empty($token)) {
            $gClient->setAccessToken($token);
        }

        if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'google';
            $userData['oauth_uid']      = $userProfile['id'];
            $userData['first_name']     = $userProfile['given_name'];
            $userData['last_name']      = $userProfile['family_name'];
            $userData['email']          = $userProfile['email'];
            $userData['gender']         = $userProfile['gender'];
            $userData['locale']         = $userProfile['locale'];
            $userData['profile_url']    = $userProfile['link'];
            $userData['picture_url']    = $userProfile['picture'];

            // Insert or update user data
            $userID = $this->social->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData', $userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $data['authUrl'] = $gClient->createAuthUrl();
        }
        $this->load->view('social/index', $data);
    }

    /**
     Initiate facebook login using facebook SDK v5 
    **/
    public function facebook(){

        $userData = array();

        // Check if user is logged in
        if($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $userProfile = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,gender,locale,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid']      = $userProfile['id'];
            $userData['first_name']     = $userProfile['first_name'];
            $userData['last_name']      = $userProfile['last_name'];
            $userData['email']          = $userProfile['email'];
            $userData['gender']         = $userProfile['gender'];
            $userData['locale']         = $userProfile['locale'];
            $userData['profile_url']    = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url']    = $userProfile['picture']['data']['url'];

            // Insert or update user data
            $userID = $this->social->checkUser($userData);

            // Check user data insert or update status
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            }else{
               $data['userData'] = array();
            }

            // Get logout URL
            $data['logoutUrl'] = $this->facebook->logout_url();
        }else{
            $fbuser = '';

            // Get login URL
            $data['authUrl'] =  $this->facebook->login_url();
        }

        // Load login & profile view
        $this->load->view('social/index', $data);
    }
    
    public function logout() {
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userData');
        $this->session->sess_destroy();
        redirect('social_auth');
    }
}