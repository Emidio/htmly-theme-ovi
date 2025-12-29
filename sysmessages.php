<?php

// get language configuraiuon from config.ini
function config_lang()
{
    $config = array();
    $config = parse_ini_file('../../config/config.ini', true);
    
    $language = $config['language'] ?? 'en_US';
    
    return $language;
}

// i18n provides strings in the current language
function i18n($key)
{
    static $_i18n = array();
    $key = strtolower($key);

    $lang_file = config_lang() . '.ini';
    $i18n = parse_ini_file('../../lang/' . $lang_file, true);

    $string = $i18n[$key] ?? $key;

    return $string;
}

// returns array
function getSubscription($filename) {
    $subscriptions_dir = '../../content/comments/.subscriptions';
    $subscription_file = $subscriptions_dir . '/' . $filename;
    if (!file_exists($subscription_file)) {
        $subscription['status'] = 'no';
        $subscription['date'] = date('Y-m-d H:i:s');
        $subscription['email'] = '';
        return $subscription;
    }
    else {
        $subscription = json_decode(file_get_contents($subscription_file), true);
        return $subscription;
    }
}


// Set JSON header
header('Content-Type: application/json');

// Initialize response array
$response = [
    'message' => '',
    'class' => ''
];

try {
    // Get all GET parameters
    $params = $_GET;
    
    // unsubscribe
    if (isset($params['unsubscribe'])) {
        $subscription = getSubscription($params['unsubscribe']);
        if ($subscription['status'] == 'no') {
            $response['message'] = i18n('sysmsg_unsubscribe_success');
            $response['class'] = 'success';
        }
        else {
            $response['message'] = i18n('sysmsg_unsubscribe_fail');
            $response['class'] = 'error';
        }
    }
    // subscribe
    elseif (isset($params['subscribe'])) {
        $subscription = getSubscription($params['subscribe']);
        
        if ($subscription['status'] == 'subscribed') {
            $response['message'] = i18n('sysmsg_subscribe_success');
            $response['class'] = 'success';
        }
        else {
            $response['message'] = i18n('sysmsg_subscribe_fail');
            $response['class'] = 'error';
        }
    }
    // process specific action example - future use
    elseif (isset($params['action'])) {
        switch ($params['action']) {
            case 'subscribe':
                $response['message'] = 'Thank you for subscribing to our newsletter!';
                $response['class'] = 'success';
                break;

            case 'unsubscribe':
                $response['message'] = 'You have been unsubscribed.';
                $response['class'] = 'warning';
                break;
                
            case 'contact':
                $response['message'] = 'Your message has been sent. We will get back to you soon.';
                $response['class'] = 'error';
                break;
                
            default:
                $response['message'] = 'Action completed.';
                $response['class'] = 'info';
        }
    }
    // Default: No specific parameter matched
    else {
        $response['message'] = '';
        $response['class'] = '';
    }
    
    
} catch (Exception $e) {
    // Handle any exceptions
    $response['message'] = 'An unexpected error occurred.';
    $response['class'] = 'error';

    // Log the error (in production, don't expose error details to client)
    error_log('Backend error: ' . $e->getMessage());
}

// Return JSON response
echo json_encode($response);
exit;

?>