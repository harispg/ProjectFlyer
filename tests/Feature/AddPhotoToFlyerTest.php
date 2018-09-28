<?php

namespace App;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Mockery as m;

class AddPhotoToFlyerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_to_heck_if_flyer_has_photo()
    {
        

    	$flyer = factory(Flyer::class)->create();

    	$file = m::mock(UploadedFile::class, [
    		'getClientOriginalName' => 'foo',
    		'getClientOriginalExtension' => 'jpg'
    	]);

    	$file->shouldReceive('move')
    		 ->once()
    		 ->with('Images/flyer', 'nowfoo.jpg');

    	$thumbnail = m::mock(Thumbnail::class);

    	$thumbnail->shouldReceive('make')
    			  ->once()
    			  ->with('Images/flyer/nowfoo.jpg', 'Images/flyer/tn-nowfoo.jpg');

    	$form = new AddPhotoToFlyer($flyer, $file, $thumbnail);

    	$form->save();

    	$this->assertCount(1, $flyer->photos);
    }

}

function time()
{
	return 'now';
}

function sha1($name)
{
	return $name;
}
