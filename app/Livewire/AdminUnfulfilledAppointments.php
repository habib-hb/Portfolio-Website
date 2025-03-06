<?php

namespace App\Livewire;

use App\Models\booked_appointments;
use App\Models\booked_client_details;
use App\Models\booked_patient_details;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\WithPagination;

class AdminUnfulfilledAppointments extends Component
{

    use WithPagination;

    public $all_appointments = [];

    public $database_offset = 0;

    public $database_limit = 10;



    //System Variables
    public $appointment_fulfilled_selected_id = [];

    public $appointment_fulfilled_notification = null;

    public $appointment_restored_selected_id = [];

    public $appointment_restored_notification = null;

   public $appointment_deletable_id;

   public $appointment_deletable_identification_date;

   public $appointment_deletable_identification_time;

   public $appointment_deleted_selected_id = [];

   public $appointment_deleted_notification = null;



     //All the filter options
     public $selected_services = [];

     public $name_filter;

     public $email_filter;

     public $min_age_filter;

     public $max_age_filter;

     public $gender_filter;

     public $filter_phone;

     public $min_estimated_filter;

     public $max_estimated_filter;

     public $filtered = false;

     public $filter_start_date;

     public $filter_end_date;

     public $filtered_appointments;

     public $filter_button_is_clicked=false;

     public $filter_no_more_appointments_on=false;

     public $notification;

     public $services_name_array=[];

     public $services_name_array_json;




    public function mount(){

        $appointments = \App\Models\booked_client_details::where('appointment_status' , 'Unfulfilled')->orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();


        // Filtered Array
        $appointments = $appointments->toArray();


        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments);



         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;

         $this->services_name_array = DB::table('price_estimation')->pluck('title')->toArray();

         $this->services_name_array_json = json_encode($this->services_name_array);

    }

    public function loadMore(){

        if($this->filtered){

            if(count($this->filtered_appointments) == count($this->all_appointments)){

                $this->filter_no_more_appointments_on = true;

            }

            $this->all_appointments = array_slice($this->filtered_appointments, 0, ($this->database_limit + $this->database_offset));



            if(count($this->filtered_appointments) == count($this->all_appointments)){

                    // Doing this to show the message after the last load
                    if($this->filter_no_more_appointments_on){

                        session()->flash('no_more_appointments', 'No More Appointments Found');

                    }

                $this->filter_no_more_appointments_on = true;

                return;

            }

            //Increase the offset for the next load
            $this->database_offset += $this->database_limit;

            return;

        }


        $appointments = \App\Models\booked_client_details::where('appointment_status' , 'Unfulfilled')->orderBy('appointment_date', 'desc')
        ->skip($this->database_offset)
        ->take($this->database_limit)
        ->get();


        // Filtered Array
        $appointments = $appointments->toArray();

        if(count($appointments) == 0){
            session()->flash('no_more_appointments', 'No More Appointments Found');
        }

        //Merging Both Arrays
        $this->all_appointments = array_merge($this->all_appointments, $appointments);


         // Increase the offset for the next load
         $this->database_offset += $this->database_limit;


    }

    #[On('notify-from-child-component')]
    public function changeThemeMode(){

        if(session('theme_mode') == 'light'){

            session(['theme_mode' => 'dark']);

        }else{


            session(['theme_mode' => 'light']);

        }

        $this->dispatch('alert-manager');

    }


    public function clear_no_more_appointments(){

        session()->flash('no_more_appointments', null);

    }


    public function markAsFulfilled($id){


        $update = \App\Models\booked_client_details::find($id);
        $update->appointment_status = 'Fulfilled';
        $update->save();

        // session()->flash('appointment_unfulfilled', 'Appointment Has Been Marked Unfulfilled');
        $this->appointment_fulfilled_selected_id[]=$id;

        $this->appointment_fulfilled_notification="Appointment Has Been Marked Fulfilled";

    }

    public function restoreAppointment($id){

        $update = \App\Models\booked_client_details::find($id);
        $update->appointment_status = null;
        $update->save();

        // session()->flash('appointment_fulfilled', 'Appointment Has Been Marked Fulfilled');
        $this->appointment_restored_selected_id[]=$id;

        $this->appointment_restored_notification="Appointment Has Been Restored";
    }

    public function clear_appointment_fulfilled(){

        // session()->flash('appointment_unfulfilled', "Close");

        $this->appointment_fulfilled_notification=null;



    }

    public function clear_appointment_restored(){

        // session()->flash('appointment_fulfilled', null);

        $this->appointment_restored_notification=null;



    }



    public function delete_appointment($id , $date , $time){

        // This deletion will be done once the user confirms
        $this->appointment_deletable_id = $id;

        $this->appointment_deletable_identification_date= $date;

        $this->appointment_deletable_identification_time= $time;



    }



    public function delete_confirmed(){

        // "booked_appointments" Table Management
        $appointments_on_the_specific_date=booked_appointments::where('date' , $this->appointment_deletable_identification_date)->get();

        if(count($appointments_on_the_specific_date) > 0){

            $decoded_appointments = json_decode($appointments_on_the_specific_date[0]->appointments, true);

            // Removing $this->clicked_time from the $decoded_appointments array
            $updated_decoded_appointments = array_filter($decoded_appointments, function($appointment) {
               return $appointment !== $this->appointment_deletable_identification_time;
           });

           // Re-indexing the array to ensure it's sequentially indexed if needed
            $updated_decoded_appointments = array_values($updated_decoded_appointments);

            $updated_encoded_appointments = json_encode($updated_decoded_appointments);

            $appointments_on_the_specific_date[0]->update(['appointments' => $updated_encoded_appointments]);

        }

       $delete = booked_client_details::find($this->appointment_deletable_id);
       $delete->delete();

       $this->appointment_deleted_selected_id[] = $this->appointment_deletable_id;

       $this->appointment_deleted_notification="Appointment Has Been Deleted";

       $this->appointment_deletable_id = null;

       $this->appointment_deletable_identification_date = null;

       $this->appointment_deletable_identification_time = null;


   }


   public function clear_appointment_deleted_notification(){

    $this->appointment_deleted_notification=null;

}




    #[On('save_data')]
    public function save_data($start_date = null , $end_date = null, $selected_services = []){

        $this->filtered = false;

        $this->filter_start_date = $start_date;

        $this->filter_end_date = $end_date;



            // $decoded_selected_services = json_decode($selected_services, true);

        $this->selected_services = $selected_services;




        // Query Database
        $appointmentsQuery = booked_client_details::query();

        $appointmentsQuery->where('appointment_status', 'Unfulfilled');

        if(!$this->filter_start_date == null && !$this->filter_end_date == null){

            $appointmentsQuery->whereBetween('appointment_date', [$this->filter_start_date, $this->filter_end_date]);

            $this->filtered = true;

        }

        if(!$this->selected_services == []){

            $appointmentsQuery->whereIn('service_name', $this->selected_services);

            $this->filtered = true;


        }


        if(!$this->name_filter == null){

            $appointmentsQuery->where('name', 'like', '%' . $this->name_filter . '%');

            $this->filtered = true;


        }


        if(!$this->email_filter == null){

            $appointmentsQuery->where('email', 'like', '%' . $this->email_filter . '%');

            $this->filtered = true;


        }



        if(!$this->filter_phone == null){

            $appointmentsQuery->where('contact_number', 'like', '%' . $this->filter_phone . '%');

            $this->filtered = true;


        }


        if(!$this->min_estimated_filter == null && !$this->max_estimated_filter == null){

            $appointmentsQuery->whereBetween('estimated_price', [$this->min_estimated_filter, $this->max_estimated_filter]);

            $this->filtered = true;


        }

        if($this->filtered){

            // $this->filtered_appointments = $appointmentsQuery;

            $this->database_offset= 0;

            $toArray = $appointmentsQuery->orderBy('appointment_date', 'desc')->get()->toArray();

            $this->filtered_appointments = $toArray;

            $this->all_appointments = array_slice($this->filtered_appointments, $this->database_offset, ($this->database_limit + $this->database_offset));

            //Increase the offset for the next load
            $this->database_offset += $this->database_limit;

        }else{

            $this->notification = "No Filter Option Has Been Set";

        }


    $this->filter_option_button_clicked();



    }


    #[On('clear_data')]
    public function clear_data(){

        $this->filter_start_date = null;
        $this->filter_end_date = null;
        $this->selected_services = [];

        $this->name_filter = null;
        $this->email_filter = null;
        $this->min_age_filter = null;
        $this->max_age_filter = null;
        $this->gender_filter = null;
        $this->filter_phone = null;
        $this->min_estimated_filter = null;
        $this->max_estimated_filter = null;

        $this->filtered=false;
        $this->filter_no_more_appointments_on=false;

        // Resetting the Data to it's previous state
        $this->all_appointments = [];
        $this->filtered_appointments = [];
        $this->database_offset= 0;
            $appointments = \App\Models\booked_client_details::where('appointment_status' , 'Unfulfilled')->orderBy('appointment_date', 'desc')
            ->skip($this->database_offset)
            ->take($this->database_limit)
            ->get();

            //Filtered Array
            $appointments = $appointments->toArray();


            //Merging Both Arrays
            $this->all_appointments = array_merge($this->all_appointments, $appointments);



            //Increase the offset for the next load
            $this->database_offset += $this->database_limit;



    }


    public function selectedGender($gender){

        if($this->gender_filter == $gender){

            $this->gender_filter = null;

        }else{

            $this->gender_filter = $gender;

        }


    }


    public function clear_notification(){

        $this->notification = null;

    }


    public function filter_option_button_clicked(){

        if($this->filter_button_is_clicked){

            $this->filter_button_is_clicked = false;

        }else{

            $this->filter_button_is_clicked = true;

        }

    }



    #[On('hide_filter_section')]
    public function hide_filter_section(){

        $this->filter_option_button_clicked();

    }


    public function clear_appointment_deletable_id(){

        $this->appointment_deletable_id = null;

        $this->appointment_deletable_identification_date= null;

        $this->appointment_deletable_identification_time= null;

    }





    public function render()
    {
        return view('livewire.admin-unfulfilled-appointments');
    }
}
