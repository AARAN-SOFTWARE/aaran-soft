<?php

namespace App\Livewire\MasterGst\Einvoice;

use Livewire\Component;

class Index extends Component
{
    public $message;

    public string $username = 'mastergst';
    public string $password = 'Malli#123';
    public string $ip_address = '49.47.218.240';
    public string $client_id = '7428e4e3-3dc4-45dd-a09d-78e70267dc7b';
    public string $client_secret = '79a7b613-cf8f-466f-944f-28b9c429544d';
    public string $gstin = '29AABCT1332L000';
    public $url = "https://api.mastergst.com/einvoice/authenticate?email=aaranoffice%40gmail.com";
    public string $auth_token = '48izP3QFR8rIHsSaZWQmkFgYV';
    public string $token_expiry = '';
    public string $client_details = '';
    public string $secret = '';
    public string $search_gst = '33AAUFB8845Q1ZG';

    public function AuthEinvoice()
    {
        $url = "https://api.mastergst.com/einvoice/authenticate?email=aaranoffice%40gmail.com";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: */*",
            "username: " . $this->username,
            "password: " . $this->password,
            "ip_address: " . $this->ip_address,
            "client_id: " . $this->client_id,
            "client_secret: " . $this->client_secret,
            "gstin: " . $this->gstin,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        $dataJSON = json_decode($resp);

        $this->auth_token = $dataJSON->data->AuthToken;
        $this->token_expiry = $dataJSON->data->TokenExpiry;
        $this->client_details = $dataJSON->data->ClientId;
        $this->secret = $dataJSON->data->Sek;

        return $dataJSON;
    }

    public function getGstDetails()
    {

        $url = "https://api.mastergst.com/einvoice/type/GSTNDETAILS/version/V1_03?param1=" . $this->search_gst . "&email=aaranoffice%40gmail.com";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: */*",
            "ip_address: " . $this->ip_address,
            "client_id: " . $this->client_id,
            "client_secret: " . $this->client_secret,
            "username: " . $this->username,
            "auth-token: " . $this->auth_token,
            "gstin: " . $this->gstin,
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $resp = curl_exec($curl);
        curl_close($curl);
        $dataJSON = json_decode($resp);
        dd($dataJSON);

//        +"Gstin": "33AAUFB8845Q1ZG"
//    +"TradeName": "BOYANCE INDIA"
//    +"LegalName": "BOYANCE INDIA"
//    +"AddrBnm": ""
//    +"AddrBno": "31"
//    +"AddrFlno": ""
//    +"AddrSt": "PULIKUTHI STREET NO-4"
//    +"AddrLoc": "GUGAI SALEM"
//    +"StateCode": 33
//    +"AddrPncd": 636006
//    +"TxpType": "REG"
//    +"Status": "ACT"
//    +"BlkStatus": "U"
//    +"DtReg": "2019-05-31"
//    +"DtDReg": null

    }


    public function generateIrn()
    {
        $url = "https://api.mastergst.com/einvoice/type/GENERATE/version/V1_03?email=xxxxxxxx%40gmail.com";

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: */*",
            "ip_address: " . $this->ip_address,
            "client_id: " . $this->client_id,
            "client_secret: " . $this->client_secret,
            "username: " . $this->username,
            "auth-token: " . $this->auth_token,
            "gstin: " . $this->gstin,
            "Content-Type: application/json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $data = $this->getData();

        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $resp = curl_exec($curl);
        curl_close($curl);
        $dataJSON = json_decode($resp);
        dd($dataJSON);

    }

    public function getData()
    {
        return '{
        "Version":"1.1",
        "TranDtls":{"TaxSch":"GST","SupTyp":"B2B","RegRev":"N","EcmGstin":null,"IgstOnIntra":"N"},
        "DocDtls":{"Typ":"INV","No":"INVTWC/1125","Dt":"16/06/2024"},

        "SellerDtls":{"Gstin":"29AABCT1332L000","LglNm":"ABC company pvt ltd","TrdNm":"NIC Industries",
        "Addr1":"5th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"GANDHINAGAR",
        "Pin":560001,"Stcd":"29","Ph":"9000000000","Em":"abc@gmail.com"},

        "BuyerDtls":{"Gstin":"29AWGPV7107B1Z1","LglNm":"XYZ company pvt ltd","TrdNm":"XYZ Industries",
        "Pos":"37","Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"GANDHINAGAR","Pin":560004,
        "Stcd":"29","Ph":"9000000000","Em":"abc@gmail.com"},

        "DispDtls":{"Nm":"ABC company pvt ltd","Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout",
        "Loc":"Banagalore","Pin":518360,"Stcd":"37"},

        "ShipDtls":{"Gstin":"29AWGPV7107B1Z1","LglNm":"CBE company pvt ltd","TrdNm":"kuvempu layout",
        "Addr1":"7th block, kuvempu layout","Addr2":"kuvempu layout","Loc":"Banagalore","Pin":518360,"Stcd":"37"},

        "ItemList":[
        {
        "SlNo":"1",
        "IsServc":"N",
        "PrdDesc":"Rice",
        "HsnCd":"1001",
        "Barcde":"123456",

        "BchDtls":{"Nm":"123456","Expdt":"16/06/2024","wrDt":"16/06/2024"},

        "Qty":100.345,
        "FreeQty":10,
        "Unit":"NOS",
        "UnitPrice":99.545,
        "TotAmt":9988.84,
        "Discount":10,
        "PreTaxVal":1,
        "AssAmt":9978.84,
        "GstRt":12,
        "SgstAmt":0,
        "IgstAmt":1197.46,
        "CgstAmt":0,
        "CesRt":5,
        "CesAmt":498.94,
        "CesNonAdvlAmt":10,
        "StateCesRt":12,
        "StateCesAmt":1197.46,
        "StateCesNonAdvlAmt":5,
        "OthChrg":10,
        "TotItemVal":12897.7,
        "OrdLineRef":"3256",
        "OrgCntry":"AG",
        "PrdSlNo":"12345",

        "AttribDtls":[{"Nm":"Rice","Val":"10000"}]}],

        "ValDtls":{
        "AssVal":9978.84,
        "CgstVal":0,
        "SgstVal":0,
        "IgstVal":1197.46,
        "CesVal":508.94,
        "StCesVal":1202.46,
        "Discount":10,"OthChrg":20,
        "RndOffAmt":0.3,
        "TotInvVal":12908,
        "TotInvValFc":12897.7
        },

        "PayDtls":{
        "Nm":"ABCDE",
        "Accdet":"5697389713210",
        "Mode":"Cash",
        "Fininsbr":"SBIN11000",
        "Payterm":"100",
        "Payinstr":"Gift",
        "Crtrn":"test",
        "Dirdr":"test",
        "Crday":100,
        "Paidamt":10000,
        "Paymtdue":5000
        },

        "RefDtls":{
        "InvRm":"TEST",
        "DocPerdDtls":{"InvStDt":"16/06/2024","InvEndDt":"16/06/2024"},

        "PrecDocDtls":[{"InvNo":"INVTWC/1051","InvDt":"16/06/2024","OthRefNo":"123456"}],

        "ContrDtls":[{"RecAdvRefr":"DOC/002","RecAdvDt":"16/06/2024","Tendrefr":"Abc001","Contrrefr":"Co123",
        "Extrefr":"Yo456","Projrefr":"Doc-456","Porefr":"Doc-789","PoRefDt":"16/06/2024"}]},

        "AddlDocDtls":[{"Url":"https://einv-apisandbox.nic.in","Docs":"Test Doc","Info":"Document Test"}],

        "ExpDtls":{"ShipBNo":"A-248","ShipBDt":"16/06/2024","Port":"INABG1","RefClm":"N","ForCur":"AED","CntCode":"AE"},

        "EwbDtls":{"Transid":"12AWGPV7107B1Z1","Transname":"XYZ EXPORTS","Distance":100,"Transdocno":"DOC01",
        "TransdocDt":"16/06/2024","Vehno":"ka123456","Vehtype":"R","TransMode":"1"}}';
    }


    public function render()
    {
        $this->generateIrn();

        return view('livewire.master-gst.einvoice.index');
    }
}
