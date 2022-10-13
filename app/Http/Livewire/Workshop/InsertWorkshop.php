<?php

namespace App\Http\Livewire\Workshop;

use App\Models\City;
use App\Models\Type;
use App\Models\User;
use App\Models\Country;
use Livewire\Component;
use App\Models\Category;
use App\Models\Workshop;
use Livewire\WithFileUploads;
use App\Models\workshops_users;
use App\Mail\newWorkshopEmailSender;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;

class InsertWorkshop extends Component
{
    use WithFileUploads;
    public $name;
    public $limited_participants;
    public $description;
    public $city_id;
    public $country_id;
    public $type_id;
    public $category_id;
    public $time;
    public $img_workshop;
    public $filedlink;
    public $workshop;
    public function render()
    {
        return view('livewire.workshop.insert-workshop',[
        'countries'=>Country::all(),
        'cities'=>City::all(),
        'types'=>Type::all(),
        'categories'=>Category::all()]);
    }
    public function insert(){
           if($this->limited_participants == "") $this->limited_participants = null;
           $validatedData = $this->validate([
                'name' => 'required',
                'limited_participants' => 'nullable|numeric|gt:0',
                'description' => 'required',
                'city_id' => 'required',
                'country_id' => 'required',
                'type_id' => 'required',
                'category_id' => 'required',
                'time' => 'date:d-m-y h:i:ss',
                'img_workshop' => 'nullable|image',
                'filedlink' => '',
            ]);
            $validatedData['author'] = Auth::id();

            if($this->img_workshop != null){
    
                $file_name =  $this->img_workshop->store('workshopsImg','public');
            
                $validatedData['img_workshop'] = $file_name;
    
            }

            $workshop_ids =  Workshop::where('category_id',$this->category_id)->get() ->map(function ($item) {
                return $item->id;
            });
    
            $users = workshops_users::whereIn('workshop_id',$workshop_ids)->get();
    
            $emails = array();
            for($i=0;$i<count($users);$i++){
                if (!in_array($users[$i]->user->email, $emails)){
                    $emails[$i] = $users[$i]->user->email;
                }
            }
    
            $workshop = Workshop::create($validatedData);

            $users = User::all();
            $notification = Notification::send($users,new NewNotification($workshop));

            event(new \App\Events\NotificationEvent());

            
            if(count($users)>0)  Mail::to($emails)->send(new newWorkshopEmailSender($workshop->id,$workshop->name));

            $this->dispatchBrowserEvent('workshopInsert');
            
            return redirect()->route('adminsuperadmin.showManageWorkshops');
    }
}
