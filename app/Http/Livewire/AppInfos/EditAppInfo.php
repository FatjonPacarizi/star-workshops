<?php

namespace App\Http\Livewire\AppInfos;

use Livewire\Component;
use App\Models\Informations;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditAppInfo extends Component
{
    use WithFileUploads;
    public $app_name;
    public $facebook;
    public $instagram;
    public $twitter;
    public $linkedin;
    public $logo_name;
    public $appinfos;


    public function mount(){
        $this->appinfos = Informations::all()->last();
        $this->app_name = $this->appinfos->app_name;
        $this->facebook = $this->appinfos->facebook;
        $this->instagram = $this->appinfos->instagram;
        $this->twitter = $this->appinfos->twitter;
        $this->linkedin = $this->appinfos->linkedin;
    }
    public function render()
    {
        return view('livewire.app-infos.edit-app-info',['informations'=>$this->appinfos]);
    }
    public function update(){
        $validatedData = $this->validate([
             'app_name' => 'required',
             'facebook' => '',
             'instagram' => '',
             'twitter' => '',
             'linkedin' => '',
         ]);
        
         if($this->logo_name != null){
 
             $file_name =  $this->logo_name->store('logos','public');
         
             $validatedData['logo_name'] = $file_name;
 
             $oldLogo = $this->appinfos->logo_name;
         }
 
         $this->appinfos->update($validatedData);
 
         // delete old img only when db update is succesful
         if($this->logo_name != null){
             Storage::delete('/public/' .$oldLogo);
         }
         $this->dispatchBrowserEvent('appinfosUpdate');
     }
}
