<?php
class ArmUtil {

	public static function getSchedules() {
		$results = array();
		$values = array('センサー死活監視インターバル', 
			         'ドアセンサー死活監視インターバル', 
			         '死活監視（ARMサーバー間）', 
			         '設定変更問合せ', 
			         '画像認識センサー再起動', 
			         '　');
		foreach ($values as $value) {
			$results[] = array('value' => $value);
		}
		return $results;
	}

	public static function getDefaultSchedule() {

		$results = array();

		// month
		$months = array();
		$results['select_months'][] = array('key' => '*', 'value' => '毎月');
		foreach (range(1,12) as $month) {
			$results['select_months'][] = array('key' => $month, 'value' => $month);
		}

		// day
		$results['select_days'][] = array('key' => '*', 'value' => '毎日');
		$results['select_days'][] = array('key' => 'm5', 'value' => '5日毎');
		$results['select_days'][] = array('key' => 'm10', 'value' => '10日毎');
		foreach (range(1, 31) as $day) {
			$results['select_days'][] = array('key' => $day, 'value' => $day);
		}

		// weekend
		$weekdays = array( "日", "月", "火", "水", "木", "金", "土" );
		$i = 0;
		$results['select_weekdays'][] = array('key' => '*', 'value' => '毎曜日');
		foreach ($weekdays as $weekday) {
			$results['select_weekdays'][] = array('key' => $i, 'value' => $weekday);
			$i++;
		}

		// hour
		$results['select_hours'][] = array('key' => '*', 'value' => '毎時');
	    $results['select_hours'][] = array('key' => 'm2', 'value' => '2時間毎');
	    $results['select_hours'][] = array('key' => 'm6', 'value' => '6時間毎');
	    $results['select_hours'][] = array('key' => 'm8', 'value' => '8時間毎');
		$results['select_hours'][] = array('key' => 'm12','value' => '12時間毎');
		foreach (range(0, 23) as $hour) {
			$results['select_hours'][] = array('key' => $hour,'value' => $hour);
		}

		// minute
		$results['select_minutes'][] = array('key' => '*', 'value' => '毎分');
		$results['select_minutes'][] = array('key' => 'm3',  'value' => '3分毎');
		$results['select_minutes'][] = array('key' => 'm5',  'value' => '5分毎');
		$results['select_minutes'][] = array('key' => 'm10', 'value' => '10分毎');
		$results['select_minutes'][] = array('key' => 'm15', 'value' => '15分毎');
		$results['select_minutes'][] = array('key' => 'm20', 'value' => '20分毎');
		$results['select_minutes'][] = array('key' => 'm30', 'value' => '30分毎');
	    foreach (range(0, 59) as $minute) {
	        $results['select_minutes'][] = array('key' => $minute,'value' => $minute);
	    }

	    // second
	    $results['select_seconds'][] = array('key' => '*', 'value' => '毎秒');
		$results['select_seconds'][] = array('key' => 'm3',  'value' => '3秒毎');
		$results['select_seconds'][] = array('key' => 'm5',  'value' => '5秒毎');
		$results['select_seconds'][] = array('key' => 'm10', 'value' => '10秒毎');
		$results['select_seconds'][] = array('key' => 'm15', 'value' => '15秒毎');
		$results['select_seconds'][] = array('key' => 'm20', 'value' => '20秒毎');
		$results['select_seconds'][] = array('key' => 'm30', 'value' => '30秒毎');
	    foreach (range(0, 59) as $second) {
	        $results['select_seconds'][] = array('key' => $second,'value' => $second);
	    }

	    return $results;
	}
}
?>



