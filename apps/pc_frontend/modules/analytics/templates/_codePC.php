<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-16647953-4']);
<?php if($sf_user->isAuthenticated()): ?>
  _gaq.push(['_setCustomVar', 1, 'MemberId', <?php echo $sf_user->getMemberId(); ?>, 2]);
<?php endif; ?>
_gaq.push(['_trackPageview']);


(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
