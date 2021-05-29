<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EhealthApptNotif extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $adresse;
    protected $treatment;
    protected $sub_treatment;
    protected $passage_number;
    protected $start_date;
    protected $care_place; 
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$phone,$adresse,$treatment,$sub_treatment,$passage_number,$start_date,$care_place)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->adresse = $adresse;
        $this->treatment = $treatment;
        $this->sub_treatment = $sub_treatment;
        $this->passage_number = $passage_number;
        $this->start_date = $start_date;
        $this->care_place = $care_place;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@medicare.tn')->subject('New appoitment Medicare.TN')
        ->view('emails.ehealth-appointment-notification')->with([
            'patientname' => $this->name,
            'phone' => $this->phone,
            'adresse' => $this->adresse,
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
            'passage_number' => $this->passage_number,
            'start_date' => $this->start_date,
            'care_place' => $this->care_place,
        ]);
    }
}
