<?php

class RF_Language
{
    public function getClientIP() {

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function IPLoopUp() {
        $ip = self::getClientIP();
        $url = 'https://extreme-ip-lookup.com/json/'.$ip.'?key=CofpAT2evHoOWObDKYfB';
        $response = file_get_contents($url);

        return json_decode($response);
    }

    public function get_country_code() {
        $code = '';
        $data = self::IPLoopUp();
        if ($data) {
            $code = $data->countryCode;
        }
        return $code;
    }

    public function get_language_by_ip() {
        $data = self::IPLoopUp();
        $language_code = pll_default_language();

        if ($data) {
            $country_code = $data->countryCode;

            if ($country_code == 'TW') {
                $language_code = 'tw';
            }

            if ($country_code == 'CN' || $country_code == 'HK') {
                $language_code = 'zh';
            }
        }

        return $language_code;
    }

    public function get_preferred_language() {
        $language  = pll_current_language();
        if ( !$_COOKIE[ 'rf_client_locale' ] ) {
            $language = RF_Language::get_language_by_ip();
            setcookie("rf_client_locale", $language, 0, "/", $_SERVER['SERVER_NAME']);
        }

        return $language;
    }

    public function get_target_url() {
        $id = get_queried_object_id();
        $lang_code = RF_Language::get_preferred_language();
        $lang_list = pll_get_post_translations($id);

        $page_id = $lang_list[$lang_code];
        $url = get_the_permalink($page_id);

        return $url;
    }
}
