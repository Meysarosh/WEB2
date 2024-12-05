<?php
echo 'Admin Hash: ' . password_hash('admin', PASSWORD_BCRYPT) . PHP_EOL;
echo 'User Hash: ' . password_hash('user', PASSWORD_BCRYPT) . PHP_EOL;