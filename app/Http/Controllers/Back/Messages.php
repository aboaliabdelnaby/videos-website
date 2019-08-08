<?php

namespace App\Http\Controllers\Back;




use App\Http\Requests\Back\Messages\Store;
use App\Mail\ReplayContact;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;

class Messages extends BackController
{
    //

    public function __construct(Message $model){

        parent::__construct($model);

    }
    public  function replay($id,Store $request){

        $message=$this->model->findOrFail($id);
        Mail::send(new ReplayContact($message,$request->message));
        return redirect()->route('message.edit',['id'=>$message->id]);
    }
}
