<?php
class Facebook_model extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
 
        $config = array(
                        'appId'  => '109670322488671',
                        'secret' => 'ff293ef5ce709bcf22cd7e8f2bbd9fb2',
                        'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
                        );
 
        $this->load->library('Facebook', $config);
 
        $user = $this->facebook->getUser();
 
        // We may or may not have this data based on whether the user is logged in.
        //
        // If we have a $user id here, it means we know the user is logged into
        // Facebook, but we don't know if the access token is valid. An access
        // token is invalid if the user logged out of Facebook.
        $profile = null;
        if($user)
        {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $profile = $this->facebook->api('/me?fields=id,first_name,last_name,middle_name,gender,picture,username,bio,birthday,email,relationship_status,website,picture');
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
 
        $fb_data = array(
                        'me' => $profile,
                        'uid' => $user,
                        'loginUrl' => $this->facebook->getLoginUrl( 
						array(
							'scope'         => 'email,user_birthday,user_location,user_work_history,user_about_me,user_hometown',
							
						)
			),
                        'logoutUrl' => $this->facebook->getLogoutUrl(),
                    );
 
        $this->session->set_userdata('fb_data', $fb_data);
    }
}