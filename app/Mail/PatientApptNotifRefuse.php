<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientApptNotifRefuse extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $specialty;
    protected $status;
    protected $treatment;
    protected $sub_treatment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$specialty,$status,$treatment,$sub_treatment)
    {
        $this->name = $name;
        $this->specialty = $specialty;
        $this->status = $status;
        $this->treatment = $treatment;
        $this->sub_treatment = $sub_treatment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@medicare.tn')->subject('Appoitment Confirmation Medicare.TN')
        ->view('emails.patient-refused-notification')->with([
            'ehealthname' => $this->name,
            'specialty' => $this->specialty,
            'status' => $this->status,
            'treatment' => $this->treatment,
            'sub_treatment' => $this->sub_treatment,
        ]);
    }
}
