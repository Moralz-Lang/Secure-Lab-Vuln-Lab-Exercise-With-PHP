<?php
// totp.php
function base32_decode_custom($b32){ ... }
function random_base32($length=16){ ... }
function totp_code($secret, $timeSlice=null){ ... }
function totp_verify($secret, $code, $discrepancy=1, $currentTimeSlice=null){ ... }
