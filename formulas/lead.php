$today = datetime\format(datetime\now(),'Asia/Kolkata', 'MM/DD/YYYY 00:00');

if (nextFollowupDate != null){
$nfd = datetime\format(nextFollowupDate,'Asia/Kolkata', 'MM/DD/YYYY 00:00');
$diff = datetime\diff($nfd, $today, 'days');
$fuStatus = null;
if ($diff == null) {
$fuStatus = "NA";
} else if ($diff == "") {
$fuStatus = "";
} else if ($diff == 0) {
$fuStatus = "Today";
} else if ($diff > 7) {
$fuStatus= "Overdue for a Week";
}
else if ($diff > 0 && $diff < 8) { $fuStatus="Overdue" ; } else if ($diff < 0 && $diff> -4) {
  $fuStatus = "Upcoming";
  } else if ($diff < 0 && $diff> -8) {
    $fuStatus = "Upcoming Next Week";
    } else if ($diff < 0 && $diff> -30) {
      $fuStatus = "Upcoming Month";
      } else {
      $fuStatus = "Long-term";
      }
      entity\setAttribute('followupStatus', $fuStatus);
      }
      $thisYear = datetime\year(datetime\today());
      $age = $thisYear - yearOfFoundation;
      entity\setAttribute('age', $age);
      entity\setAttribute('source', leadSource);

      $sn = schoolName;
      entity\setAttribute('firstName', $sn);