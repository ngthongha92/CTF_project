<?php
require_once('../config/config.inc.php');
$challenge = new Challenge();
$array = $BASE_ARRAY;
$array['otherpage']= '<a class="white" href="/mailbox.php">Mailbox</a>';
$challenge->header($array);

CTF::showAllMail($challenge->getUser());


?>
</div></div>
<div id="main-footer">
		<table width="100%">
			<tr>
				<td align="right">CTF 2014</td>
			</tr>
		</table>
	</div>
<!-- mail starts here -->
<div id="overlay" style="display:none;"></div>
<div id="mail" style="display:none;">
    <div class="closing"><a href="javascript:closeMail()">X</a></div>
    <div id="mailmessage">
        
    </div>
</div>
</body>
</html>