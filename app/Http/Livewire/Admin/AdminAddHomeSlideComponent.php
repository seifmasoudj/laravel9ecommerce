<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads; 
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }

    public function addSlide()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'numeric',
            'image' => 'required'            
            ]);

        $slider = new HomeSlider();
        $slider->top_title = $this->top_title;
        $slider->title = $this->title;
        $slider->sub_title = $this->sub_title;
        $slider->offer = $this->offer;
        $slider->link = $this->link;
        $slider->status = $this->status;
        $imagename = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('slider',$imagename);
        $slider->image = $imagename;
        $slider->status = $this->status;
        $slider->save();
        session()->flash('message','Slide has been created suceessefully!');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
