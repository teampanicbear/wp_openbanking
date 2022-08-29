<?php

class RF_API
{
    public static function getAccessToken()
    {
        $auth = get_transient('rf_auth');

        $apiKey = 'ifIcVu7Wa%2B%2Fw%2FpWITl48RTILSa01SnMEtpHrHp2qBSBBNsg3B%2FThj4brCVtc9uGU';

        if (empty($auth)) {
            $endpoint = 'https://api.dform.recruitfirst.co/api/auth/login';
            $body = [
                'Realm' => 'rf',
                'Accountcode' => $apiKey,
            ];

            $body = wp_json_encode($body);

            $options = [
                'body' => $body,
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'timeout' => 60,
                'redirection' => 5,
                'blocking' => true,
                'httpversion' => '1.0',
                'sslverify' => false,
                'data_format' => 'body',
            ];

            $response = wp_remote_post($endpoint, $options);

            if (!is_wp_error($response)) {
                set_transient('rf_auth', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 2);
                return json_decode(wp_remote_retrieve_body($response));
            }
        }

        return json_decode($auth);
    }

    public static function requestGET($url)
    {
        $auth = self::getAccessToken();
        $response = wp_remote_get($url,
            array(
                'headers' => array(
                    'Authorization' => $auth->token,
                    'TokenTimeStamp' => $auth->tokenGen,
                    'Content-Type' => 'application/json'
                )
            )
        );

        return $response;
    }

    public static function requestPOST($url, $body)
    {
        $auth = self::getAccessToken();
        $response = wp_remote_post($url,
            array(
                'headers' => array(
                    'Authorization' => $auth->token,
                    'TokenTimeStamp' => $auth->tokenGen,
                    'Content-Type' => 'application/json'
                ),
                'body' => wp_json_encode($body)
            )
        );

        return $response;
    }

    public static function get_jobs($page = 1, $limit = 10, $country = null, $area = null, $industry = null, $jobtype = null, $title = null)
    {
        $data = [];
        $url = 'https://api.dform.recruitfirst.co/api/jobposting/search?pagesize=' . $limit . '&page=' . $page . '&jobTitle=' . urlencode($title) . '&countryIds=' . $country . '&industryIds=' . $industry . '&roleTypeIds=' . $jobtype . '';
        if ($country === '185' || $country === '95') {
            $url .= '&landmarkIds=' . $area;
        } else {
            $url .= '&cityIds=' . $area;
        }
        $response = self::requestGET($url);

        $response_code = wp_remote_retrieve_response_code($response);

        if ($response && $response_code == 200) {
            $data['paging'] = json_decode($response['headers']['paging-headers']);
            $data['body'] = json_decode(wp_remote_retrieve_body($response));
        }
        return $data;
    }

    public static function get_jobs_by_country($countryCode, $limit = 20, $page = 1)
    {
        $data = [];
        $countries_map = array(
            'hk' => 95,
            'tw' => 207,
            'id' => 99,
            'my' => 128,
            'cn' => 44,
            'sg' => 185
        );
        $countryId = $countries_map[strtolower($countryCode)] ? $countries_map[strtolower($countryCode)] : 185;

        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/search?pagesize=' . $limit . '&page=' . $page . '&countryIds=' . $countryId . '');

        $response_code = wp_remote_retrieve_response_code($response);

        if ($response && $response_code == 200) {
            $data = json_decode(wp_remote_retrieve_body($response));
        }
        return $data->data;
    }

    public static function get_job_details($job_id = null)
    {
        if (!$job_id) return '';

        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/' . $job_id . '');

        return json_decode(wp_remote_retrieve_body($response));
    }

    public static function get_related_jobs($job_id = null, $limit = 10, $matchcountry = true)
    {
        if (!$job_id) return [];

        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/search/related?jobid=' . $job_id . '&resultcount=' . $limit . '&matchcountry=true');

        return json_decode(wp_remote_retrieve_body($response));
    }

    public static function get_locations()
    {

//        delete_transient('rf_locations_list');
        $locations_list = get_transient('rf_locations_list');

        if (empty($locations_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/ourlocations');

            set_transient('rf_locations_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($locations_list);
    }

    public static function get_countries()
    {

        $countries = get_transient('rf_countries_list');

        if (empty($countries)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/countries');

            set_transient('rf_countries_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($countries);
    }

    public static function get_cities()
    {

        $cities_list = get_transient('rf_cities_list');

        if (empty($cities_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/ourcitylocations');

            set_transient('rf_cities_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($cities_list);
    }

    public static function get_areas()
    {

        $areas_list = get_transient('rf_areas_list');

        if (empty($areas_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/landmarks');

            set_transient('rf_areas_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($areas_list);
    }

    public static function get_landmarksWithJobs($countryID)
    {
        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/landmarkswithJobs?countryId='.$countryID.'');
        return json_decode(wp_remote_retrieve_body($response));
    }

    public static function get_industries()
    {
        $industries_list = get_transient('rf_industries_list');

        if (empty($industries_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/industries');

            set_transient('rf_industries_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($industries_list);
    }

    public static function get_subscription_jobs($sub_id, $limit = 10, $page = 1)
    {
        $data = [];
        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/search/subscription?id='. $sub_id .'&pagesize=' . $limit . '&page=' . $page . '');
        $response_code = wp_remote_retrieve_response_code($response);

        if ($response && $response_code == 200) {
            $data['paging'] = json_decode($response['headers']['paging-headers']);
            $data['body'] = json_decode(wp_remote_retrieve_body($response));
        }
        return $data;
    }

    public static function get_roletypes()
    {

        $roletypes_list = get_transient('rf_roletypes_list');

        if (empty($roletypes_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/roletypes');

            set_transient('rf_roletypes_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($roletypes_list);
    }

    public static function get_functions()
    {

        $functions_list = get_transient('rf_functions_list');

        if (empty($functions_list)) {
            $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/functions');

            set_transient('rf_functions_list', wp_remote_retrieve_body($response), HOUR_IN_SECONDS * 12);

            return json_decode(wp_remote_retrieve_body($response));
        }
        return json_decode($functions_list);
    }

    public static function get_job_options()
    {
        $locations = self::get_locations();
        $industries = self::get_industries();
        $roletypes = self::get_roletypes();
        $functions = self::get_functions();

        $data = new stdClass();
        $data->locations = $locations;
        $data->industries = $industries;
        $data->roletypes = $roletypes;
        $data->functions = $functions;

        return $data;
    }

    public function get_json_cities_list() {
        $response = self::get_cities();

        if ($response) {
            wp_send_json_success($response->data);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => []
            ));
        }

        wp_die();
    }

    public function get_json_countries_list() {
        $response = self::get_countries();

        if ($response) {
            wp_send_json_success($response->data);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => []
            ));
        }

        wp_die();
    }

    public function get_json_landmarks_list() {
        $response = self::get_areas();

        if ($response) {
            wp_send_json_success($response->data);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => []
            ));
        }

        wp_die();
    }

    public function get_json_landmarks_with_jobs() {
        $countryId = isset($_POST['countryId']) ? $_POST['countryId'] : '';
        $response = self::get_landmarksWithJobs($countryId);

        if ($response) {
            wp_send_json_success($response->data);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => []
            ));
        }

        wp_die();
    }

    public function get_sub_details($sub_id) {
        $response = self::requestGET('https://api.dform.recruitfirst.co/api/subscription/getSubscriptionAccount?id='.$sub_id.'');
        return json_decode(wp_remote_retrieve_body($response));
    }

    public function get_json_job_options() {
        $response = self::get_job_options();

        if ($response) {
            wp_send_json_success(array(
                'locations' => $response->locations->data,
                'areas' => $response->areas->data,
                'industries' => $response->industries->data,
                'roletypes' => $response->roletypes->data,
                'functions' => $response->functions->data,
                'cities' => $response->cities->data,
            ));
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => []
            ));
        }

        wp_die();
    }

    public function send_contact_form() {
        check_ajax_referer( 'verify_form_request', 'verify_nonce' );
        $name = $_POST["FullName"];
        $email = $_POST["EmailAddress"];
        $phone = $_POST["PhoneNumber"];
        $countryCode = $_POST['CountryCode'] ? $_POST['CountryCode'] : 'SG';
        $message = $_POST['Content'];
        $subject = $_POST['Subject'];
        $checked = $_POST['register_newsletter'];

        $data = array(
            "FullName" => $name,
            "EmailAddress" => $email,
            "PhoneNumber" => $phone,
            "CountryCode" => $countryCode,
            "Content" => $message,
            'Subject' => $subject,
        );

        $response = self::requestPOST('https://api.dform.recruitfirst.co/api/contact/me', $data);

        if ($checked == '1') {
            $subData = array(
                "emailAddress" => $email,
                "name" => $name || $email
            );
            $response2 = self::requestPOST('https://api.dform.recruitfirst.co/api/subscription/newsletter/subscribe', $subData);
        }

        $response = json_decode(wp_remote_retrieve_body($response));

        if ($response && $response->success) {
            wp_send_json_success($response);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => $response
            ));
        }
        wp_die();
    }

    public function send_service_form() {
        check_ajax_referer( 'verify_form_request', 'verify_nonce' );

        $name = $_POST["FullName"];
        $email = $_POST["EmailAddress"];
        $phone = $_POST["PhoneNumber"];
        $countryCode = $_POST['CountryCode'] ? $_POST['CountryCode'] : 'SG';
        $message = $_POST['Content'];
        $typeOfServiceEnquiry = $_POST['TypeOfServiceEnquiry'];

        $data = array(
            "FullName" => $name,
            "EmailAddress" => $email,
            "PhoneNumber" => $phone,
            "CountryCode" => $countryCode,
            "Content" => $message,
            'TypeOfServiceEnquiry ' => $typeOfServiceEnquiry,
        );

        $response = self::requestPOST('https://api.dform.recruitfirst.co/api/contact/clientservice', $data);

        $response = json_decode(wp_remote_retrieve_body($response));

        if ($response && $response->success) {
            wp_send_json_success();
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => $response
            ));
        }
        wp_die();
    }

    public function send_resume_drop() {
        check_ajax_referer( 'verify_form_request', 'verify_nonce' );

        $name = $_POST["FullName"];
        $email = $_POST["EmailAddress"];
        $phone = $_POST["PhoneNumber"];
        $countryCode = $_POST['CountryCode'] ? $_POST['CountryCode'] : 'SG';
        $message = $_POST['Content'];
        $subject = $_POST['Subject'];
        $attachFile = $_FILES['AttachFile'];

        $fileName = $attachFile['name'];
        $fileData = $attachFile['tmp_name'];
        $fileSize = $attachFile['size'];
        $fileType = $attachFile['type'];

        $curl = curl_init();
        $auth = self::getAccessToken();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dform.recruitfirst.co/api/contact/resumedrop',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'FullName' => $name,
                'EmailAddress' => $email,
                'PhoneNumber' => $phone,
                'CountryCode' => $countryCode,
                'Subject' => $subject,
                'Content' => $message,
                'AttachFile'=> curl_file_create($fileData, $fileType, $fileName),
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$auth->token.'',
                'TokenTimeStamp: '.$auth->tokenGen.'',
                'Content-Type: multipart/form-data'
            ),
            CURLOPT_INFILESIZE => $fileSize
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if ($response && $response->success) {
            wp_send_json_success($response);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => $response
            ));
        }
        wp_die();
    }

    public function send_contact_ir() {
        check_ajax_referer( 'verify_form_request', 'verify_nonce' );

        $name = $_POST["FullName"];
        $email = $_POST["EmailAddress"];
        $phone = $_POST["PhoneNumber"];
        $countryCode = $_POST['CountryCode'] ? $_POST['CountryCode'] : 'SG';
        $message = $_POST['Content'];
        $subject = $_POST['Subject'];
        $jobtype = $_POST['JobType'];
        $attachFile = $_FILES['AttachFile'];

        $fileName = $attachFile['name'];
        $fileData = $attachFile['tmp_name'];
        $fileSize = $attachFile['size'];
        $fileType = $attachFile['type'];

        $curl = curl_init();
        $auth = self::getAccessToken();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.dform.recruitfirst.co/api/contact/ir',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'FullName' => $name,
                'EmailAddress' => $email,
                'PhoneNumber' => $phone,
                'CountryCode' => $countryCode,
                'JobType' => $jobtype,
                'Content' => $message,
                'AttachFile'=> curl_file_create($fileData, $fileType, $fileName),
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$auth->token.'',
                'TokenTimeStamp: '.$auth->tokenGen.'',
                'Content-Type: multipart/form-data'
            ),
            CURLOPT_INFILESIZE => $fileSize
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $response = json_decode($response);

        if ($response && $response->success) {
            wp_send_json_success($response);
        } else {
            wp_send_json(array(
                'success' => false,
                'data' => $response
            ));
        }
        wp_die();
    }


    public function send_subscribe_form() {
        check_ajax_referer( 'verify_form_request', 'verify_nonce' );
        $type = $_POST['notify_type'];
        $email = $_POST["EmailAddress"];
        $phone = $_POST["MobileNo"];
        $periodFrom = $_POST["PeriodFrom"];
        $periodTo = $_POST["PeriodTo"];
        $jobRoleTypeID = $_POST["JobRoleTypeID"];
        $jobIndustryIDs = $_POST["JobIndustryIDs"];
        $jobCountryID = $_POST['JobCountryID'];
        $countryID = $_POST['CountryID'];
        $jobCityLandmarkID = $_POST['JobCityLandmarkID'];
        $originalCountryID = $_POST['OriginalCountryID'];

        $url = 'https://api.dform.recruitfirst.co/api/subscription/'.$type.'/update';

        $data = array(
            'IsSubscripted' => true,
            "PeriodFrom" => $periodFrom,
            "PeriodTo" => $periodTo,
            "JobRoleTypeID" => $jobRoleTypeID,
            "JobIndustryIDs" => $jobIndustryIDs,
            "JobCountryID" => intval($jobCountryID),
            "JobCityLandmarkID" => $jobCityLandmarkID
        );

        if ($type == 'email') {
            $data['EmailAddress'] = $email;
        }
        if ($type == 'whatsapp') {
            $data['OriginalMobileNo'] = null;
            $data['MobileNo'] = $phone;
            $data['OriginalCountryID'] = intval($originalCountryID);
            $data['CountryID'] = intval( $countryID);
        }

        $response = self::requestPOST($url, $data);

        $response = json_decode(wp_remote_retrieve_body($response));

        if ($response && $response->success) {
            wp_send_json_success($response);
        } else {
            wp_send_json(array(
                'success' => $response->success,
                'data' => $response->message
            ));
        }
        wp_die();
    }

    public static function get_subscription_job()
    {
//        check_ajax_referer( 'verify_form_request', 'verify_nonce' );

        $job_id = $_POST["job_id"];

        $response = self::requestGET('https://api.dform.recruitfirst.co/api/jobposting/' . $job_id . '');
        $response = json_decode(wp_remote_retrieve_body($response));

        if ($response && $response->data) {
            set_query_var( 'job', $response->data );
            get_template_part( 'template-parts/job-content' );
        }

        wp_die();
    }

    public function unsubscribe() {
        $sub_id = $_POST["sub_id"];
        $response = self::requestGET('https://api.dform.recruitfirst.co/api/subscription/unsubscribe?id='.$sub_id.'');
        $response = json_decode(wp_remote_retrieve_body($response));

        if ($response && $response->success) {
            wp_send_json_success($response);
        } else {
            wp_send_json(array(
                'success' => $response->success,
                'data' => $response->message
            ));
        }
        wp_die();
    }
}
