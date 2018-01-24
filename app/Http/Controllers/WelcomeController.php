<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;

class WelcomeController extends Controller
{
    
	public function welcome()
	{
		$group = Group::find(1);

		$start = $group->started_at;
	    $secpersec = $group->secpersec;
	    $virtual_seconds = $group->virtual_seconds;
	    
	    $daysperweek = 4;
	    $hoursperday = 4;

	    if(isset($_GET['speed']))
	    {
	        $this->change_speed($_GET['speed'], $start, $secpersec, $virtual_seconds);
	        $group->started_at = $start;
	        $group->secpersec = $secpersec;
	        $group->virtual_seconds = $virtual_seconds;
	        $group->save();
	    }
	    
	    $actual_end = $start + $virtual_seconds / $secpersec;

	    return view('welcome')
	    	->with('actual_end', $actual_end)
	    	->with('secpersec', $secpersec)
	    	->with('daysperweek', $daysperweek)
	    	->with('hoursperday', $hoursperday);
	}

	private function change_speed($new_speed, &$start, &$secpersec, &$virtual_seconds)
    {
        $old_start = $start;
        $old_speed = $secpersec;

        $secpersec = $new_speed;
        $start = time();

        $virtual_seconds -= ($start - $old_start) * $old_speed;        
	}

}
