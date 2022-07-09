<?php

namespace App\Http\Controllers;

use App\Models\CIPA;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SimpleXMLElement;
use SoapClient;

class CIPAController extends Controller
{

    use ApiResponser;


    /**
     * Construct a new instance. Calls the soap service and creates an endpoint, gets methods
     */
    public function __construct()
    {
//        $this->options = array(
//            'soap_version' => SOAP_1_1,
//            'exceptions' => true,
//            'trace' => 1,
//            'cache_wsdl' => WSDL_CACHE_MEMORY,
//            'login' => 'apiBursR2bc6JhrY1iyFVQNWdoZ845H',
//            'password' => '15EKveY1US572yrycjaw5zoBBim1NQpH',
//            'connection_timeout' => 25,
//            'style' => SOAP_RPC,
//            'use' => SOAP_ENCODED,
//        );
//
//        $this->client = new \SoapClient(url('files/viewCompanyWS.wsdl') . '?WSDL', $this->options);
    }


    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function companies(Request $request)
    {
        $page = 1;
        if ($request->query('page')) {
            $page = $request->query('page');
        }

        $data = CIPA::orderBy('id', 'ASC')->paginate(10, ['*'], 'page', $page);
        $ids = CIPA::pluck('UIN')->toArray();
        return $this->successResponse($data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function company($uin)
    {

        $data = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:view="http://com.fostermoore.catalyst/service/viewCompanyWS">
   <soapenv:Header/>
   <soapenv:Body>
      <view:Request>
         <!--Optional:-->
         <TxnIdentifier></TxnIdentifier>
         <!--Optional:-->
         <TxnBusinessIdentifier>'.$uin.'</TxnBusinessIdentifier>
      </view:Request>
   </soapenv:Body>
</soapenv:Envelope>';

        $headers = array(
            "Content-type: text/xml;charset=\"utf-8\"",
            "Accept: application/xml",
            //"Cache-Control: no-cache",
            //"Pragma: no-cache",
            //"Content-length: ".strlen($data),
        );

        $url = "https://www.cipa.co.bw/ng-cipa-companies/soap/viewCompanyWS?wsdl";
        $username = 'apiBursR2bc6JhrY1iyFVQNWdoZ845H';
        $password = '15EKveY1US572yrycjaw5zoBBim1NQpH';


        /*$headers = array(
           "Content-Type: application/json",
           "Accept: application/xml",
           "Authentication-Type: Preemptive",
           "Authorization: Basic ".$username.":".$password,
        );*/

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
//curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);


//for debug only!
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($ch);
        /*if(curl_error($ch)) {
          echo 'error:' . curl_error($ch);
        }
        else {
          echo"Response - ".$output;
        }   */
//$info = curl_getinfo($ch);
        curl_close($ch);
//print_r($info);
//print_r($output);exit;

        $output = str_replace("cat:", '', $output);
        $output = str_replace("soapenv:", '', $output);


//creating object of simpleXmlElement
        $xml_data_info = new SimpleXMLElement($output);


        //output the xml
        $xml_data_info->asXML();
//        $simple = "$output";
        $p = xml_parser_create();
        xml_parse_into_struct($p, $output, $vals, $index);
        xml_parser_free($p);
//echo "Index array\n";
//print_r($index);
//echo "\nVals array\n";
//print_r($vals);
//print_r(array_values($vals));exit;
        $requin = (array_values($vals[5]));
        $responseuin = $requin[3];
//print_r($responseuin);exit;
        if($responseuin=="$uin"){
            $jsonData = json_encode(simplexml_load_string($output), JSON_PRETTY_PRINT);
            $jsonData = json_decode($jsonData, true);
            return $this->successResponse($jsonData);
        }
        else {
            return $this->errorResponse("Company with uin $uin not found", Response::HTTP_NOT_FOUND);
        }


        return $this->successResponse(CIPA::where('UIN', $uin)->with(['shareholders', 'directors', 'addresses', 'auditors', 'secretaries'])->firstOrFail());
    }

    public function xml2js($xmlnode) {
        $root = (func_num_args() > 1 ? false : true);
        $jsnode = array();

        if (!$root) {
            if (count($xmlnode->attributes()) > 0){
                $jsnode["$"] = array();
                foreach($xmlnode->attributes() as $key => $value)
                    $jsnode["$"][$key] = (string)$value;
            }

            $textcontent = trim((string)$xmlnode);
            if (count($textcontent) > 0)
                $jsnode["_"] = $textcontent;

            foreach ($xmlnode->children() as $childxmlnode) {
                $childname = $childxmlnode->getName();
                if (!array_key_exists($childname, $jsnode))
                    $jsnode[$childname] = array();
                array_push($jsnode[$childname], $this->xml2js($childxmlnode, true));
            }
            return $jsnode;
        } else {
            $nodename = $xmlnode->getName();
            $jsnode[$nodename] = array();
            array_push($jsnode[$nodename], $this->xml2js($xmlnode, true));
            return json_encode($jsnode);
        }
    }

}
