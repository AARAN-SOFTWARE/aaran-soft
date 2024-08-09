<?php

namespace App\Http\Controllers\Gst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class masterGst extends Controller
{
    protected $auth_token;

    public function authenticate(Request $request=null)
    {
        try {
            $response = Http::withHeaders([
                'username' => 'mastergst',
                'password' => 'Malli#123',
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'gstin' => '29AABCT1332L000',
            ])->get('https://api.mastergst.com/einvoice/authenticate', [
                'email' => 'aaranoffice@gmail.com',
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $this->auth_token = $data['data']['AuthToken'];
                session()->put('auth_token', $data['data']['AuthToken']);

                if ($data !== null) {
                    return $data;
                } else {
                    return response()->json(['error' => 'Failed to decode JSON data.'], 500);
                }
            } else {
                return response()->json(['error' => 'Request failed with status code: ' . $response->status()], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function gstDetails(Request $request)
    {
        $this->authenticate();
        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => session()->get('auth_token'),
                'gstin' => '29AABCT1332L000',
            ])->get('https://api.mastergst.com/einvoice/type/GSTNDETAILS/version/V1_03', [
                'param1' => '33AAUFB8845Q1ZG',
                'email' => 'aaranoffice@gmail.com',
            ]);
            if ($response->successful()) {
                $data = $response->json();
                if ($data !== null) {
                    return $data;
                } else {
                    return response()->json(['error' => 'Failed to decode JSON data.'], 500);
                }

            } else {
                echo "Request failed with status code: ".$response->status();
            }
        } catch (\Exception $e) {
            echo "An error occurred: ".$e->getMessage();
        }

    }


    public function getIrn(Request $request)
    {
        $length = 5;

        $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"), 0, $length);
        $this->authenticate();

        $jsonData = [
            "Version" => "1.1",
            "TranDtls" => [
                "TaxSch" => "GST",
                "SupTyp" => "B2B",
                "RegRev" => "N",
                "EcmGstin" => null,
                "IgstOnIntra" => "N"
            ],
            "DocDtls" => [
                "Typ" => "INV",
                "No" => "$randomletter",
                "Dt" => "09/08/2024"
            ],
            "SellerDtls" => [
                "Gstin" => "29AABCT1332L000",
                "LglNm" => "ABC company pvt ltd",
                "TrdNm" => "NIC Industries",
                "Addr1" => "5th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "GANDHINAGAR",
                "Pin" => 560001,
                "Stcd" => "29",
                "Ph" => "9000000000",
                "Em" => "abc@gmail.com"
            ],
            "BuyerDtls" => [
                "Gstin" => "29AWGPV7107B1Z1",
                "LglNm" => "XYZ company pvt ltd",
                "TrdNm" => "XYZ Industries",
                "Pos" => "37",
                "Addr1" => "7th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "GANDHINAGAR",
                "Pin" => 560004,
                "Stcd" => "29",
                "Ph" => "9000000000",
                "Em" => "abc@gmail.com"
            ],
            "DispDtls" => [
                "Nm" => "ABC company pvt ltd",
                "Addr1" => "7th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 518360,
                "Stcd" => "37"
            ],
            "ShipDtls" => [
                "Gstin" => "29AWGPV7107B1Z1",
                "LglNm" => "CBE company pvt ltd",
                "TrdNm" => "kuvempu layout",
                "Addr1" => "7th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 518360,
                "Stcd" => "37"
            ],
            "ItemList" => [
                [
                    "SlNo" => "1",
                    "IsServc" => "N",
                    "PrdDesc" => "Rice",
                    "HsnCd" => "1001",
                    "Barcde" => "123456",
                    "BchDtls" => [
                        "Nm" => "123456",
                        "Expdt" => "01/08/2020",
                        "wrDt" => "01/09/2020"
                    ],
                    "Qty" => 100.345,
                    "FreeQty" => 10,
                    "Unit" => "NOS",
                    "UnitPrice" => 99.545,
                    "TotAmt" => 9988.84,
                    "Discount" => 10,
                    "PreTaxVal" => 1,
                    "AssAmt" => 9978.84,
                    "GstRt" => 12,
                    "SgstAmt" => 0,
                    "IgstAmt" => 1197.46,
                    "CgstAmt" => 0,
                    "CesRt" => 5,
                    "CesAmt" => 498.94,
                    "CesNonAdvlAmt" => 10,
                    "StateCesRt" => 12,
                    "StateCesAmt" => 1197.46,
                    "StateCesNonAdvlAmt" => 5,
                    "OthChrg" => 10,
                    "TotItemVal" => 12897.7,
                    "OrdLineRef" => "3256",
                    "OrgCntry" => "AG",
                    "PrdSlNo" => "12345",
                    "AttribDtls" => [
                        [
                            "Nm" => "Rice",
                            "Val" => "10000"
                        ]
                    ]
                ]
            ],
            "ValDtls" => [
                "AssVal" => 9978.84,
                "CgstVal" => 0,
                "SgstVal" => 0,
                "IgstVal" => 1197.46,
                "CesVal" => 508.94,
                "StCesVal" => 1202.46,
                "Discount" => 10,
                "OthChrg" => 20,
                "RndOffAmt" => 0.3,
                "TotInvVal" => 12908,
                "TotInvValFc" => 12897.7
            ],
            "PayDtls" => [
                "Nm" => "ABCDE",
                "Accdet" => "5697389713210",
                "Mode" => "Cash",
                "Fininsbr" => "SBIN11000",
                "Payterm" => "100",
                "Payinstr" => "Gift",
                "Crtrn" => "test",
                "Dirdr" => "test",
                "Crday" => 100,
                "Paidamt" => 10000,
                "Paymtdue" => 5000
            ],
            "RefDtls" => [
                "InvRm" => "TEST",
                "DocPerdDtls" => [
                    "InvStDt" => "01/08/2020",
                    "InvEndDt" => "01/09/2020"
                ],
                "PrecDocDtls" => [
                    [
                        "InvNo" => "DOC/002",
                        "InvDt" => "01/08/2020",
                        "OthRefNo" => "123456"
                    ]
                ],
                "ContrDtls" => [
                    [
                        "RecAdvRefr" => "DOC/002",
                        "RecAdvDt" => "01/08/2020",
                        "Tendrefr" => "Abc001",
                        "Contrrefr" => "Co123",
                        "Extrefr" => "Yo456",
                        "Projrefr" => "Doc-456",
                        "Porefr" => "Doc-789",
                        "PoRefDt" => "01/08/2020"
                    ]
                ]
            ],
            "AddlDocDtls" => [
                [
                    "Url" => "https://einv-apisandbox.nic.in",
                    "Docs" => "Test Doc",
                    "Info" => "Document Test"
                ]
            ],
            "ExpDtls" => [
                "ShipBNo" => "A-248",
                "ShipBDt" => "01/08/2020",
                "Port" => "INABG1",
                "RefClm" => "N",
                "ForCur" => "AED",
                "CntCode" => "AE"
            ],
            "EwbDtls" => [
                "Transid" => "12AWGPV7107B1Z1",
                "Transname" => "XYZ EXPORTS",
                "Distance" => 100,
                "Transdocno" => "DOC01",
                "TransdocDt" => "01/08/2020",
                "Vehno" => "ka123456",
                "Vehtype" => "R",
                "TransMode" => "1"
            ]
        ];

        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => session()->get('auth_token'),
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/GENERATE/version/V1_03?email=aaranoffice%40gmail.com',
                $jsonData);


            if ($response->successful()) {
                return response()->json($response->json());
            } else {
                Log::error('API Request Failed', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'headers' => $response->headers(),
                ]);
                return response()->json([
                    'error' => 'Request failed with status code: '.$response->status(),
                    'message' => $response->body(),
                ], $response->status());
            }
        } catch (\Exception $e) {
            Log::error('An error occurred while fetching IRN', ['exception' => $e->getMessage()]);
            return response()->json(['error' => 'An error occurred: '.$e->getMessage()], 500);
        }
    }

//    public function __invoke()
//    {
//        try {
//
//
////            $url = "https://api.mastergst.com/einvoice/authenticate?email=aaranoffice%40gmail.com";
//
////            $curl = curl_init($url);
////            curl_setopt($curl, CURLOPT_URL, $url);
////            curl_setopt($curl, CURLOPT_POST, true);
////            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
////
////            $headers = array(
////                "accept: */*",
////                "ip_address: 49.37.234.255",
////                "client_id: 7428e4e3-3dc4-45dd-a09d-78e70267dc7b",
////                "client_secret: 79a7b613-cf8f-466f-944f-28b9c429544d",
////                "username: mastergst",
////                "password: Malli#123",
////                "gstin: 29AABCT1332L000",
////                "Content-Type: application/json",
////            );
////            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
////
//////            $data = '{"Version":"1.1","TranDtls":{"TaxSch":"GST","SupTyp":"B2B","RegRev":"N","EcmGstin":null,"IgstOnIntra":"N"},"DocDtls":{"Typ":"INV","No":"INVTWC/101","Dt":"02/10/2022"},"SellerDtls":{"Gstin":"29AABCT1332L000","LglNm":"ABC company pvt ltd","TrdNm":"NIC Industries","Addr1":"5th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"GANDHINAGAR","Pin":560001,"Stcd":"29","Ph":"9000000000","Em":"abc@gmail.com"},"BuyerDtls":{"Gstin":"29AWGPV7107B1Z1","LglNm":"XYZ company pvt ltd","TrdNm":"XYZ Industries","Pos":"37","Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"GANDHINAGAR","Pin":560004,"Stcd":"29","Ph":"9000000000","Em":"abc@gmail.com"},"DispDtls":{"Nm":"ABC company pvt ltd","Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"Banagalore","Pin":518360,"Stcd":"37"},"ShipDtls":{"Gstin":"29AWGPV7107B1Z1","LglNm":"CBE company pvt ltd","TrdNm":"kuvempu layout","Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"Banagalore","Pin":518360,"Stcd":"37"},"ItemList":[{"SlNo":"1","IsServc":"N","PrdDesc":"Rice","HsnCd":"1001","Barcde":"123456","BchDtls":{"Nm":"123456","Expdt":"01/08/2023","wrDt":"01/09/2023"},"Qty":100.345,"FreeQty":10,"Unit":"NOS","UnitPrice":99.545,"TotAmt":9988.84,"Discount":10,"PreTaxVal":1,"AssAmt":9978.84,"GstRt":12,"SgstAmt":0,"IgstAmt":1197.46,"CgstAmt":0,"CesRt":5,"CesAmt":498.94,"CesNonAdvlAmt":10,"StateCesRt":12,"StateCesAmt":1197.46,"StateCesNonAdvlAmt":5,"OthChrg":10,"TotItemVal":12897.7,"OrdLineRef":"3256","OrgCntry":"AG","PrdSlNo":"12345","AttribDtls":[{"Nm":"Rice","Val":"10000"}]}],"ValDtls":{"AssVal":9978.84,"CgstVal":0,"SgstVal":0,"IgstVal":1197.46,"CesVal":508.94,"StCesVal":1202.46,"Discount":10,"OthChrg":20,"RndOffAmt":0.3,"TotInvVal":12908,"TotInvValFc":12897.7},"PayDtls":{"Nm":"ABCDE","Accdet":"5697389713210","Mode":"Cash","Fininsbr":"SBIN11000","Payterm":"100","Payinstr":"Gift","Crtrn":"test","Dirdr":"test","Crday":100,"Paidamt":10000,"Paymtdue":5000},"RefDtls":{"InvRm":"TEST","DocPerdDtls":{"InvStDt":"02/10/2022","InvEndDt":"02/11/2022"},"PrecDocDtls":[{"InvNo":"INVTWC/101","InvDt":"02/10/2022","OthRefNo":"123456"}],"ContrDtls":[{"RecAdvRefr":"DOC/002","RecAdvDt":"01/10/2022","Tendrefr":"Abc001","Contrrefr":"Co123","Extrefr":"Yo456","Projrefr":"Doc-456","Porefr":"Doc-789","PoRefDt":"01/10/2022"}]},"AddlDocDtls":[{"Url":"https://einv-apisandbox.nic.in","Docs":"Test Doc","Info":"Document Test"}],"ExpDtls":{"ShipBNo":"A-248","ShipBDt":"01/08/2020","Port":"INABG1","RefClm":"N","ForCur":"AED","CntCode":"AE"},"EwbDtls":{"Transid":"12AWGPV7107B1Z1","Transname":"XYZ EXPORTS","Distance":100,"Transdocno":"DOC01","TransdocDt":"01/08/2020","Vehno":"ka123456","Vehtype":"R","TransMode":"1"}}';
////
//////            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
////
//////for debug only!
////            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
////            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
////
////            $resp = curl_exec($curl);
////            curl_close($curl);
////            var_dump($resp);
//
//
//            $url = "https://api.mastergst.com/einvoice/authenticate?email=aaranoffice%40gmail.com";
//
//            $response = Http::get($url, [
//                'accept' => '*/*',
//                'username' => 'mastergst',
//                'password' => 'Malli#123',
//                'ip_address' => 'xxx.xxx.xxx.xxx',
//                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
//                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
//                'gstin' => '29AABCT1332L000'
//            ]);
//
//            if ($response->failed()) {
//                return 'failure';
//            } else {
//                dd($response);
//            }
//
//        } catch (\Throwable $th) {
//            throw $th;
//        }
//    }


}
