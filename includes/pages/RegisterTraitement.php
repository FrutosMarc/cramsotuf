<?php
session_start();
header("content-type: text/html; charset=UTF-8");
AddMessageSession(0,"Valid","Enregistrement effectué.");
                            
// doit être utilisée à la place de la variable $_FILES.
if ($_FILES["profil_photo"]["error"]==UPLOAD_ERR_OK) {
	$uploaddir = $_SERVER["DOCUMENT_ROOT"]."/images/";
	$uploadfile = $uploaddir . basename($_FILES['profil_photo']['name']);
	$autorise = array('gif','png','jpg');
	$nomFichier= $_FILES["profil_photo"]["name"];
	$ext = strtolower(pathinfo($nomFichier,PATHINFO_EXTENSION));
	echo $_FILES['profil_photo']['tmp_name'];
	if(!in_array($ext,$autorise)){
			AddMessageSession(2,"Warning"," Extension non autorisée");
	} 
	else if (move_uploaded_file($_FILES['profil_photo']['tmp_name'], $uploadfile)) {
			AddMessageSession(0,"Valid","Le fichier est valide, et a été téléchargé avec succés.");
		} 
	else {
			AddMessageSession(1,"Error","Extension non autorisée");
	}
}
else {
		AddMessageSession(3,"Info","Impossible de télécharger la photo de profil. Veuillez recommencer.");
}
//print_r($_SESSION);
header("location: ./index.php?pages=RegisterResultat");

