<?php
			include('../modal/init.php');
			$counts=0;
			$sql=$db->hienthigiaovien();
			$rscount = $db->query($sql);
			while($rowscounts = $db->lay_rows($rscount))
			{
				$counts++;
			}
?>