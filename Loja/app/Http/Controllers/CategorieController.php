<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Traits\GenericCrud;
use Psy\Util\Json;

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
}
