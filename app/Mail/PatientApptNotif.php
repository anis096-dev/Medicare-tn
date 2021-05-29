<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientApptNotif extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $specialty;
    protected $phone;
    protected $adresse;
    protected $status;
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
    public function __construct($name,$specialty,$phone,$adresse,$status,$treatment,$sub_treatment,$passage_number,$start_date,$care_place)
    {
        $this->name = $name;
        $this->specialty = $specialty;
        $this->phone = $phone;
        $this->adresse = $adresse;
        $this->status = $status;
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
        return $this->from('admin@medicare.tn')->subject('Appoitment Confirmation Medicare.TN')
        ->view('emails.patient-appointment-notification')->with([
            'ehealthname' => $this->name,
            'specialty' => $this->specialty,
            'phone' => $this->phone,
            'adresse' => $this->adresse,
            'status' => $this->status,
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
            'passage_number' => $this->passage_number,
            'start_date' => $this->start_date,
            'care_place' => $this->care_place,
        ]);
    }
}
