
<?php

use App\Models\Course;
use App\Models\ProgramContent;
use App\Models\SiteLogo;
use App\Models\SocialLiks;


function social_links(){
    $social_links = SocialLiks::first();
    return $social_links;
}

function getFiveCourse()
{
    $latest_five_courses = Course::latest()->take(5)->get();
    return $latest_five_courses;
}
 
function getsitelogo(){
    $logo = SiteLogo::first();
    return $logo;
}

// function slugWiseProgramContent() 
// {
//     $courses = Course::find(1)->slug;
//     return $courses;

//     // $program_contents = ProgramContent::where('slug', $slug)->get();
//     // return $program_contents;

// }