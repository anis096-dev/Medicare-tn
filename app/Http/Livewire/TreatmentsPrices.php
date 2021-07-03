<?php

namespace App\Http\Livewire;

use App\Models\Treatment;
use Livewire\Component;
use Livewire\WithPagination;

class TreatmentsPrices extends Component
{
    use WithPagination;
    
    public $perPage = 10;
    public $search = '';

    /**
     * Put your custom public properties here!
     */
    public $name;
    public $specialty;
    public $price_day;
    public $price_night;
    public $price_weekend;
    /**
     * The validation rules
     *
     * @return void
     */
    public function rules()
    {
        return [   
            'name' => ['required', 'max:255'],          
            'specialty' => 'required',          
            'price_day' => 'required',          
            'price_night' => 'required',          
            'price_weekend' => 'required',          
        ];
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $data = Treatment::find($this->modelId);
        // Assign the variables here
        $this->name = $data->name;
        $this->specialty = $data->specialty;
        $this->price_day = $data->price_day;
        $this->price_night = $data->price_night;
        $this->price_weekend = $data->price_weekend;
    }

    /**
     * The read function.
     *
     * @return void
     */
    public function read()
    {
        return Treatment::paginate(5);
    }
    
    /**
     * The searchclear function.
     *
     * @return void
     */
    public function searchClear()
    {
        $this->search = '';
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function alertInfo()
    {
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'info',  'message' => 'Search by name or specialty!']);
    }

    /**
     * The livewire render function.
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.treatments-prices', [
            'data' => Treatment::search($this->search)
            ->paginate($this->perPage),
        ]);
    }
}
