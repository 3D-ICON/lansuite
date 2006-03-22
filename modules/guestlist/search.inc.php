<?php
include_once('modules/mastersearch2/class_mastersearch2.php');
$ms2 = new mastersearch2();

function SeatNameLink($userid){
  global $seat2, $db, $config, $party;

  if (!$userid) return '';
  else $row = $db->query_first("SELECT b.blockid, b.name, b.orientation, s.col, s.row FROM {$config['tables']['seat_block']} AS b
    LEFT JOIN {$config['tables']['seat_seats']} AS s ON b.blockid = s.blockid
    WHERE b.party_id = {$party->party_id} AND s.userid = $userid");

  if (!$row['blockid']) return '';
  else {
    $LinkText = $row['name'] .'<br />'. $seat2->CoordinateToName($row['col'] + 1, $row['row'], $row['orientation']);
	  return "<a href=\"#\" onclick=\"javascript:var w=window.open('base.php?mod=seating&function=usrmgr&id={$row['blockid']}&userarray[]=$userid&l=1','_blank','width=596,height=638,resizable=yes');\" class=\"small\">$LinkText</a>";
	}
}

function PaidIconLink($paid){
  global $dsp, $templ, $line, $auth;
  
  if ($paid) {
    $templ['ms2']['icon_name'] = 'paid';
    $templ['ms2']['icon_title'] = 'Paid';
  } else {
    $templ['ms2']['icon_name'] = 'not_paid';
    $templ['ms2']['icon_title'] = 'Not Paid';
  }
  $templ['ms2']['link_item'] = $dsp->FetchModTpl('mastersearch2', 'result_icon');
  $templ['ms2']['link'] = 'index.php?mod=usrmgr&action=changepaid&step=2&userid='. $line['userid'];
  if ($auth['type'] > 1) $templ['ms2']['link_item'] = $dsp->FetchModTpl('mastersearch2', 'result_link');
  
  return $templ['ms2']['link_item'];
}

function ClanURLLink($clan) {
  global $line;
  
  if ($clan != '' and $line['clanurl'] != '' and $line['clanurl'] != 'http://') {
    return '<a href="http://'. $line['clanurl'] .'" target="_blank">'. $clan .'</a>';
  } else return $clan;
}

// Get current parties blockids
$res = $db->query("SELECT blockid FROM {$config['tables']['seat_block']} WHERE party_id = {$party->party_id}");
$blocks = '';
while ($row = $db->fetch_array($res)) $blocks .= "s.blockid = {$row['blockid']} OR ";
$db->free_result($res);

$ms2->query['from'] = "{$config['tables']['user']} AS u
    LEFT JOIN {$config['tables']['party_user']} AS p ON u.userid = p.user_id";
$ms2->query['where'] = 'p.party_id = '. $party->party_id;

$ms2->config['EntriesPerPage'] = 20;

$ms2->AddTextSearchField('Userid', array('u.userid' => 'exact'));
$ms2->AddTextSearchField('Benutzername', array('u.username' => '1337'));
$ms2->AddTextSearchField('Name', array('u.name' => 'like', 'u.firstname' => 'like'));

$ms2->AddTextSearchDropDown('Bezahlt', 'p.paid', array('' => 'Alle', '0' => 'Nicht bezahlt', '>1' => 'Bezahlt'));
if (!$cfg['sys_internet']) {
  $ms2->AddTextSearchDropDown('Eingecheckt', 'p.checkin', array('' => 'Alle', '0' => 'Nicht Eingecheckt', '>1' => 'Eingecheckt'));
  $ms2->AddTextSearchDropDown('Ausgecheckt', 'p.checkout', array('' => 'Alle', '0' => 'Nicht Ausgecheckt', '>1' => 'Ausgecheckt'));
}

$ms2->AddResultField('Benutzername', 'u.username');
if ($auth['type'] >= 2) {
  $ms2->AddResultField('Vorname', 'u.firstname');
  $ms2->AddResultField('Nachname', 'u.name');
}
$ms2->AddSelect('u.clanurl');
$ms2->AddResultField('Clan', 'u.clan', 'ClanURLLink');
$ms2->AddResultField('Bez.', 'p.paid', 'PaidIconLink');

$ms2->AddResultField('Sitz', 'u.userid', 'SeatNameLink');

if (!$cfg['sys_internet']) {
  $ms2->AddResultField('In', 'p.checkin', 'MS2GetDate');
  $ms2->AddResultField('Out', 'p.checkout', 'MS2GetDate');
}
$ms2->AddIconField('details', 'index.php?mod=usrmgr&action=details&userid=', 'Details');
$ms2->AddIconField('send_mail', 'index.php?mod=mail&action=newmail&step=2&userID=', 'Mail senden');

$ms2->PrintSearch('index.php?mod=guestlist', 'u.userid');
?>