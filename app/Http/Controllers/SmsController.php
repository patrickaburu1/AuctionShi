<?php
namespace App\Http\Controllers;
use App\sms\AfricasTalkingGateway;
use App\sms\AfricasTalkingGatewayException;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
class SmsController extends Controller
{
    public function sendSms($recipients, $message){
        /* $recipients="+254710446176";
         $txt="test";
        */
        $username ="patrickaburu";
        $apikey ="535ad24ad7cbbba9120e1f163c657139fb59d5fba898ef116020cb2b3c3233d3";
        // Specify the numbers that you want to send to in a comma-separated list
        // Please ensure you include the country code (+254 for Kenya in this case)
        //    $recipients = "+254723108293";
        // And of course we want our recipients to know what we really do
        //        $message    = "Evening Sir";
        // Create a new instance of our awesome gateway class
        $gateway    = new AfricasTalkingGateway($username, $apikey);
        // Any gateway error will be captured by our custom Exception class below,
        // so wrap the call in a try-catch block
        try
        {
            // Thats it, hit send and we'll take care of the rest.
            $results = $gateway->sendMessage($recipients, $message);
            foreach ($results as $result){
                return $result->status;
            }
        }
        catch ( AfricasTalkingGatewayException $e )
        {
            return "Encountered an error while sending: ".$e->getMessage();
        }
        return 0;
        // DONE!!!
    }
    public function try(Request $request){
        $response= $this->sendSms("254710446176","Message");
        if($response=="success"){
            return $response;
        }
        elseif ($response=="InsufficientBalance"){
            return $response;
        }
        else{
            return "error";
        }
    }
    public function users(){
        $users=User::all();
        return  Response::json($users);
    }
}