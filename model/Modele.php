<?php

class Modele extends CRUD {
    protected $table = 'modele';
    protected $primaryKey = 'id';

    protected $fillable = ['id', 'modele_nom', 'manufacturier', 'modele_pays', 'production_year', 'modele_format', 'createur_id', 'modele_image_path'];

    public function modelePays() {
        $sql = "SELECT m.*, p.pays_nom AS modele_pays_nom FROM $this->table m INNER JOIN pays p ON p.id = m.modele_pays";
        $stmt = $this->query($sql);
        $modelePays = $stmt->fetchAll();
        return $modelePays;
    }

    public function modeleFormat() {
        $sql = "SELECT m.*, f.format_nom AS modele_format_nom FROM $this->table m INNER JOIN format f ON f.id = m.modele_format";
        $stmt = $this->query($sql);
        $modeleFormat = $stmt->fetchAll();
        return $modeleFormat;
    }

    public function modeleProduction() {
        $sql = "SELECT m.*, pr.year AS production_year_value FROM $this->table m INNER JOIN production pr ON pr.id = m.production_year";
        $stmt = $this->query($sql);
        $modeleProduction = $stmt->fetchAll();
        return $modeleProduction;
    }

    public function modeleCreateur() {
        $sql = "SELECT m.*, u.username AS createur_username FROM $this->table m INNER JOIN utilisateur u ON u.id = m.createur_id";
        $stmt = $this->query($sql);
        $modeleCreateur = $stmt->fetchAll();
        return $modeleCreateur;
    }
}
?>
