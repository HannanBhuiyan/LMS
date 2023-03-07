
<?php

use App\Models\Course;
use App\Models\ProgramContent;
use App\Models\SiteLogo;
use App\Models\SocialLiks;


function social_links(){
    return SocialLiks::first();
}

function social_links_count(){
    return SocialLiks::latest()->get()->count();
}


function getFiveCourse()
{
    $latest_five_courses = Course::where('status' , 'on')->latest()->take(5)->get();
    return $latest_five_courses;
}
 
function getsitelogo(){
    $logo = SiteLogo::first();
    return $logo;
}

function logoCount(){
    return SiteLogo::latest()->get()->count(); 
}

// function slugWiseProgramContent() 
// {
//     $courses = Course::find(1)->slug;
//     return $courses;

//     // $program_contents = ProgramContent::where('slug', $slug)->get();
//     // return $program_contents;

// }