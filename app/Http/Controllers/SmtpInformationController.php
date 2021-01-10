<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\SmtpInformation;

class SmtpInformationController extends Controller
{
    /*
      @Author : Ritesh Rana
      @Desc   : Show the form for creating a new resource.
      @Input  :
      @Output : \Illuminate\Http\Response
      @Date   : 10/01/2021
    */
    public function smtpInformationForm()
    {
        
        try{
            $smtpinfo = SmtpInformation::first();
            if(!empty($smtpinfo)){
                return view('smtpinformation.add',compact('smtpinfo'))->render();
            }else{
                return view('smtpinformation.add');
            }
            //return view('smtpinformation.add');
        }
        catch(\Exception $e)
        {
            Log::error('smtpInformationForm :: view || Error to view user -> ' . $e->getMessage());
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
      public function saveSmtpInfp(Request $request)
      {
          try {
              $validator = Validator::make($request->all(), [
                  'site_name' => 'required',
                  'smtp_driver' => 'required',
                  'smtp_host' => 'required',
                  'username' => 'required',
                  'smtp_password' => 'required',
                  'from_name' => 'required',
                  'smtp_encryption' => 'required',
                  'from_email' => 'required',
                ]);
              // Check validator
              if ($validator->fails()) {
                  return back()->with(['errors' => $validator->errors()->first()])->withInput($request->all());
              }
              if (empty($request->smtpinfo_id)) {
                  // Start Add Smtp Information
                  $SmtpInfo = new SmtpInformation();
                  $SmtpInfo->site_name = $request->site_name;
                  $SmtpInfo->smtp_driver = $request->smtp_driver;
                  $SmtpInfo->smtp_host = $request->smtp_host;
                  $SmtpInfo->username = $request->username;
                  $SmtpInfo->smtp_password = $request->smtp_password;
                  $SmtpInfo->from_name = $request->from_name;
                  $SmtpInfo->site_name = $request->site_name;
                  $SmtpInfo->smtp_encryption = $request->smtp_encryption;
                  $SmtpInfo->from_email = $request->from_email;
                  $SmtpInfo->save();
                  $SmtpInfo_id = $SmtpInfo->id;
                  // End Add SmtpInformation
              } else {
                  // Start Edit Smtp Information
                  $SmtpInfo_id = $request->smtpinfo_id;
                  $SmtpInfoEdit['site_name'] = $request->site_name;
                  $SmtpInfoEdit['smtp_driver'] = $request->smtp_driver;
                  $SmtpInfoEdit['smtp_host'] = $request->smtp_host;
                  $SmtpInfoEdit['username'] = $request->username;
                  $SmtpInfoEdit['smtp_password'] = $request->smtp_password;
                  $SmtpInfoEdit['from_name'] = $request->from_name;
                  $SmtpInfoEdit['site_name'] = $request->site_name;
                  $SmtpInfoEdit['smtp_encryption'] = $request->smtp_encryption;
                  $SmtpInfoEdit['from_email'] = $request->from_email;
                  $smtpinfo = SmtpInformation::where('id', $SmtpInfo_id)->first();
                  $smtpinfo->update($SmtpInfoEdit);
                  // End Edit SmtpInformation
              }
              $editHtml = $this->updateSmtpInfo($SmtpInfo_id);
              // End Add Capture Fields
             return response()->json(['status' => 'success', 'message' => 'SMTP Information successfully created', 'html' => $editHtml, 'smtpinfo_id' => $SmtpInfo_id], 200);
          } catch (\Exception $e) {
              Log::error('smtpInformationForm :: create || Error to create SMTP information -> ' . $e->getMessage());
              return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
          }
      }
  
/*
         @Author : Ritesh Rana
         @Desc   : Display the specified Smtp Information view.
         @Input  : int  $id
         @Output : \Illuminate\Http\Response
         @Date   : 10/01/2021
    */
    public function updateSmtpInfo($SmtpInfo_id)
    {
        Log::info('SmtpInformationController :: update || get Smtp Information Data');
        $smtpinfo = SmtpInformation::where('id', $SmtpInfo_id)->first();
        return view('smtpinformation.edit',compact('smtpinfo'))->render();
    }
    
}
