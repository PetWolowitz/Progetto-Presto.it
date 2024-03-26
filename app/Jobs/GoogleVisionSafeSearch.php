<?php

namespace App\Jobs;

use App\Models\Image;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        private $announcement_image_id;
    /**
     * Create a new job instance.
     */
    public function __construct($annoouncement_image_id)
    {
        $this->announcement_image_id= $annoouncement_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->announcement_image_id);
        if(!$i){
            return;
        }

        $image = file_get_contents(storage_path('app/public/' . $i->path));

        // imposto la variabile d'ambiente di google

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe= $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihooddName =[
            'text-secondary fas fa-smile-beam','text-success fas fa-smile-beam','text-warning fas fa-smile-beam','text-danger fas fa-smile-beam','text-dark fas fa-smile-beam'
        ];

        $i->adult = $likelihooddName[$adult];
        $i->medical = $likelihooddName[$medical];
        $i->spoof = $likelihooddName[$spoof];
        $i->violence = $likelihooddName[$violence];
        $i->racy = $likelihooddName[$racy];


        $i->save();
    }
}
