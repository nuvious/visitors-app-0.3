<?php
defined('ABSPATH') or die();

/**
 * VST_today
 * Returns the Datetime object for today
 *
 * @return DateTime
 * @throws Exception
 */
function VST_today() {
	return new DateTime();
}

/**
 * VST_yesterday
 * Returns the Datetime object for yesterday
 *
 * @return DateTime
 * @throws Exception
 */
function VST_yesterday() {
	$datetime = new DateTime();
	$datetime->sub(new DateInterval('P1D'));
	return $datetime;
}

/**
 * VST_this_week
 * Returns an array with the first and last days of the current week
 *
 * @return array
 * @throws Exception
 */
function VST_this_week() {
	$startday="Monday";
	$finishday="Sunday";

	$strDate = strtotime("now");

	$datestart = date('Y-m-d',strtotime('last '.$startday,$strDate));
	$datefinish = date('Y-m-d',strtotime('next '.$finishday,$strDate));

	if(date("l",$strDate)==$startday){
		$datestart = date("Y-m-d",$strDate);
	}
	if(date("l",$strDate)==$finishday){
		$datefinish = date("Y-m-d",$strDate);
	}

	return Array(new DateTime($datestart),new DateTime($datefinish));
}

/**
 * VST_this_month
 * Returns an array with the first and last days of the current month
 *
 * @return array
 * @throws Exception
 */
function VST_this_month() {
	$month = date("m");
	$year = date("y");
	$first_day_month = "1";
	$last_day_month = date("d",(mktime(0,0,0,$month+1,1,$year)-1));

	$first_day = $year."-".$month."-".$first_day_month;
	$last_day = $year."-".$month."-".$last_day_month;

	return Array(new DateTime($first_day),new DateTime($last_day));
}

/**
 * VST_this_year
 * Returns an array with the first and last days of the current year
 *
 * @return array
 * @throws Exception
 */
function VST_this_year() {
	$year = date("y");

	$first_day = $year."-01-01";
	$last_day = $year."-12-31";

	return Array(new DateTime($first_day),new DateTime($last_day));
}