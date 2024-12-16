<?php
/* contador renders */
$rqdisr1 = query("SELECT cnt_renders FROM info_sistema WHERE id=1 LIMIT 1 ");
$rqdisr2 = fetch($rqdisr1);
$cnt_renders = $rqdisr2['cnt_renders'];
$cnt_renders++;
query("UPDATE info_sistema SET cnt_renders='$cnt_renders' WHERE id=1 LIMIT 1 ");
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2JXB8TQVFQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2JXB8TQVFQ');
</script>

    </body>
</html>