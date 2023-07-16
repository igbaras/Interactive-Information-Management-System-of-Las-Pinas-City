<?php

// function time_Ago($time)
// {
//     $time_difference = time() - $time;

//     if ($time_difference < 1) {
//         return 'less than 1 second ago';
//     }
//     $condition = array(
//         12 * 30 * 24 * 60 * 60 =>  'year',
//         30 * 24 * 60 * 60       =>  'month',
//         24 * 60 * 60            =>  'day',
//         60 * 60                 =>  'hour',
//         60                      =>  'minute',
//         1                       =>  'second'
//     );

//     foreach ($condition as $secs => $str) {
//         $d = $time_difference / $secs;

//         if ($d >= 1) {
//             $t = round($d);
//             return 'about ' . $t . ' ' . $str . ($t > 1 ? 's' : '') . ' ago';
//         }
//     }
// }
// function time_Ago($time)
// {

//     // Calculate difference between current
//     // time and given timestamp in seconds
//     $diff     = time() - $time;

//     // Time difference in seconds
//     $sec     = $diff;

//     // Convert time difference in minutes
//     $min     = round($diff / 60);

//     // Convert time difference in hours
//     $hrs     = round($diff / 3600);

//     // Convert time difference in days
//     $days     = round($diff / 86400);

//     // Convert time difference in weeks
//     $weeks     = round($diff / 604800);

//     // Convert time difference in months
//     $mnths     = round($diff / 2600640);

//     // Convert time difference in years
//     $yrs     = round($diff / 31207680);

//     // Check for seconds
//     if ($sec <= 60) {
//         echo "$sec seconds ago";
//     }

//     // Check for minutes
//     else if ($min <= 60) {
//         if ($min == 1) {
//             echo "one minute ago";
//         } else {
//             echo "$min minutes ago";
//         }
//     }

//     // Check for hours
//     else if ($hrs <= 24) {
//         if ($hrs == 1) {
//             echo "an hour ago";
//         } else {
//             echo "$hrs hours ago";
//         }
//     }

//     // Check for days
//     else if ($days <= 7) {
//         if ($days == 1) {
//             echo "Yesterday";
//         } else {
//             echo "$days days ago";
//         }
//     }

//     // Check for weeks
//     else if ($weeks <= 4.3) {
//         if ($weeks == 1) {
//             echo "a week ago";
//         } else {
//             echo "$weeks weeks ago";
//         }
//     }

//     // Check for months
//     else if ($mnths <= 12) {
//         if ($mnths == 1) {
//             echo "a month ago";
//         } else {
//             echo "$mnths months ago";
//         }
//     }

//     // Check for years
//     else {
//         if ($yrs == 1) {
//             echo "one year ago";
//         } else {
//             echo "$yrs years ago";
//         }
//     }
// }


function time_Ago($time_ago)
{
    $cur_time     = time();
    $time_elapsed     = $cur_time - $time_ago;
    $seconds     = $time_elapsed;
    $minutes     = round($time_elapsed / 60);
    $hours         = round($time_elapsed / 3600);
    $days         = round($time_elapsed / 86400);
    $weeks         = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years         = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        echo "$seconds seconds ago";
    }
    //Minutes
    else if ($minutes <= 60) {
        if ($minutes == 1) {
            echo "one minute ago";
        } else {
            echo "$minutes minutes ago";
        }
    }
    //Hours
    else if ($hours <= 24) {
        if ($hours == 1) {
            echo "an hour ago";
        } else {
            echo "$hours hours ago";
        }
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            echo "yesterday";
        } else {
            echo "$days days ago";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        if ($weeks == 1) {
            echo "a week ago";
        } else {
            echo "$weeks weeks ago";
        }
    }
    //Months
    else if ($months <= 12) {
        if ($months == 1) {
            echo "a month ago";
        } else {
            echo "$months months ago";
        }
    }
    //Years
    else {
        if ($years == 1) {
            echo "one year ago";
        } else {
            echo "$years years ago";
        }
    }
}
