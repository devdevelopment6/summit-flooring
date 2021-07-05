<?php

if (count(get_included_files()) == 1) {
    exit('No direct script access allowed');
}
ini_set('max_execution_time', 0);
ini_set('memory_limit', '268435456');

define('GFMONDCA_API_DEBUG', false);

if (!GFMONDCA_API_DEBUG) {
    ini_set('display_errors', 0);
}

class patsatech_license_gf_mondca_updater
{
    private $product_id;
    private $GFMONDCA_API_url;
    private $current_version;
    private $current_path;
    private $root_path;
    private $verify_type;
    private $GFMONDCA_API_key;
    private $license_file;
    private $verification_period;

    public function __construct()
    {
        global $GFMONDCAV;

        $this->product_id = '1F175F27';
        $this->api_url = 'http://license.patsatech.com/';
        $this->current_version = $GFMONDCAV;
        $this->current_path = realpath(__DIR__);
        $this->root_path = realpath($this->current_path.'/..');
        $this->verify_type = 'envato';
        $this->api_key = '5AB9D09FB53E5E87DDDA';
        $this->license_file = $this->current_path.'/.lic';
        $this->verification_period = 7;
    }

    private function callAPI($method, $url, $data)
    {
        $curl = curl_init();
        switch ($method) {
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            case 'PUT':
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
                if ($data) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                }
                break;
            default:
                if ($data) {
                    $url = sprintf('%s?%s', $url, http_build_query($data));
                }
        }
        $this_server_name = getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME'] ?: getenv('HTTP_HOST') ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) or (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) ? 'https://' : 'http://');
        $this_url = $this_http_or_https.$this_server_name.$_SERVER['REQUEST_URI'];
        $this_ip = getenv('SERVER_ADDR') ?:
        $_SERVER['SERVER_ADDR'] ?:
        getenv('REMOTE_ADDR') ?:
        $_SERVER['REMOTE_ADDR'] ?:
        $this->get_ip_from_third_party();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'LB-API-KEY: '.$this->api_key, 'LB-URL: '.$this_url, 'LB-IP: '.$this_ip));
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $GFMONDCA_RESULT = curl_exec($curl);
        if (!$GFMONDCA_RESULT && !GFMONDCA_API_DEBUG) {
            $rs = array('status' => false, 'message' => 'Connection to server failed or the server returned an error, please contact support.');

            return json_encode($rs);
        }
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if (!GFMONDCA_API_DEBUG) {
            if ($http_status != 200) {
                $rs = array('status' => false, 'message' => 'Server returned an invalid response, please contact support.');

                return json_encode($rs);
            }
        }
        curl_close($curl);

        return $GFMONDCA_RESULT;
    }

    public function check_connection()
    {
        $data_array = array();
        $get_data = $this->callAPI('POST', $this->api_url.'api/check_connection_ext', json_encode($data_array));
        $GFMONDCA_RESPONSE = json_decode($get_data, true);

        return $GFMONDCA_RESPONSE;
    }

    public function get_current_version()
    {
        return $this->current_version;
    }

    public function get_latest_version()
    {
        $data_array = array(
          'product_id' => $this->product_id,
        );
        $get_data = $this->callAPI('POST', $this->api_url.'api/latest_version', json_encode($data_array));
        $GFMONDCA_RESPONSE = json_decode($get_data, true);

        return $GFMONDCA_RESPONSE;
    }

    public function activate_license($license, $client, $create_lic = true)
    {
        $data_array = array(
            'product_id' => $this->product_id,
            'license_code' => $license,
            'client_name' => $client,
            'verify_type' => $this->verify_type,
        );
        $get_data = $this->callAPI('POST', $this->api_url.'api/activate_license', json_encode($data_array));
        $GFMONDCA_RESPONSE = json_decode($get_data, true);
        if (!empty($create_lic)) {
            if ($GFMONDCA_RESPONSE['status']) {
                $licfile = trim($GFMONDCA_RESPONSE['lic_response']);
                file_put_contents($this->license_file, $licfile, LOCK_EX);
            } else {
                @chmod($this->license_file, 0777);
                if (is_writeable($this->license_file)) {
                    unlink($this->license_file);
                }
            }
        }
        delete_transient('patsatech_license_gf_mondca_transient');
        delete_transient('patsatech_license_gf_mondca_transient_update_cache');
        delete_transient('patsatech_license_gf_mondca_transient_license_cache');
        delete_transient('patsatech_license_gf_mondca_transient_verify_license_cache');
        delete_transient('patsatech_license_gf_mondca_transient_check_update_cache');

        return $GFMONDCA_RESPONSE;
    }

    public function verify_license($time_based_check = false, $license = false, $client = false)
    {
        $transient = get_transient('patsatech_license_gf_mondca_transient_verify_license_cache');

        if (!empty($transient)) {
            $GFMONDCA_RESP = $transient;
        } else {
            if (!empty($license) && !empty($client)) {
                $data_array = array(
                    'product_id' => $this->product_id,
                    'license_file' => null,
                    'license_code' => $license,
                    'client_name' => $client,
                );
            } else {
                if (file_exists($this->license_file)) {
                    $data_array = array(
                        'product_id' => $this->product_id,
                        'license_file' => file_get_contents($this->license_file),
                        'license_code' => null,
                        'client_name' => null,
                    );
                } else {
                    $data_array = array();
                }
            }
            $GFMONDCA_RESP = array('status' => true, 'message' => 'Verified! Thanks for purchasing.');
            $get_data = $this->callAPI('POST', $this->api_url.'api/verify_license', json_encode($data_array));
            $GFMONDCA_RESP = json_decode($get_data, true);

            // Save the API response so we don't have to call again until tomorrow.
            set_transient('patsatech_license_gf_mondca_transient_verify_license_cache', $GFMONDCA_RESP, 86400);
        }

        return $GFMONDCA_RESP;
    }

    public function check_update()
    {
        $transient = get_transient('patsatech_license_gf_mondca_transient_check_update_cache');

        if (!empty($transient)) {
            $GFMONDCA_RESPONSE = $transient;
        } else {
            $data_array = array(
                'product_id' => $this->product_id,
                'current_version' => $this->current_version,
            );
            $get_data = $this->callAPI('POST', $this->api_url.'api/check_update', json_encode($data_array));
            $GFMONDCA_RESPONSE = json_decode($get_data, true);
            if (isset($GFMONDCA_RESPONSE['download_url']) && !empty($GFMONDCA_RESPONSE['download_url'])) {
                $GFMONDCA_RESPONSE['download_url'] = $this->api_url.$GFMONDCA_RESPONSE['download_url'];
            }

            // Save the API response so we don't have to call again until tomorrow.
            set_transient('patsatech_license_gf_mondca_transient_check_update_cache', $GFMONDCA_RESPONSE, 86400);
        }

        return $GFMONDCA_RESPONSE;
    }

    public function deactivate_license($license = false, $client = false)
    {
        if (!empty($license) && !empty($client)) {
            $data_array = array(
                'product_id' => $this->product_id,
                'license_file' => null,
                'license_code' => $license,
                'client_name' => $client,
            );
        } else {
            if (file_exists($this->license_file)) {
                $data_array = array(
                    'product_id' => $this->product_id,
                    'license_file' => file_get_contents($this->license_file),
                    'license_code' => null,
                    'client_name' => null,
                );
            } else {
                $data_array = array();
            }
        }
        $get_data = $this->callAPI('POST', $this->api_url.'api/deactivate_license', json_encode($data_array));
        $GFMONDCA_RESPONSE = json_decode($get_data, true);
        if ($GFMONDCA_RESPONSE['status']) {
            @chmod($this->license_file, 0777);
            if (is_writeable($this->license_file)) {
                unlink($this->license_file);
            }
        }

        delete_transient('patsatech_license_gf_mondca_transient');
        delete_transient('patsatech_license_gf_mondca_transient_update_cache');
        delete_transient('patsatech_license_gf_mondca_transient_license_cache');
        delete_transient('patsatech_license_gf_mondca_transient_verify_license_cache');
        delete_transient('patsatech_license_gf_mondca_transient_check_update_cache');

        return $GFMONDCA_RESPONSE;
    }

    public function download_update($update_id, $type, $version, $license = false, $client = false)
    {
        if (!empty($license) && !empty($client)) {
            $data_array = array(
                'license_file' => null,
                'license_code' => $license,
                'client_name' => $client,
            );
        } else {
            if (file_exists($this->license_file)) {
                $data_array = array(
                    'license_file' => file_get_contents($this->license_file),
                    'license_code' => null,
                    'client_name' => null,
                );
            } else {
                $data_array = array();
            }
        }
        ob_end_flush();
        ob_implicit_flush(true);
        $version = str_replace('.', '_', $version);
        ob_start();
        $source_size = $this->api_url.'api/get_update_size/main/'.$update_id;
        ob_flush();
        ob_flush();
        $temp_progress = '';
        $ch = curl_init();
        $source = $this->api_url.'api/download_update/main/'.$update_id;
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_array);
        $this_server_name = getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME'] ?: getenv('HTTP_HOST') ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) or (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) ? 'https://' : 'http://');
        $this_url = $this_http_or_https.$this_server_name.$_SERVER['REQUEST_URI'];
        $this_ip = getenv('SERVER_ADDR') ?:
      $_SERVER['SERVER_ADDR'] ?:
      getenv('REMOTE_ADDR') ?:
      $_SERVER['REMOTE_ADDR'] ?:
      $this->get_ip_from_third_party();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('LB-API-KEY: '.$this->api_key, 'LB-URL: '.$this_url, 'LB-IP: '.$this_ip));
        curl_setopt($ch, CURLOPT_PROGRESSFUNCTION, array($this, 'progress'));
        curl_setopt($ch, CURLOPT_NOPROGRESS, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        ob_flush();
        $data = curl_exec($ch);
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_status != 200) {
            if ($http_status == 401) {
                curl_close($ch);
                exit('<br> Your update period has ended or your license is invalid, contact support.');
            } else {
                curl_close($ch);
                exit('<br> API call returned an server side error or Requested resource was not found, contact support.');
            }
        }
        curl_close($ch);
        ob_end_flush();
    }

    private function progress($GFMONDCA_RESPource, $download_size, $downloaded, $upload_size, $uploaded)
    {
        static $prev = 0;
        if ($download_size == 0) {
            $progress = 0;
        } else {
            $progress = round($downloaded * 100 / $download_size);
        }
        if (($progress != $prev) && ($progress == 25)) {
            $prev = $progress;
            echo '<script>document.getElementById(\'prog\').value = 22.5;</script>';
            ob_flush();
        }
        if (($progress != $prev) && ($progress == 50)) {
            $prev = $progress;
            echo '<script>document.getElementById(\'prog\').value = 35;</script>';
            ob_flush();
        }
        if (($progress != $prev) && ($progress == 75)) {
            $prev = $progress;
            echo '<script>document.getElementById(\'prog\').value = 47.5;</script>';
            ob_flush();
        }
        if (($progress != $prev) && ($progress == 100)) {
            $prev = $progress;
            echo '<script>document.getElementById(\'prog\').value = 60;</script>';
            ob_flush();
        }
    }

    private function get_real($url)
    {
        $headers = get_headers($url);
        foreach ($headers as $header) {
            if (strpos(strtolower($header), 'location:') !== false) {
                return preg_replace('~.*/(.*)~', '$1', $header);
            }
        }
    }

    private function get_ip_from_third_party()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://ipecho.net/plain');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $GFMONDCA_RESPONSE = curl_exec($ch);
        curl_close($ch);

        return $GFMONDCA_RESPONSE;
    }

    private function getRemoteFilesize($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_NOBODY, true);
        $this_server_name = getenv('SERVER_NAME') ?: $_SERVER['SERVER_NAME'] ?: getenv('HTTP_HOST') ?: $_SERVER['HTTP_HOST'];
        $this_http_or_https = (((isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) or (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')) ? 'https://' : 'http://');
        $this_url = $this_http_or_https.$this_server_name.$_SERVER['REQUEST_URI'];
        $this_ip = getenv('SERVER_ADDR') ?:
        $_SERVER['SERVER_ADDR'] ?:
        getenv('REMOTE_ADDR') ?:
        $_SERVER['REMOTE_ADDR'] ?:
        $this->get_ip_from_third_party();
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('LB-API-KEY: '.$this->api_key, 'LB-URL: '.$this_url, 'LB-IP: '.$this_ip));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $GFMONDCA_RESULT = curl_exec($curl);
        $filesize = curl_getinfo($curl, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
        if ($filesize) {
            switch ($filesize) {
                case $filesize < 1024:
                    $size = $filesize.' B'; break;
                case $filesize < 1048576:
                    $size = round($filesize / 1024, 2).' KB'; break;
                case $filesize < 1073741824:
                    $size = round($filesize / 1048576, 2).' MB'; break;
                case $filesize < 1099511627776:
                    $size = round($filesize / 1073741824, 2).' GB'; break;
            }

            return $size;
        }
    }
}

$GFMONDCA_API = new patsatech_license_gf_mondca_updater();

add_action('admin_menu', function () {
    add_plugins_page('Updates Activation', 'Moneris Direct CA Gateway for Gravity Forms', 'manage_options', 'patsatech_license_gf_mondca', 'patsatech_license_gf_mondca');
});

add_action('admin_init', function () {
    register_setting('patsatech_license_gf_mondca-settings', 'patsatech_license_gf_mondca-username');
    register_setting('patsatech_license_gf_mondca-settings', 'patsatech_license_gf_mondca-pcode');
});

function patsatech_license_gf_mondca()
{
    global $GFMONDCA_API;
    global $GFMONDCA_RESPONSE;

    if (isset($_POST['patsatech_license_gf_mondca-username']) && isset($_POST['patsatech_license_gf_mondca-pcode'])) {
        update_option('patsatech_license_gf_mondca-username', $_POST['patsatech_license_gf_mondca-username']);
        update_option('patsatech_license_gf_mondca-pcode', $_POST['patsatech_license_gf_mondca-pcode']);
    }
    $GFMONDCA_USER = get_option('patsatech_license_gf_mondca-username', null);
    $GFMONDCA_PCODE = get_option('patsatech_license_gf_mondca-pcode', null);
    if (!empty($_POST['license']) && $_POST['license'] == 'deactivate') {
        $GFMONDCA_RESPONSEponse = $GFMONDCA_API->deactivate_license($GFMONDCA_PCODE, $GFMONDCA_USER);
        update_option('patsatech_license_gf_mondca-username', null);
        update_option('patsatech_license_gf_mondca-pcode', null);
        $GFMONDCA_USER = '';
        $GFMONDCA_PCODE = '';
    } elseif (!empty($GFMONDCA_USER) && !empty($GFMONDCA_PCODE)) {
        $update_data = $GFMONDCA_API->check_update();
        $GFMONDCA_RESPONSE = $GFMONDCA_API->verify_license(false, $GFMONDCA_PCODE, $GFMONDCA_USER);
        if (!empty($GFMONDCA_USER) && !empty($GFMONDCA_PCODE) && empty($GFMONDCA_RESPONSE['status'])) {
            $GFMONDCA_RESPONSE = $GFMONDCA_API->activate_license($GFMONDCA_PCODE, $GFMONDCA_USER, false);
        }
    }
    if ($GFMONDCA_RESPONSE['status']) {
        $info = "<div class='notice notice-info'><p>Your Purchase Code is valid. You will receive the updates in real time.</p></div>";
    } else {
        if (isset($GFMONDCA_RESPONSE['message'])) {
            $message = $GFMONDCA_RESPONSE['message'];
            $info = "<div class='notice notice-error'><p>$message</p></div>";
        } else {
            $info = "<div class='notice notice-error'><p>Provided Purchase Code is invalid. Please make sure it is correct or contact Support.</p></div>";
        }
    }
    if (empty($GFMONDCA_RESPONSE['status'])) {
        $body = "<form method='POST'><table><tr><th>Envato Username</th><td><input type='text' placeholder='Enter Envato username' name='patsatech_license_gf_mondca-username' size='50' value='$GFMONDCA_USER' required/></td></tr><tr><th>Purchase code</th><td><input type='text' placeholder='Enter your purchase code' name='patsatech_license_gf_mondca-pcode' size='50' value='$GFMONDCA_PCODE' required/></td></tr></table><p class='submit'><input type='submit' name='submit' id='submit' class='button button-primary' value='Activate' /></p></form>";
    } elseif (!empty($GFMONDCA_RESPONSE['status'])) {
        $body = "<form method='POST'><table><tr><th>Envato Username</th><td><input type='text' placeholder='Enter Envato username' name='patsatech_license_gf_mondca-username' size='50' value='$GFMONDCA_USER' required/></td></tr><tr><th>Purchase code</th><td><input type='text' placeholder='Enter your purchase code' name='patsatech_license_gf_mondca-pcode' size='50' value='$GFMONDCA_PCODE' required/></td></tr></table><input type='hidden' value='deactivate' name='license'><p class='submit'><input type='submit' name='submit' id='submit' class='button button-primary' value='Deactivate' /></p></form>";
    }
    echo "<div class='wrap'><h1>Updates Activation</h1><br>$info $body </div>";
}

add_action('upgrader_process_complete', 'patsatech_license_gf_mondca_upgrade_completed', 10, 2);

add_filter('plugin_action_links_'."$GFMONDCADIR/$GFMONDCAFILE", 'patsatech_license_gf_mondca_action_links');

add_filter('plugins_api', 'patsatech_license_gf_mondca_plugin_info', 20, 3);

add_filter('site_transient_update_plugins', 'patsatech_license_gf_mondca_push_update');

register_deactivation_hook($GFMONDCAABSPATH, 'patsatech_license_gf_mondca_deactivate_hook');

add_action('admin_notices', 'patsatech_license_gf_mondca_notice');

function patsatech_license_gf_mondca_push_update($transient)
{
    global $GFMONDCADIR;
    global $GFMONDCAFILE;
    global $GFMONDCA_API;

    if (empty($transient->checked)) {
        return $transient;
    }

    $GFMONDCA_USER = get_option('patsatech_license_gf_mondca-username', null);
    $GFMONDCA_PCODE = get_option('patsatech_license_gf_mondca-pcode', null);

    if (empty($GFMONDCA_USER) || empty($GFMONDCA_PCODE)) {
        return $transient;
    }

    $GFMONDCA_RESPONSE = get_transient('patsatech_license_gf_mondca_transient_update_cache');
    $license = get_transient('patsatech_license_gf_mondca_transient_license_cache');

    if (
    (false == $GFMONDCA_RESPONSE = get_transient('patsatech_license_gf_mondca_transient_update_cache')) &&
    (false == $license = get_transient('patsatech_license_gf_mondca_transient_license_cache'))
    ) {
        // info.json is the file with the actual plugin information on your server
        $license = $GFMONDCA_API->verify_license(false, $GFMONDCA_PCODE, $GFMONDCA_USER);
        $GFMONDCA_RESPONSE = $GFMONDCA_API->check_update();

        if ($GFMONDCA_RESPONSE['status'] && $license['status']) {
            set_transient('patsatech_license_gf_mondca_transient_update_cache', $GFMONDCA_RESPONSE, 86400); // 12 hours cache
            set_transient('patsatech_license_gf_mondca_transient_license_cache', $license, 86400); // 12 hours cache
        }
    }

    if ($GFMONDCA_RESPONSE['status'] && $license['status']) {
        set_transient('patsatech_license_gf_mondca_transient', $GFMONDCA_RESPONSE, 86400);
        $slug = str_replace('.php', '', $GFMONDCAFILE);
        $GFMONDCA_RESP = new stdClass();
        $GFMONDCA_RESP->name = $GFMONDCA_RESPONSE['product_name'];
        $GFMONDCA_RESP->slug = $slug;
        $GFMONDCA_RESP->plugin = "$GFMONDCADIR/$GFMONDCAFILE";
        $GFMONDCA_RESP->new_version = $GFMONDCA_RESPONSE['version'];
        $GFMONDCA_RESP->package = $GFMONDCA_RESPONSE['download_url'];
        $GFMONDCA_RESP->author = '<a href="https://codecanyon.net/user/patsatech/portfolio?ref=patsatech">PatSaTECH</a>';
        $GFMONDCA_RESP->sections = array(
            'changelog' => $GFMONDCA_RESPONSE['changelog'],
        );
        $transient->response[$GFMONDCA_RESP->plugin] = $GFMONDCA_RESP;

        return $transient;
    }

    return $transient;
}

function patsatech_license_gf_mondca_plugin_info($GFMONDCA_RESP, $action, $args)
{
    global $GFMONDCADIR;
    global $GFMONDCAFILE;
    global $GFMONDCA_API;

    if ($action !== 'plugin_information') {
        return false;
    }

    $slug = str_replace('.php', '', $GFMONDCAFILE);
    if ($slug !== $args->slug) {
        return $GFMONDCA_RESP;
    }

    $GFMONDCA_USER = get_option('patsatech_license_gf_mondca-username', null);
    $GFMONDCA_PCODE = get_option('patsatech_license_gf_mondca-pcode', null);

    if (empty($GFMONDCA_USER) || empty($GFMONDCA_PCODE)) {
        return $transient;
    }

    $GFMONDCA_RESPONSE = get_transient('patsatech_license_gf_mondca_transient_update_cache');
    $license = get_transient('patsatech_license_gf_mondca_transient_license_cache');

    if (
    (false == $GFMONDCA_RESPONSE = get_transient('patsatech_license_gf_mondca_transient_update_cache')) &&
    (false == $license = get_transient('patsatech_license_gf_mondca_transient_license_cache'))
    ) {
        // info.json is the file with the actual plugin information on your server
        $license = $GFMONDCA_API->verify_license(false, $GFMONDCA_PCODE, $GFMONDCA_USER);
        $GFMONDCA_RESPONSE = $GFMONDCA_API->check_update();

        if ($GFMONDCA_RESPONSE['status'] && $license['status']) {
            set_transient('patsatech_license_gf_mondca_transient_update_cache', $GFMONDCA_RESPONSE, 86400); // 12 hours cache
            set_transient('patsatech_license_gf_mondca_transient_license_cache', $license, 86400); // 12 hours cache
        }
    }

    if ($GFMONDCA_RESPONSE['status'] && $license['status']) {
        $GFMONDCA_RESP = new stdClass();
        $GFMONDCA_RESP->name = $GFMONDCA_RESPONSE['product_name'];
        $GFMONDCA_RESP->slug = "$GFMONDCADIR/$GFMONDCAFILE";
        $GFMONDCA_RESP->version = $GFMONDCA_RESPONSE['version'];
        $GFMONDCA_RESP->author = '<a href="https://codecanyon.net/user/patsatech/portfolio?ref=patsatech">PatSaTECH</a>';
        $GFMONDCA_RESP->sections = array(
            'changelog' => $GFMONDCA_RESPONSE['changelog'],
        );

        return $GFMONDCA_RESP;
    }

    return false;
}

function patsatech_license_gf_mondca_upgrade_completed($upgrader_object, $options)
{
    global $GFMONDCADIR;
    global $GFMONDCAFILE;
    global $GFMONDCA_API;

    $our_plugin = "$GFMONDCADIR/$GFMONDCAFILE";
    if ($options['action'] == 'update' && $options['type'] == 'plugin' && isset($options['plugins'])) {
        foreach ($options['plugins'] as $plugin) {
            if ($plugin == $our_plugin) {
                $GFMONDCA_USER = get_option('patsatech_license_gf_mondca-username', null);
                $GFMONDCA_PCODE = get_option('patsatech_license_gf_mondca-pcode', null);
                $GFMONDCA_RESPONSE = get_transient('patsatech_license_gf_mondca_transient');
                if ($GFMONDCA_RESPONSE['status']) {
                    $GFMONDCA_API->download_update($GFMONDCA_RESPONSE['update_id'], $GFMONDCA_RESPONSE['has_sql'], $GFMONDCA_RESPONSE['version'], $GFMONDCA_PCODE, $GFMONDCA_USER);
                }
                delete_transient('patsatech_license_gf_mondca_transient');
                delete_transient('patsatech_license_gf_mondca_transient_update_cache');
                delete_transient('patsatech_license_gf_mondca_transient_license_cache');
                delete_transient('patsatech_license_gf_mondca_transient_verify_license_cache');
                delete_transient('patsatech_license_gf_mondca_transient_check_update_cache');
            }
        }
    }
}

function patsatech_license_gf_mondca_deactivate_hook()
{
    global $GFMONDCA_API;
    $GFMONDCA_RESP = $GFMONDCA_API->deactivate_license();
    update_option('patsatech_license_gf_mondca-username', null);
    update_option('patsatech_license_gf_mondca-pcode', null);
    delete_transient('patsatech_license_gf_mondca_transient');
    delete_transient('patsatech_license_gf_mondca_transient_update_cache');
    delete_transient('patsatech_license_gf_mondca_transient_license_cache');
}

function patsatech_license_gf_mondca_notice()
{
    global $GFMONDCANAME;
    global $GFMONDCA_API;

    $GFMONDCA_USER = get_option('patsatech_license_gf_mondca-username', null);
    $GFMONDCA_PCODE = get_option('patsatech_license_gf_mondca-pcode', null);
    $GFMONDCA_RESP = $GFMONDCA_API->verify_license(false, $GFMONDCA_PCODE, $GFMONDCA_USER);

    $class = 'notice notice-error';
    $message = "<b>$GFMONDCANAME :</b> Please enter your purchase code to get regular updates. ".'<a style="text-color:red" href="'.esc_url(get_admin_url(null, 'plugins.php?page=patsatech_license_gf_mondca')).'">Enter your Purchase Code.</a>';
    if (!$GFMONDCA_RESP['status']) {
        echo "<div class='$class'><p>$message</p></div>";
    }
}

function patsatech_license_gf_mondca_action_links($links)
{
    #$links[] = '<a href="'.esc_url(get_admin_url(null, 'admin.php?page=gf_settings')).'">Settings</a>';
    $links[] = '<a href="https://codecanyon.net/user/patsatech/portfolio?direction=desc&order_by=sortable_at&view=grid&ref=patsatech" target="_blank">Codecanyon Portfolio</a>';
    $links[] = '<a href="http://www.patsatech.com/" target="_blank">Our Site.</a>';

    return $links;
}
