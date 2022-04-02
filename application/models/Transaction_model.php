<?php  
class Transaction_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /**
     * foncton pour recuperer les données du compte du client
     * @author Toavina
     */
    public function CompteUser(){
        $data = $this->db->get('BqUtilisateur');
        $compte = $data->row_array();
        return array(
           'montant' => $compte['montant'],
           'depot' => $compte['depot']
        );
    }

    /**
     * @param string $code: le code de validation donnée par le client
     * @param int $idUser: l'identifiant de l'utilisateur
     * @author Toavina
     */
    public function verifCode($code, $idUser){
        $this->db->where('idUser', $idUser);
        $this->db->where('validationCode', $code);
        $this->db->from('CodePayement');
        $count = $this->db->count_all_results();
        if($count==1){
            $data = $this->db->get('CodePayement');
            $Montant = $data->row_array()['montantVerse'];
            $this->db->reset_query();
            $this->db->where('idUser', $idUser);
            $info = $this->CompteUser();
            $dataUp = array(
                'montant' => $info['montant'] + $Montant,
                'depot' => $info['depot'] + $Montant
             );
            $this->db->update('BqUtilisateur', $dataUp);
            $this->db->reset_query();
            return true;

        }
        else return false;
    }

    /**
     * @param int $montant: Montant de la somme a verser
     * @param int $idVendeur: Id du vendeur de l'article
     * @param string $code: le code generer au hasard
     * @author Toavina
     */
    public function insertCode($montant, $idVendeur, $code){
        $data = array(
            'idCodePayement' => null,
            'idUser' => $idVendeur,
            'validationCode' => $code,
            'montantVerse' => $montant
        );
        $this->db->insert('CodePayement', $data);
        return;
    }
}

?>