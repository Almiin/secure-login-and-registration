<?php

$post_data = http_build_query(
    array(
<<<<<<< HEAD
<<<<<<< HEAD
        'secret' => "6LfYZKIUAAAAAIGH_j8j2oCm1szUtIcRQoIkh43u",
=======
        'secret' => "6Lelp6UUAAAAAGCEkQzUhj_t0KyQZOHtjPQy2eNS",
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
=======
        'secret' => "6Lelp6UUAAAAAGCEkQzUhj_t0KyQZOHtjPQy2eNS",
>>>>>>> a18e3940f176f72af91046ba889aa2f0bcf9973e
        'response' => $_POST['g-recaptcha-response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
    )
);
$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $post_data
    )
);
$context  = stream_context_create($opts);
$response = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
$result = json_decode($response);
if (!$result->success) {
    throw new Exception('Gah! CAPTCHA verification failed.', 1);
}