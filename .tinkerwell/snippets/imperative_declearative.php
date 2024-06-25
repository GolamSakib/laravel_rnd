<?php
// # Class - Collections
// ## 1 - Imperative vs Declearative Style
// Get list of Users who has email

// Imperatove Style:
function getUserEmails($users)
{
    $emails = [];

    for ($i = 0; $i < count($users); $i++) {
        $user = $users[$i];

        if ($user->email !== null) {
            $emails[] = $user->email;
        }
    }

    return $emails;
}

// Declearative Style:
// SELECT email FROM users WHERE email IS NOT NULL;
