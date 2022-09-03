<?php
"SELECT user.id, user.username, user2.username AS 'ParentUserName' FROM user LEFT JOIN user2 ON user.parent = user2.id ORDER BY id";
?>