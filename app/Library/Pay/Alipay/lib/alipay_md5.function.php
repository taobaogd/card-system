<?php
function md5Sign($sp313d7f, $spa8a71b) { $sp313d7f = $sp313d7f . $spa8a71b; return md5($sp313d7f); } function md5Verify($sp313d7f, $sp885ea3, $spa8a71b) { $sp313d7f = $sp313d7f . $spa8a71b; $sp3e7343 = md5($sp313d7f); if ($sp3e7343 == $sp885ea3) { return true; } else { return false; } }