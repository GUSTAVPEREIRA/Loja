<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Traits\GenericCrud;
use SoapClient;
use SoapHeader;

class CategorieController extends Controller
{
    use GenericCrud;
    protected $categorie;

    public function __construct(Categorie $categorie)
    {
        $this->setModel($categorie);
        $this->categorie = $categorie;
    }

    public function index()
    {
        return view('register.Category');
    }

    public function modal()
    {
        return view('register.Category-modal');
    }

    public function show()
    {
        $categories = Categorie::all();

        return json_encode($categories);
    }

    public function serasa()
    {
        try {
            $login = 'XXXXXXX';
            $password ='XXXXXX';
//            $authorization = base64_encode("$login:$password");
//            $authorization = "Basic $authorization";
            $webserviceURL = "https://servicos.spc.org.br/spc/remoting/ws/consulta/consultaWebService?wsdl";
            $client = new SoapClient($webserviceURL, array(
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE,
                'login'=>$login,
                'password'=>$password
            ));
            dd('stop');
            $function = 'Consultar';
            $code = '325';
            $typePerson = 'F';
            $cpf = '00752477714';
            $arguments= array('ns1:filtro' => array(
                'codigo-produto' => ''.$code .'',
                'tipo-consumidor' => ''.$typePerson .'',
                'documento-consumidor' => ''.$cpf .''
            ));
            $result = $client->__soapCall($function, $arguments);
            $txt = SimpleXML_Load_String($result);
            echo 'Response: ';
            print_r($arguments);
        } catch (\SoapFault $e) {
            echo $e->getMessage();
        }
    }
}
