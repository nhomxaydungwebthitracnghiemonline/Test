<?php
// Include database, session, general info
require_once '../modal/init.php';
		$sql="SELECT * FROM tbl_dethi";
		$rs=$db->query($sql);
echo "<select name='made'>";
while($r = $db->row($rs))
{
	echo "<option value='$r[0]'>".$r[1]."</option>";
}
echo "</select>";
		?>