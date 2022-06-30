<?php

namespace App\Http\Controllers;

use App\Models\CIPA;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use SoapClient;
use WsdlToPhp\PackageGenerator\ConfigurationReader\GeneratorOptions;
use WsdlToPhp\PackageGenerator\Generator\Generator;
use RicorocksDigitalAgency\Soap\Facades\Soap;

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
     * @return \Illuminate\Http\Response
     */
    public function company($uin)
    {

        $username = "apiBursR2bc6JhrY1iyFVQNWdoZ845H";  //  username
        $password = "15EKveY1US572yrycjaw5zoBBim1NQpH"; // password
        $url = "https://www.cipa.co.bw/ng-cipa-companies/soap/viewCompanyWS"; // asmx URL of WSDL

        $options = array(
            "trace"=> true,
            "exceptions"=> false,
            'curl_ssl_version' => 3, //Must be version 3 for Orange/EE wsdl
        );

        try {
            $opts = array(
                'http' => array(
                    'user_agent' => 'PHPSoapClient'
                ),
                'ssl' => [
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                ]

            );
            $context = stream_context_create($opts);

            $wsdlUrl = $url;
            $soapClientOptions = array(
                'stream_context' => $context,
                'cache_wsdl' => WSDL_CACHE_NONE
            );

            $client = new SoapClient($wsdlUrl, $soapClientOptions);

            $checkVatParameters = array(
                'countryCode' => 'DK',
                'vatNumber' => '47458714'
            );

            $result = $client->checkVat($checkVatParameters);
            print_r($result);
        }
        catch(\Exception $e) {
            echo $e->getMessage();
        }

        return '';
//        //Data, connection, auth
//        $dataFromTheForm = 'BW00001795884'; // request data from the form
//        $soapUrl = "https://www.cipa.co.bw/ng-cipa-companies/soap/viewCompanyWS"; // asmx URL of WSDL
//        $soapUser = "apiBursR2bc6JhrY1iyFVQNWdoZ845H";  //  username
//        $soapPassword = "15EKveY1US572yrycjaw5zoBBim1NQpH"; // password
//
//        // xml post structure
//
//        $xml_post_string = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:view="http://com.fostermoore.catalyst/service/viewCompanyWS">
//           <soapenv:Header/>
//           <soapenv:Body>
//              <view:Request>
//                 <TxnIdentifier></TxnIdentifier>
//                 <TxnBusinessIdentifier>BW00001795884</TxnBusinessIdentifier>
//              </view:Request>
//           </soapenv:Body>
//        </soapenv:Envelope>';   // data from the form, e.g. some ID number
//
//        $headers = array(
//            "Content-type: text/xml;charset=\"utf-8\"",
//            "Accept: text/xml",
//            "Cache-Control: no-cache",
//            "Pragma: no-cache",
//            "SOAPAction: https://suppre.cipa.support.fostermoore.com/ng-cipa-companies/soap/viewCompanyWS",
//            "Content-length: " . strlen($xml_post_string),
//        ); //SOAPAction: your op URL
//
//        $url = $soapUrl;
//
//        // PHP cURL  for https connection with auth
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
//        curl_setopt($ch, CURLOPT_URL, $url);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_USERPWD, $soapUser . ":" . $soapPassword); // username and password - declared at the top of the doc
//        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
//        curl_setopt($ch, CURLOPT_TIMEOUT, 120);
//        curl_setopt($ch, CURLOPT_POST, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_post_string); // the SOAP request
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//
//        // converting
//        $response = curl_exec($ch);
//        curl_close($ch);
//
//        dd($response);
//
//        // converting
//        $response1 = str_replace("<soap:Body>", "", $response);
//        $response2 = str_replace("</soap:Body>", "", $response1);
//
//        // converting to XML
//        return $parser = simplexml_load_string($response2);
//        // user $parser to get your data out of XML response and to display it.


//        $url = "https://www.cipa.co.bw/ng-cipa-companies/soap/viewCompanyWS";
//
//        //https://www.cipa.co.bw/ng-cipa-companies/soap/viewCompanyWS
//
//        $curl = curl_init($url);
//        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_POST, true);
//        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//
//        //$username = 'P2003802427';
//        //$password = 'ceicmqpZ-39';
//        $username = 'apiBursR2bc6JhrY1iyFVQNWdoZ845H';
//        $password = '15EKveY1US572yrycjaw5zoBBim1NQpH';
//        //print_r($_POST);exit;
//
//            $headers = array(
//                "Content-Type"=>"application/xml",
////                "Accept"=>"application/xml",
//            );
//            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//
//            $data = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:view="http://com.fostermoore.catalyst/service/viewCompanyWS">
//               <soapenv:Header/>
//               <soapenv:Body>
//                  <view:Request>
//                     <TxnIdentifier></TxnIdentifier>
//                     <TxnBusinessIdentifier>BW00001795884</TxnBusinessIdentifier>
//                  </view:Request>
//               </soapenv:Body>
//            </soapenv:Envelope>';
//
//
//            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
//
////for debug only!
//            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
//            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//            curl_setopt($curl, CURLOPT_USERPWD, $username . ":" . $password);
//
//            $resp = curl_exec($curl);
//            curl_close($curl);
//
//            return $resp;
//            //var_dump($resp);
//            //creating object of simpleXmlElement
//            $xml_data_info = new SimpleXMLElement($resp);
//
//            //output thebe xml
//            $xml_data_info->asXML();
//            $simple = "$resp";
//            $p = xml_parser_create();
//            xml_parse_into_struct($p, $resp, $vals, $index);
//            xml_parser_free($p);
//            //echo "Index array\n";
//            //print_r($index);
//            //echo "\nVals array\n";
//            //print_r($vals);
//            //print_r(array_keys($vals));
//            $util = (array_values($vals[4]));
//            //$thebe = (array_values($vals[5]));
//            //echo ($pula[3].sprintf("%01.2f", $thebe[3]));
//
//            return $resp;

//        try {
//            $opts = array(
//                'http' => array(
//                    'user_agent' => 'PHPSoapClient'
//                )
//            );
//            $context = stream_context_create($opts);
//
//            $wsdlUrl = url('files/viewCompanyWS.wsdl');
//            $soapClientOptions = array(
//
//                'cache_wsdl'     => WSDL_CACHE_NONE,
//                'trace'          => 1,
//                'stream_context' => stream_context_create(
//                    [
//                        'ssl' => [
//                            'verify_peer'       => false,
//                            'verify_peer_name'  => false,
//                            'allow_self_signed' => true
//                        ]
//                    ]
//                )
//            );
//
//            $client = new SoapClient($wsdlUrl, $soapClientOptions);
//
//            $checkVatParameters = array(
//                'countryCode' => 'DK',
//                'vatNumber' => '47458714'
//            );
//
//            $result = $client->checkVat($checkVatParameters);
//            return $result;
//        } catch (\Exception $e) {
//            return $e->getMessage();
//        }


//        $client = new SoapClient($url, array('login' => "*******",
//            'password' => "*******"));
//
//        $client->__getTypes();
//        $client->__getFunctions();
//
//        $result = $client->functionName();
//        return $result;


        return $this->successResponse(CIPA::where('UIN', $uin)->with(['shareholders', 'directors', 'addresses', 'auditors', 'secretaries'])->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\CIPA $cIPA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CIPA $cIPA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\CIPA $cIPA
     * @return \Illuminate\Http\Response
     */
    public function destroy(CIPA $cIPA)
    {
        //
    }
}
