<?php

namespace App\Http\Controllers\Gst;

use Aaran\MasterGst\Models\MasterGstEway;
use Aaran\MasterGst\Models\MasterGstIrn;
use Aaran\MasterGst\Models\MasterGstToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class masterGst extends Controller
{
    protected $auth_token = '';

    public function authenticate(Request $request = null)
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
                session()->put('gst_auth_token', $data['data']['AuthToken']);
                $this->auth_token = MasterGstToken::where('token', session()->get('gst_auth_token'))->first();
                if (isset($this->auth_token)) {
                    $obj = MasterGstToken::find($this->auth_token->id);
                    $obj->token = $data['data']['AuthToken'];
                    $obj->expires_at = $data['data']['TokenExpiry'];
                    $obj->save();
                } else {
                    MasterGstToken::create([
                        'token' => $data['data']['AuthToken'],
                        'expires_at' => $data['data']['TokenExpiry'],
                        'user_id' => 1,
                    ]);
                }

                if ($data !== null) {
                    return $data;
                } else {
                    return response()->json(['error' => 'Failed to decode JSON data.'], 500);
                }
            } else {
                return response()->json(['error' => 'Request failed with status code: '.$response->status()],
                    $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: '.$e->getMessage()], 500);
        }
    }


    public function gstDetails(Request $request)
    {
        $obj = MasterGstToken::firstorfail();
        if (isset($obj)) {
            if (Carbon::now()->format('y-m-d H:i:s') < $obj->expires_at) {
                $token = $obj->token;
            } else {
                $this->authenticate();
                $token = session()->get('gst_auth_token');
            }
        }

        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
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

        $obj = MasterGstToken::firstorfail();
        if (isset($obj)) {
            if (Carbon::now()->format('y-m-d H:i:s') < $obj->expires_at) {
                $token = $obj->token;
            } else {
                $this->authenticate();
                $token = session()->get('gst_auth_token');
            }
        }

        $jsonData = [
            "Version" => "1.1",
            "TranDtls" => [
                "TaxSch" => "GST",
                "SupTyp" => "B2B",
            ],
            "DocDtls" => [
                "Typ" => "INV",
                "No" => "$randomletter",
                "Dt" => Carbon::now()->format('d/m/Y'),
            ],
            "SellerDtls" => [
                "Gstin" => "29AABCT1332L000",
                "LglNm" => "ABC company pvt ltd",
                "Addr1" => "5th block, kuvempu layout",
                "Loc" => "GANDHINAGAR",
                "Pin" => 560001,
                "Stcd" => "29",

            ],
            "BuyerDtls" => [
                "Gstin" => "29AWGPV7107B1Z1",
                "LglNm" => "XYZ company pvt ltd",
                "Pos" => "37",
                "Addr1" => "7th block, kuvempu layout",
                "Loc" => "GANDHINAGAR",
                "Pin" => 560001,
                "Stcd" => "29",
            ],
            "DispDtls" => [
                "Nm" => "ABC company pvt ltd",
                "Addr1" => "7th block, kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 518360,
                "Stcd" => "37"
            ],
            "ShipDtls" => [
                "LglNm" => "CBE company pvt ltd",
                "Addr1" => "7th block, kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 518360,
                "Stcd" => "37"
            ],
            "ItemList" => [
                [
                    "SlNo" => "1",
                    "IsServc" => "N",
                    "HsnCd" => "1001",
                    "BchDtls" => [
                        "Nm" => "123456",
                    ],
                    "Qty" => 100.345,
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
            "RefDtls" => [
                "DocPerdDtls" => [
                    "InvStDt" => "01/08/2020",
                    "InvEndDt" => "01/09/2020"
                ],
                "PrecDocDtls" => [
                    [
                        "InvNo" => "DOC/002",
                        "InvDt" => "01/08/2020",
                    ]
                ],
            ],
            "EwbDtls" => [
                "Transid" => "12AWGPV7107B1Z1",
                "Transname" => "XYZ EXPORTS",
                "Distance" => 0,
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
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/GENERATE/version/V1_03?email=aaranoffice%40gmail.com',
                $jsonData);

            if ($response->successful()) {
                $data = $response->json();
                MasterGstIrn::create([
                    'ackno' => $data['data']['AckNo'],
                    'ackdt' => $data['data']['AckDt'],
                    'irn' => $data['data']['Irn'],
                    'signed_invoice' => $data['data']['SignedInvoice'],
                    'signed_qrcode' => $data['data']['SignedQRCode'],
                ]);
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

    public function getIrnCancel(Request $request)
    {

        $obj = MasterGstToken::firstorfail();
        if (isset($obj)) {
            if (Carbon::now()->format('y-m-d H:i:s') < $obj->expires_at) {
                $token = $obj->token;
            } else {
                $this->authenticate();
                $token = session()->get('gst_auth_token');
            }
        }

        $irn_data = MasterGstIrn::find(3);
        $jsonData = [
            "Irn" => $irn_data->irn,
            "CnlRsn" => "1",
            "CnlRem" => "Wrong entry"
        ];
        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/CANCEL/version/V1_03?email=aaranoffice%40gmail.com',
                $jsonData);


            if ($response->successful()) {
//                $data = $response->json();
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

    public function getEwayBill(Request $request)
    {
        $obj = MasterGstToken::firstorfail();
        if (isset($obj)) {
            if (Carbon::now()->format('y-m-d H:i:s') < $obj->expires_at) {
                $token = $obj->token;
            } else {
                $this->authenticate();
                $token = session()->get('gst_auth_token');
            }
        }

        $irn_data = MasterGstIrn::find(7);
        $jsonData = [

            "Irn" => $irn_data->irn,
            "Distance" => 100,
            "TransMode" => "1",
            "TransId" => "12AWGPV7107B1Z1",
            "TransName" => "trans name",
            "TransDocDt" => date('d/m/Y', strtotime($irn_data->ackdt)),
            "TransDocNo" => "TRAN/DOC/11",
            "VehNo" => "KA12ER1234",
            "VehType" => "R",
            "ExpShipDtls" => [
                "Addr1" => "7th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 562160,
                "Stcd" => "29"
            ],
            "DispDtls" => [
                "Nm" => "ABC company pvt ltd",
                "Addr1" => "7th block, kuvempu layout",
                "Addr2" => "kuvempu layout",
                "Loc" => "Banagalore",
                "Pin" => 562160,
                "Stcd" => "29"
            ],
        ];
        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
                'Content-Type' => 'application/json',
            ])->post('https://api.mastergst.com/einvoice/type/GENERATE_EWAYBILL/version/V1_03?email=aaranoffice%40gmail.com',
                $jsonData);


            if ($response->successful()) {
                $data = $response->json();
                MasterGstEway::create([
                    'ewbno'=>$data['data']['EwbNo'],
                    'ewbdt'=>$data['data']['EwbDt'],
                    'ewbvalidtill'=>$data['data']['EwbValidTill'],
                ]);
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


    public function getEwayDetails()
    {
        $obj = MasterGstToken::firstorfail();
        if (isset($obj)) {
            if (Carbon::now()->format('y-m-d H:i:s') < $obj->expires_at) {
                $token = $obj->token;
            } else {
                $this->authenticate();
                $token = session()->get('gst_auth_token');
            }
        }

        $irn_data = MasterGstIrn::find(5);
        try {
            $response = Http::withHeaders([
                'ip_address' => '103.231.117.198',
                'client_id' => '7428e4e3-3dc4-45dd-a09d-78e70267dc7b',
                'client_secret' => '79a7b613-cf8f-466f-944f-28b9c429544d',
                'username' => 'mastergst',
                'auth-token' => $token,
                'gstin' => '29AABCT1332L000',
            ])->get('https://api.mastergst.com/einvoice/type/GETEWAYBILLIRN/version/V1_03', [
                'param1' => $irn_data->irn,
                'supplier_gstn'=>'29AABCT1332L000',
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


}
