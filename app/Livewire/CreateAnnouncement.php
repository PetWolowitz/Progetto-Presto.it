<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use App\Jobs\Watermark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateAnnouncement extends Component
{   
    use WithFileUploads;
    
    
    public $prova;
    public $title;
    public $body;
    public $price;
    public $category;
    public $temporary_images;
    public $images = [];
    public $announcement;
    
    protected $rules = [
        'title' => 'required|min:6 ',
        'category' => 'required',
        'body' => 'required|min:6',
        'price' => 'required|numeric',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024',
    ];
    
    protected $messages = [
        'title.min' => 'Il titolo deve essere di almeno 6 caratteri',
        'body.min' => 'Il corpo deve essere di almeno 6 caratteri',
        'price.numeric' => 'Il prezzo deve essere un numero',
        'title.required' => 'Il titolo è obbligatorio',
        'body.required' => 'Il corpo è obbligatorio',
        'price.required' => 'Il prezzo è obbligatorio',
        'temporary_images.required' => 'Il campo immagini è obbligatorio',
        'temporary_images.*.image' => 'I file devono essere immagini',
        'temporary_images.*.max' => 'Il file supera il limite di 2MB',
        'images.image' => 'I file devono essere immagini',
        'images.max' => 'Il file supera il limite di 2MB',
    ];
    
    // public function updated($propertyName)
    // {
        //     $this->validateOnly($propertyName);
        // }
        
        public function updatedTemporaryImages()
        {
            if ($this->validate([
                'temporary_images.*' => 'image|max:1024',
                ])) {
                    
                    foreach ($this->temporary_images as $image) {
                        $this->images[] = $image;
                    }
                }
            }
            
            public function removeImage($key)
            {
                if (in_array($key, array_keys($this->images))) {
                    unset($this->images[$key]);
                }
                
            }
            
            public function store(){
                
                //creazione categorie
                $this->validate();
                
                $this->announcement = Category::find($this->category)->announcements()->create($this->validate());
                if (count($this->images)){
                    foreach($this->images as $image) {
                        // $this->announcement->images()->create(['path' => $image->store('images', 'public')]);
                        $newFileName = "announcements/{$this->announcement->id}";
                        $newImage = $this->announcement->images()->create(['path'=> $image->store($newFileName, 'public')]);
                        
                        RemoveFaces::withChain([
                            
                            new ResizeImage($newImage->path, 400 , 300),
                            
                            new GoogleVisionSafeSearch($newImage->id),
                            new GoogleVisionLabelImage($newImage->id),
                            ])->dispatch($newImage->id);
                            
                            
                            
                            
                        }
                        
                        File::deleteDirectory(storage_path('/app/liveWire-tmp'));
                    }
                    
                    
                    
                    
                    
                    Auth::user()->announcements()->save($this->announcement);
                    
                    //Creazione annunci
                    
                    session()->flash('status', 'Annuncio creato correttamente');
                    $this->clear();
                    // $this->redirect('/');
                }
                
                public function clear(){
                    $this->prova="";
                    $this->title='';
                    $this->body='';
                    $this->price='';
                    $this->category='';
                    $this->image = '';
                    $this->images = [];
                    $this->temporary_images = [];
                    $this->form_id = rand();
                }
                
                
                public function mount()
                {
                    $this->categories = Category::all();
                }
                
                public function render()
                {
                    
                    return view('livewire.create-announcement');
                }
            }
            
            