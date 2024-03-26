<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image as SpatieImage; 
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class Watermark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($newImage)
    {
        $this->announcement_image_id = $newImage;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if (!$i) {
            return;
        }

        // $srcPath = storage_path('app/public/' . $i->path);
        $srcPath = $i->getUrl(400,300);

            $image = SpatieImage::load($srcPath);

            $image->watermark(base_path('resources/img/watermark.png'))
                ->watermarkPosition('bottom-right')
                ->watermarkPadding(0, 0)
                ->watermarkWidth(20, Manipulations::UNIT_PERCENT)
                ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
                ->watermarkFit(Manipulations::FIT_FILL)
                ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
                ->watermarkOpacity(50);
                
                
            $image->save($srcPath);
        
    }
}