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
}
?>
