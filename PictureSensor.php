<?php

require_once(__DIR__ . '/config.php');

class PictureSensor {

  function registData($params) {
      $saveDatas = array();
      $wkSaveDatas = array();
      $searchKeyKinds = array("month", "day", "weekday", "hour", "minute", "second");
      $searchKeyBases = array_keys(ArmUtil::getSchedules());
      foreach ($searchKeyBases as $searchKeyBase) {
          foreach ($searchKeyKinds as $kinds) {
            $searchKey = $searchKeyBase . "-" . $kinds;
            $wkSaveDatas[$searchKeyBase][$kinds] = $params[$searchKey];
            unset($params[$searchKey]);
          }
      }
      $saveDatas = array_merge($params, $wkSaveDatas);
      $f = fopen('data.json', 'w');
      fwrite($f, json_encode($saveDatas));
      fclose($f);
  }

  function initializeData() {
    $out = array();
    $out['schedules'] = ArmUtil::getSchedules();
    $defaultSchedule = ArmUtil::getD3();
    $out = array_merge($out, $DEFAULT_SETTINGS);
    return $out;
  }
}
?>
