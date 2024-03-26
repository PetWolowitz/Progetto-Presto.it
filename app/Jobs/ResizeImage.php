<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;

use Spatie\Image\Manipulations;
use Spatie\Image\Enums\CropPosition;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Livewire\Features\SupportConsoleCommands\Commands\FileManipulationCommand;


class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $w;
    private $h;
    private $fileName;
    private $path;
    /**
     * Create a new job instance.
     */
    public function __construct($filePath, $w, $h)
    {
        $this->w = $w;
        $this->h = $h;
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path() . '/app/public/' . $this->path . '/' . $this->fileName;
        $destPath = storage_path() . '/app/public/' . $this->path . "/crop{$w}x{$h}_" . $this->fileName;


        $croppedImage = Image::load($srcPath)
            ->crop(Manipulations::CROP_CENTER, $w, $h)
            ->watermark(base_path('resources/img/watermark.png'))
            ->watermarkPosition('bottom-right')
            ->watermarkPadding(10, 10)
            ->watermarkWidth(20, Manipulations::UNIT_PERCENT)
            ->watermarkHeight(20, Manipulations::UNIT_PERCENT)
            ->watermarkFit(Manipulations::FIT_FILL)
            ->watermarkPosition(Manipulations::POSITION_BOTTOM_RIGHT)
            ->watermarkOpacity(50)
            ->save($destPath);
    }
}
