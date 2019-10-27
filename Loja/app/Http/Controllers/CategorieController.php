<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Traits\GenericCrud;
use SoapClient;

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
            $webserviceURL = "https://treina.spc.org.br/spc/remoting/ws/consulta/consultaWebService?wsdl";
            $client = new SoapClient($webserviceURL, array("login" => "XXX", "password" => "XXX"));
            $function = 'Consultar';
            $s1 = '325';
            $s2 = 'F';
            $s3 = '00752477714';
            $arguments= array('ns1:filtro' => array('codigo-produto' => ''.$s1 .'','tipo-consumidor' => ''.$s2 .'','documento-consumidor' => ''.$s3 .''));
            $result = $client->__soapCall($function, $arguments);
            $txt = SimpleXML_Load_String($result);
            echo 'Response: ';
            print_r($arguments);
        } catch (\SoapFault $e) {
            dd('deu ruim');
        }
    }
}
