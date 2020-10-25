<?php

namespace App\Http\Controllers\BackEnd;

use App\Models\Message;
use App\Http\Requests\BackEnd\Messages\MessagesRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RelayContact;
class MessagesController extends BackEnd
{
    public function __construct(Message $model)
    {
        parent::__construct($model);
    }// end of __constract child function

    public function replay($id , MessagesRequest $request)
    {
        // dd($request->message);
        $message = $this->model->findOrFail($id);
        Mail::send(new RelayContact($message , $request->message));
        return redirect(route('messages.edit' , $message->id));
     }

}
