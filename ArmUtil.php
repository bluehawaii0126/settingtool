<?php
class ArmUtil {
	public static function getDefaultSchedule() {

		$results = array();

		// month
		foreach (range(1,12) as $month) {
			$results['selectmonths'][$month] = $month;	
		}

		// day
		$results['select_days']['5d']  = '5日毎';
		$results['select_days']['10d'] = '10日毎';
		foreach (range(1, 31) as $day) {
			$results['select_days'][$day] = $day;
		}

		// weekend
		$weekdays = array( "日", "月", "火", "水", "木", "金", "土" );
		foreach ($weekdays as $weekday) {
			$results['select_weekdays'][] = $weekday;
		}

		// hour
	    $results['select_hours']['2h']  = '2時間毎';
	    $results['select_hours']['6h']  = '6時間毎';
	    $results['select_hours']['8h']  = '8時間毎';
		$results['select_hours']['12h'] = '12時間毎';
		foreach (range(0, 23) as $hour) {
			$results['select_hours'][$hour] = $hour;
		}

		// minute
		$results['select_minutes']['3m']  = '3分毎';
		$results['select_minutes']['5m']  = '5分毎';
		$results['select_minutes']['10m'] = '10分毎';
		$results['select_minutes']['15m'] = '15分毎';
		$results['select_minutes']['20m'] = '20分毎';
		$results['select_minutes']['30m'] = '30分毎';
	    foreach (range(0, 59) as $minute) {
	        $results['select_minutes'][$minute] = $minute;
	    }

	    // second
		$results['select_seconds']['3s']  = '3秒毎';
		$results['select_seconds']['5s']  = '5秒毎';
		$results['select_seconds']['10s'] = '10秒毎';
		$results['select_seconds']['15s'] = '15秒毎';
		$results['select_seconds']['20s'] = '20秒毎';
		$results['select_seconds']['30s'] = '30秒毎';
	    foreach (range(0, 59) as $second) {
	        $results['select_seconds'][$second] = $second;
	    }

	    return $results;
	}
}
?>



