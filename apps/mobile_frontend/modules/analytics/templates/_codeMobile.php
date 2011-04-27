<?php

  $url = "/opMarketingPlugin/";
  $url .= "ga.php?";
  $url .= "utmac=" . $mo;
  $url .= "&utmn=" . rand(0, 0x7fffffff);
  $referer = $sf_request->getReferer();
  $path = $sf_request->getPathInfo()
  if (empty($referer)) {
    $referer = "-";
  }
  $url .= "&utmr=" . urlencode($referer);
  if (!empty($path)) {
    $url .= "&utmp=" . urlencode($path);
  }
  $url .= "&guid=ON";
  if($sf_user->isAuthenticated())
  {
    $url .= '&memberId='.$sf_user->getMemberId();
  }
  $url = str_replace('&', '&amp;', $url);

echo image_tag($url);
