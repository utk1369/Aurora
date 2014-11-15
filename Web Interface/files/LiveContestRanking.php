<?php
/** @author: utk
 */
include_once '../functions.php';
include_once '../components.php';
include_once 'SSE_Util.php';

function liveContestRanking($data) {
	$table = '<table class="table table-striped table-bordered table-condensed">' ;
    $i = 1;
	foreach ($data as $tid => $info) {
		$table .= '<tr>';
		$table .= '<td>'.$i.'</td><td align="center">'.$info['teamname'].'</td><td>'.$info['score'].'</td>';
        $table .= '</tr>';
        $i++;
        if($i == 11)break;
	}
	$table .= '</table>';
	return $table;
}

$contestCode = 'CQM5';
$rankTable = getrankings($contestCode);
$printTable = liveContestRanking($rankTable);
SSE_Util::sendMessageToClient('Hi');
