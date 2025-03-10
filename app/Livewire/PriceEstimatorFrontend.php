<?php

namespace App\Livewire;

use App\Models\available_schedules;
use App\Models\booked_appointments;
use App\Models\booked_client_details;
use App\Models\booked_patient_details;
use App\Models\holidays;
use DateTime;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Mail\AppointmentBooked;
use Illuminate\Support\Facades\Mail;

class PriceEstimatorFrontend extends Component
{
    public $service_name = "Full Project";

    public $datesArray;

    public $timesArray = [];

    public $bookedTimesArray = [];

    public $parameter;

    public $select_date_string;

    public $theme_mode;

    public $clicked_date;

    public $clicked_time;

    public $clicked_gender;

    public $user_name;

    public $user_email;

    public $user_age;

    public $user_phone;

    public $user_address;

    public $user_needs;

    public $user_problem;

    public $total_estimated_amount;

    public $currency_mode = "USD";

    public $currency_rate = 1;

    public $estimate_options = [];

    public $estimate_options_json;

    public $dollar_rate_in_tk;



    public function mount($service_name, $service_id)
    {

        $this->estimate_options_json = json_encode($this->estimate_options);


        // Theme Mode Stuff

        if (!session('theme_mode')) {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = session('theme_mode');
        }

        //End Theme Mode Stuff


        $this->estimate_options_json = DB::table('price_estimation')->where('id', $service_id)->value('items_array');

        $this->estimate_options = json_decode($this->estimate_options_json, true);

        $this->dollar_rate_in_tk = DB::table('site_data')->where('title', 'dollar_rate_in_tk')->value('data');

        $this->dollar_rate_in_tk = floatval($this->dollar_rate_in_tk);


        $service_name_db = DB::table('price_estimation')->where('id', $service_id)->value('title');

        $this->service_name = $service_name_db;






        // Raff
        //
        //Possible JSON -- ['8:10 -> 9:00 AM' , '9:10 -> 10:00 AM' ,  '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM', '9:10 -> 10:00 AM']
        //
        //
        //
        //Date Specific Saveable (Active)-- ['8:10 -> 9:00 AM', '9:10 -> 10:00 AM']
        //
        //End Raff


        $datesArray = [];
        $today = new DateTime();

        $holidays_database_query = holidays::where('holidays_category', 'weekly')->get();

        // Checking if there is at least one result
        if ($holidays_database_query->isNotEmpty()) {

            // Decoding the 'holidays' field from the first row
            $holidays_get_holidays_field = json_decode($holidays_database_query[0]->holidays);
        } else {

            // Handling the case where no results are found
            $holidays_get_holidays_field = [];
        }


        // Testing
        $annual_holidays_database_query = holidays::where('holidays_category', 'annual')->get();

        // Checking if there is at least one result
        if ($annual_holidays_database_query->isNotEmpty()) {

            // Decoding the 'holidays' field from the first row
            $annual_holidays_get_holidays_field = json_decode($annual_holidays_database_query[0]->holidays);
        } else {

            // Handling the case where no results are found
            $annual_holidays_get_holidays_field = [];
        }
        // End Testing


        while (true) {

            $formattedDate = substr($today->format('Y-m-d'), 5);

            // if(strtoupper($today->format('D')) !== 'FRI' && strtoupper($today->format('D')) !== 'SAT'){
            if (!in_array(strtoupper($today->format('D')), $holidays_get_holidays_field) && !in_array($formattedDate, $annual_holidays_get_holidays_field)) {

                $dateInfo = [
                    'day' => $today->format('d'),
                    'day_name_abbr' => strtoupper($today->format('D')),
                    'month' => $today->format('m'),
                    'year' => $today->format('Y'),
                    'month_name' => $today->format('F'),
                    'identifier' => $today->format('Y-m-d'),
                ];

                $datesArray[] = $dateInfo;
            }

            if (count($datesArray) === 10) {

                break;
            }

            // Move to the next day
            $today->modify('+1 day');
        }

        $this->datesArray = $datesArray;


        // Setting the title Month and Year
        $first_date_month_year = $datesArray[0]['month_name'] . " " . $datesArray[0]['year'];
        $last_date_month_year = $datesArray[count($datesArray) - 1]['month_name'] . " " . $datesArray[count($datesArray) - 1]['year'];

        if ($first_date_month_year == $last_date_month_year) {

            $this->select_date_string = $first_date_month_year;
        } else {

            $this->select_date_string = $first_date_month_year . " - " . $last_date_month_year;
        }



        //Getting the available times from database
        $times_data = available_schedules::where('type', 'general')->get();
        $times_array = json_decode($times_data[0]->schedules, true);

        $this->timesArray = $times_array;
    }



    public function changeThemeMode()
    {

        if ($this->theme_mode == 'light') {

            $this->theme_mode = 'dark';

            session(['theme_mode' => $this->theme_mode]);
        } else {

            $this->theme_mode = 'light';

            session(['theme_mode' => $this->theme_mode]);
        }

        $this->dispatch('alert-manager');
    }



    public function selectedDate($date)
    {

        $this->clicked_date = $date;

        // Processing the available times
        $the_booked_date = booked_appointments::where('date', $this->clicked_date)->get();

        if (count($the_booked_date) > 0) {

            $decoded_appointments = json_decode($the_booked_date[0]->appointments, true);

            // Booked Time Excludced Array
            $this->bookedTimesArray = $decoded_appointments;

            if (count($this->bookedTimesArray) == count($this->timesArray)) {
                session()->flash('message', 'All times are booked. Please select another date.');
            }
        } else {

            $this->bookedTimesArray = [];
        }
    }

    public function selectedTime($time)
    {

        $this->clicked_time = $time;
    }

    public function selectedGender($gender)
    {

        $this->clicked_gender = $gender;
    }

    public function bookAppointment()
    {

        if ($this->clicked_date && $this->clicked_time && $this->user_name && $this->user_email && $this->user_phone && $this->user_needs) {

            // "booked_appointments" Table Management
            $appointments_on_the_specific_date = booked_appointments::where('date', $this->clicked_date)->get();

            if (count($appointments_on_the_specific_date) > 0) {

                $decoded_appointments = json_decode($appointments_on_the_specific_date[0]->appointments, true);

                $updated_decoded_appointments = array_merge($decoded_appointments, [$this->clicked_time]);
                $updated_encoded_appointments = json_encode($updated_decoded_appointments);
                $appointments_on_the_specific_date[0]->update(['appointments' => $updated_encoded_appointments]);
            } else {

                $appointments_on_the_specific_date = new booked_appointments();
                $appointments_on_the_specific_date->date = $this->clicked_date;
                $appointments_on_the_specific_date->appointments = json_encode([$this->clicked_time]);
                $appointments_on_the_specific_date->save();
            }

            // Testing
            //booked_client_details Table Management

            $client_details = new booked_client_details();
            $client_details->name = $this->user_name;
            $client_details->email = $this->user_email;
            $client_details->contact_number = $this->user_phone;
            $client_details->address = $this->user_address ?? "";
            $client_details->written_need = $this->user_needs;
            $client_details->service_name = $this->service_name;
            $client_details->appointment_date = $this->clicked_date;
            $client_details->appointment_time = $this->clicked_time;
            $client_details->estimated_price = $this->total_estimated_amount;
            $client_details->save();

            // End Testing


            // "booked_patient_details" Table Management
            // $patient_details = new booked_patient_details();
            // $patient_details->name = $this->user_name;
            // $patient_details->age = $this->user_age;
            // $patient_details->gender = $this->clicked_gender;
            // $patient_details->contact_number = $this->user_phone;
            // $patient_details->service_name = $this->service_name;
            // $patient_details->written_problem = $this->user_problem;
            // $patient_details->appointment_date = $this->clicked_date;
            // $patient_details->appointment_time = $this->clicked_time;
            // $patient_details->estimated_price = $this->total_estimated_amount;
            // $patient_details->save();

            // Flashing the session message
            session()->flash('client_details', 'Appointment Booked Successfully. Your name is ' . $this->user_name . '. Your email is ' . $this->user_email . '. The service you have selected is "' . $this->service_name .  '". Your described need is "' .  \Illuminate\Support\Str::limit($this->user_needs, 30, '...') . '". You will be contacted at ' . $this->user_phone . ' on ' . $this->clicked_date . ', 30 minutes before your appointment which is scheduled for ' . $this->clicked_time . '.');

            // Send email notification
            $bookingDetails = [
                'name' => $this->user_name,
                'email' => $this->user_email,
                'phone' => $this->user_phone,
                'service' => $this->service_name,
                'date' => $this->clicked_date,
                'time' => $this->clicked_time,
                'needs' => $this->user_needs
            ];

            Mail::to(env('ADMIN_PERSONAL_EMAIL'))->send(new AppointmentBooked($bookingDetails));
        } elseif (!$this->clicked_date) {

            session()->flash('message', 'Please Select A Date');
        } elseif (!$this->clicked_time) {

            session()->flash('message', 'Please Select A Time');
        } elseif (!$this->user_name) {

            session()->flash('message', 'Please Enter Your Name');
        } elseif (!$this->user_email) {

            session()->flash('message', 'Please Enter Your Email');
        } elseif (!$this->user_phone) {

            session()->flash('message', 'Please Enter Your Phone');
        } elseif (!$this->user_needs) {

            session()->flash('message', 'Please Enter Your business needs');
        }
    }

    public function clearMessage()
    {

        session()->flash('message', null);
    }

    public function clear_client_details()
    {

        session()->flash('client_details', null);

        // Clearing the livewire states
        $this->clicked_date = null;

        $this->clicked_time = null;

        $this->user_name = null;

        $this->user_email = null;

        $this->user_phone = null;

        $this->user_address = null;

        $this->user_needs = null;

        $this->bookedTimesArray = [];

        // Sending event to javascript for clearing the input fields
        $this->dispatch('client_details_submitted');
    }

    public function timeBookedAlert($time)
    {

        session()->flash('message', 'Schedule for ' . $time . ' is already booked. Please select another time.');
    }

    // Receiving The Javascript Value From The Livewire Component
    #[On('total_estimated_amount_root_canal_treatment')]
    public function total_estimated_amount_function($total)
    {

        $this->total_estimated_amount = $total;
    }

    public function render()
    {

        // Dispatching this to ensure a consistent state of the total amount string on the frontend
        // $this->dispatch('estimated_price_load_consistency_root_canal_treatment');

        return view('livewire.price-estimator-frontend');
    }

    public function toggle_currency_mode()
    {
        if ($this->currency_mode == 'USD') {
            $this->currency_mode = 'TK';
            $this->currency_rate = $this->dollar_rate_in_tk;
        } else {
            $this->currency_mode = 'USD';
            $this->currency_rate = 1;
        }
        $this->dispatch('currency_updated');
    }
}
