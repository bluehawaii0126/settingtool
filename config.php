<?php

/*** アプリケーション設定 ***/
$DEFAULT_SETTINGS = array(
    'default_arm_server' => '111.111.111.111',
    'data_arm_server' => '222.222.222.222',
    'arm_router_no' => 11111,
    'pic_sensor_no' =>22222,
    'sensor_monitor_settings'  => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '5'),
    'door_sensor_monitor_settings' => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '6'),
    'arm_monitor_settings'      => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '4'),
    'inquiry_settings'               => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '3'),
    'pic_sensor_reboot'           => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '2'),
    'no_name'                        => array('month' => '3', 'day' => 'm5', 'weekday' => '0', 'hour' => 'm12', 'minutes' => '29', 'second' => '1'),
);


/*** システム設定 ***/
// ログインロック時間（秒）
$LOGIN_LOCKTIME = 3600;
// メッセージ
$MESSAGES = array(
'login_lock_now' => '3回失敗したためロックされました。しばらくたってから再度お試しください。',
'login_failed' => 'idまたはpasswordに誤りがあります。',
'login_lock' => 'ログインロックされています。しばらくたってから再度お試しください。');

?>
