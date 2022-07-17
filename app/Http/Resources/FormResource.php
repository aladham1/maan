<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->status == 1) {
            $replay_status = "قيد الدراسة";
        } elseif ($this->status == 2) {
            $replay_status = "تم الرد";
        } else {
            $replay_status = "";
        }

        if ($this->form_follow){
            if ($this->form_follow->solve == 1) {
                $reply_notification_status = "تم تبليغ الرد";
            } elseif ($this->status == 2) {
                $reply_notification_status = "لم يتم تبليغ الرد";
            }
        }else{
            $reply_notification_status = " قيد التبليغ";
        }


        if($this->form_follow &&  $this->form_follow->evaluate){
            if($this->form_follow->evaluate == 1){
                $feedback = "راضي بشكل كبير";
            } elseif($this->form_follow->evaluate == 2){
                $feedback = "راضي بشكل متوسط";
            }elseif($this->form_follow->evaluate == 3){
                $feedback = "راضي بشكل ضعيف";
            }elseif($this->form_follow->evaluate == 4){
                $feedback = "غير راضي عن الرد";
            }
            $feedback_date = $this->form_follow->datee;
        }else{
            $feedback = "لا يوجد رد";
            $feedback_date = "_";
        }

        if($this->form_response){
            $response = $this->form_response->response;
             $reply_date = $this->form_response->datee;
        }else{
            $response = "_";
            $reply_date = "_";
        }


        return [
            'id' => $this->id,
            'send_date' => $this->datee,
            'title' => $this->title,
            'fullnane' => $this->citizen->first_name . ' ' . $this->citizen->father_name . ' ' . $this->citizen->grandfather_name . ' ' . $this->citizen->last_name,
            'id_number' => $this->citizen->id_number,
            'project' => $this->project ? $this->project->name : '',
            'category' => $this->category ? $this->category->name : '',
            'form_status' => $this->form_status->name,
            'form_type' => $this->form_type->name,
            'mobile' => $this->citizen->mobile,
            'mobile2' => $this->citizen->mobile2,
            'governorate' => $this->citizen->governorate,
            'city' => $this->citizen->city,
            'street' => $this->citizen->street,
            'files' => $this->form_files,
            'reply_status' =>  $replay_status ,
            'reply_details' =>  $response ,
            'reply_date' => $reply_date,
            'reply_notification_status' => $reply_notification_status,
            'feedback' => $feedback,
            'reply_notification_date' => $feedback_date,
        ];
    }
}
