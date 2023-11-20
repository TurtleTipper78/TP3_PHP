<?php

RequirePage::model('CRUD');
RequirePage::model('Modele');
RequirePage::model('Format');
RequirePage::model('Pays');
RequirePage::model('Production');

class ControllerModele extends Controller {
    public function index(){
        $modele = new Modele;
        $modeles = $modele->select();
        // var_dump($modeles);
        return Twig::render('modele-index.php', ['modeles' => $modeles]);
    }

    public function create(){
        $format = new Format;
        $formats = $format->select('format_nom');

        $production = new Production;
        $productions = $production->select('year');

        $pays = new Pays;
        $paysList = $pays->select('pays_nom');

        return Twig::render('modele-create.php', ['selectFormats' => $formats, 'selectProductions' => $productions, 'selectPays' => $paysList]);
    }

    public function store(){
        $validation = new Validation;
        CheckSession::sessionAuth();
            $format = new Format;
            $formats = $format->select('format_nom');

            $production = new Production;
            $productions = $production->select('year');

            $pays = new Pays;
            $paysList = $pays->select('pays_nom');

            
            $modele = new Modele;
            var_dump($modele);
            $insertId = $modele->insert($_POST);
            RequirePage::url('modele/show/' . $insertId);
            return Twig::render('modele-create.php', ['selectFormats' => $formats, 'selectProductions' => $productions, 'selectPays' => $paysList]);
    }

    public function show($id){
        $modele = new Modele;
        $selectId = $modele->selectId($id);
    
        $format = new Format;
        $formatData = $format->selectId($selectId['modele_format']);
    
        $production = new Production;
        $productionData = $production->selectId($selectId['production_year']);
    
        $pays = new Pays;
        $paysData = $pays->selectId($selectId['modele_pays']);
    
        return Twig::render('modele-show.php', [
            'modele' => $selectId,
            'format' => $formatData['format_nom'],
            'production' => $productionData['year'],
            'pays' => $paysData['pays_nom']
        ]);
    }
    

    public function edit($id){
        $modele = new Modele;
        $selectId = $modele->selectId($id);

        $format = new Format;
        $formats = $format->select('format_nom');

        $production = new Production;
        $productions = $production->select('year');

        $pays = new Pays;
        $paysList = $pays->select('pays_nom');

        return Twig::render('modele-edit.php', [
            'modele' => $selectId,
            'formats' => $formats,
            'productions' => $productions,
            'paysList' => $paysList
        ]);
    }

    public function update(){
        $format = new Format;
        $formats = $format->select('format');

        $production = new Production;
        $productions = $production->select('production');

        $pays = new Pays;
        $paysList = $pays->select('pays');

        $validation = new Validation;

        $errors = $validation->displayErrors();
        return Twig::render('modele-edit.php', [
            'modele' => $_POST,
            'formats' => $formats,
            'productions' => $productions,
            'paysList' => $paysList,
            'errors' => $errors
        ]);

        $modele = new Modele;
        $update = $modele->update($_POST);

        RequirePage::url('modele/show/' . $_POST['id']);
    }

    
    public function storeOrUpdate() {
        $validation = new Validation;
        CheckSession::sessionAuth();
    
        $validation->name('modele_nom')->value($_POST['modele_nom'])->required();
    
        if (!$validation->isSuccess()) {
            $errors = $validation->displayErrors();
            return Twig::render('modele-create.php', ['errors' => $errors, 'user' => $_POST]);
        }

        if ($_FILES['modele_image']['error'] == UPLOAD_ERR_OK) {
            $uploadDir = 'path/to/your/upload/directory/';
            $uploadFile = $uploadDir . basename($_FILES['modele_image']['name']);
    
            if (move_uploaded_file($_FILES['modele_image']['tmp_name'], $uploadFile)) {
                $data['modele_image_path'] = $uploadFile;
                
                $modele = new Modele;
                $insertId = $modele->insert($data);
                RequirePage::url('modele/show/' . $insertId);
            } else {
                $errors['modele_image'] = 'Failed to upload the image';
                return Twig::render('modele-create.php', ['errors' => $errors, 'user' => $_POST]);
            }
        }
    

    $modele = new Modele;
    $insertId = $modele->insert($data);
    RequirePage::url('modele/show/' . $insertId);
}



    public function destroy(){
        $modele = new Modele;
        $update = $modele->delete($_POST['id']);
        RequirePage::url('modele/index');
    }
}
