<?php
class SaveFile {
  function getSaveFileData() {
    $saveFileUri = 'data.json';
    $out = array();
    $out['schedules'] = ArmUtil::getSchedules();
    $defaultSchedule = ArmUtil::getD3();
    $out = array_merge($out, $defaultSchedule);
    if (!file_exists($saveFileUri)) {
        $out = array_merge($out, $DEFAULT_SETTINGS);
    } else {
        $json = file_get_contents($saveFileUri, true);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $saveData = json_decode($json, true);
        $out = array_merge($out, $saveData);
    }
    return $out;
  }

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

      print(json_encode($saveDatas));




    // $f = fopen('data2.json', 'w');
    // fwrite($f, $param);
    // fclose($f);
  }
}
?>
