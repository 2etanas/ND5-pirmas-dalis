<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobalus kintamieji FILES, SESSION, COOKIES</title>
</head>
<body>
    
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="text" name="file_name" placeholder ="Įkelto failo pavadinimas">
        <button type="submit" name="upload">Įkelti</button>
    </form>    
</body>
</html>

<?php 
// reikia rast tikslu formata, turi but lygu jam, $_FILES["file"]["type"] == "application/pdf"; tas pats ir su dydziu
    if(isset($_POST["upload"]) && $_FILES["file"]["type"] == "application/pdf" && $_FILES["file"]["size"] < 1048577) {
        $file_name = $_POST["file_name"];
        $file = $_FILES["file"];
        echo $_FILES["file"]["type"];
        echo "<br>";
        echo $_FILES["file"]["size"];
        echo "<br>";
        echo $_POST["file_name"];
         var_dump($file);

        $file_dir = "uploads/";

        $file_name_array = explode(".", $file["name"]);
        //failo pletini
        $file_extension =  $file_name_array[1];
        
        
        //jei reikia viena ar kelis failus parinkt.
        // $allowed_extensions = ["pdf","png"];
        // if(!in_array($file_extension,$allowed_extensions)) {
        //     echo "failas netinkamas";
        //     return exit;
        // }

        // $time = time();

        // $random_string = $file_name_array[0].$time;
        if($_POST["file_name"] == null){
            $file_name_generated =  $file_name_array[0] .".".$file_extension; 
        } else{
            $file_name_generated = $_POST["file_name"] .".".$file_extension;
        }
        var_dump($file_name_generated); 
         $file_path = $file_dir . $file_name_generated;
         if(move_uploaded_file($file["tmp_name"],$file_path)) {
            echo "Failas sekmingai ikeltas";
         } else {
            echo "Failo ikelti nepavyko";
         }

        //  var_dump( $file_path);
    }else{
        echo "failas nepasirinktas, pasirinktas blogas formatas arba virsytas maximalus failo dydis (1MB)";
    }


?>
