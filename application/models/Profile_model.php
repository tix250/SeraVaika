<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class profile_model extends CI_Model
{

    // public function authentification($email,$mdp){
    //     $query= $this->db->query("SELECT * FROM admin where nom='".$email."' and passwd='".$mdp."'");
    //     return $query->row_array();
    // }

    public function getListeVoiture($idUser,$limit){
        $sql="";
        if($limit!="" and $idUser==""){
            $sql="SELECT * FROM carDetails where disponibilite=1 limit $limit";
        }
        else if($limit!="" and $idUser!=""){
            $sql="SELECT * FROM carDetails where disponibilite=1 and idUser='$idUser' limit $limit";
        }
        else if($limit=="" and $idUser!=""){
            $sql="SELECT * FROM carDetails where disponibilite=1 and idUser='$idUser'";
        }
        else{
            $sql="SELECT * FROM carDetails where disponibilite=1";

        }
        $res = $this->db->query($sql);
        return $res->result_array();
    }
    public function getListeVoitureRecherche($idUser,$limit,$nom,$type,$categorie,$place){
        $this->db->where('idUser',$idUser);
        $this->db->where('disponibilite',1);
        if($nom!=""){
           $this->db->like('nom',$nom);
        }
        if($type!=""){
            $this->db->where('idType',$type);
        }
        if($categorie!=""){
            $this->db->where('idCategorie',$categorie);
        }
        if($place!=""){
            $this->db->where('places',$place);
        }
        $res = $this->db->get('carDetails');
        return $res->result_array();
    }
    public function getListeCategory(){
        $res=$this->db->query("SELECT * FROM CategorieVoitures");
        return  $res->result_array();

    }

    public function getListeType(){
        $res=$this->db->query("SELECT * FROM TypeAnnonces");
        return  $res->result_array();

    }
    public function updateProduct($idCar,$carName,$anne,$prix,$idCategorie,$places,$idtype,$description){
        $data=[
            'idType'=>$idtype,
            'idCategorie'=>$idCategorie,
            'nom'=>$carName,
            'anne'=>$anne,
            'places'=>$places,
            'descriptionPlus'=>$description,
            'prix'=>$prix,
        ];
        $this->db->where('idProduitsV',$idCar);
        $this->db->update('ProduitsVoiture',$data);
    }

    // public function updateCategory($idCateg,$nomCateg){
    //     $data=[
    //         'nomCateg' => $nomCateg,
    //         'idCateg' =>$idCateg,
    //     ];
    //     $this->db->where('idCateg',$idCateg);
    //     $this->db->update('Category',$data);
    // }
   
    public function deleteProduct($idProduct){
        $data=[
            'disponibilite'=>"0"
        ];
        $this->db->where('idProduitsV',$idProduct);
        $this->db->update('ProduitsVoiture',$data);
    }

    public function insertProduct($idUser,$idType,$idCateg,$nom,$anne,$places,$descri,$prix,$imgFile){
        $idMax=$this->getLastId();
        $data=[
            'idProduitsV'=>$idMax['idMax'],
            'idUser'=>$idUser,
            'idType'=>$idType,
            'idCategorie'=>$idCateg,
            'nom'=>$nom,
            'anne'=>$anne,
            'places'=>$places,
            'descriptionPlus'=>$descri,
            'prix'=>$prix
        ];
       
        $dataImage=[
            'idProduit'=>$idMax['idMax'],
            'pathImage'=>$imgFile,
        ];

        $this->db->insert('ProduitsVoiture',$data);
        $this->db->insert('imageProduit',$dataImage);

    }

    public function getLastId(){
        return $this->db->query("SELECT max(idProduitsV)+1 as idMax from ProduitsVoiture")->row_array();
    }
    // public function deleteCategory($idCateg){
    //     $this->db->where('idCateg',$idCateg);
    //     $this->db->delete('Category');
        
    //     $query= $this->db->query("SELECT idProduit FROM CategoryProduit where idCateg='$idCateg'")->result_array();
    //     foreach($query as $row){
    //         $this->db->where('idProduit',$row['idProduit']);
    //         $this->db->delete('Produit');
    //     }

    //     $this->db->where('idCateg',$idCateg);
    //     $this->db->delete('categoryProduit');
    // }

    // public function getListeCategory(){
    //     $query= $this->db->query("SELECT * FROM Category");
    //     return $query->result_array();
    // }

    // public function insertProduit($nomProduit,$prix,$imagePath,$categData){
    //     $id=$this->getMaxIdProduit();
    //     $data=[
    //         'idProduit' => $id['idMax'],
    //         'nomProduit' => $nomProduit,
    //         'prix'=>$prix,
    //         'imagePath'=>$imagePath
    //     ];
    //     $this->db->insert('Produit',$data);
    //     $this->insertCategProduit($id['idMax'],$categData);
    // }

    // public function insertCategory($nomCateg){
    //     $id=$this->getMaxIdCateg();
    //     $data=[
    //         'idCateg' => $id['idMax'],
    //         'nomCateg' => $nomCateg,
           
    //     ];
    //     $this->db->insert('Category',$data);
    // }

    // public function insertCategProduit($idProduit,$categData){

    //     foreach($categData as $value){
    //         $data=[
    //             'idCateg'=>$value,
    //             'idProduit'=>$idProduit
    //         ];
    //         $this->db->insert('CategoryProduit',$data);
    //     }
    // }

    // public function getMaxIdProduit(){
    //     $query= $this->db->query("SELECT max(idProduit)+1 as idMax FROM Produit");
    //     return $query->row_array();
    // }

    // public function getMaxIdCateg(){
    //     $query= $this->db->query("SELECT max(idCateg)+1 as idMax FROM Category");
    //     return $query->row_array();
    // }



}
