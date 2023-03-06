<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = Banner::all();
        if($banner->count() > 0){
            foreach($banner as $ban){
                $ban->delete();
            }
        }
        
        Banner::create([
            'title_one' => 'Start your tech',
            'title_two' => 'journey with us',
            'description' => 'Farjax Tech & Consulting Inc is an IT consulting company headquartered in New York, USA, providing services like , Business Consulting , Application Development & Management , Talent Acquisitions, Job Placement and training.',
            'banner_image' => 'backend/assets/uploads/banner/banner.png'
        ]);
    }
}
