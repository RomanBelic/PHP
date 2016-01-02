<?php

function uploadFile ($contentDir){
if( isset($_POST['upload']) ) // si formulaire soumis
{
    $content_dir = './'.$contentDir.'/'; // dossier ou sera deplace le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {   
        return -1;
    }

    // on verifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
    {
		return -1;
		exit ("fichier doit etre du format jpeg/bmp/gif");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
		return -1;
        exit("Impossible de copier le fichier dans $content_dir");
    }
	   return 1;
	}
}

?>