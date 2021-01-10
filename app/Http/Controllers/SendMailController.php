<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\SendMail;
use App\Http\Controllers\Mail;
use App\Mail\SendEmailData;

class SendMailController extends Controller
{
    /*
      @Author : Ritesh Rana
      @Desc   : Show the form for send mail.
      @Input  :
      @Output : \Illuminate\Http\Response
      @Date   : 10/01/2021
    */
    public function sendMailForm()
    {
        try{
            return view('sendmail.add');
        }
        catch(\Exception $e)
        {
            Log::error('SendMailController :: view || Error to view Send Mail -> ' . $e->getMessage());
            return back()->with('error',$e->getMessage());
        }
    }

    /*
     @Author : Ritesh Rana
     @Desc   : Store a newly created resource in storage.
     @Input  :\Illuminate\Http\Request  $request
     @Output : \Illuminate\Http\Response
     @Date   : 10/01/2021
      */
      public function sendMailData(Request $request)
      {
          try {
              $validator = Validator::make($request->all(), [
                  'to_mail' => 'required|email',
                  'subject' => 'required|min:3',
                  'content' => 'required|min:10',
                ]);
              // Check validator
              if ($validator->fails()) {
                  return back()->with(['error' => $validator->errors()->first()])->withInput($request->all());
              }
             
              $data = array(
                'email' => $request->to_mail,
                'subject' => $request->subject,
                'contents' => $request->content
              );
              
              //send mail 
              \Mail::send('mail.verification-mail', $data, function($message) use ($data) {
                $message->to($data['email']);
                $message->subject($data['subject']);
              });
                // Start Add send mail data
                  $SmtpInfo = new SendMail();
                  $SmtpInfo->to_mail = $request->to_mail;
                  $SmtpInfo->subject = $request->subject;
                  $SmtpInfo->content = $request->content;
                  $SmtpInfo->save();
                // End Add send mail data
            return back()->with('success', 'Mail Send successfully');
          } catch (\Exception $e) {
              Log::error('smtpInformationForm :: create || Error to create SMTP information -> ' . $e->getMessage());
              return back()->with(['error' => $e->getMessage()]);
          }
      }
}
