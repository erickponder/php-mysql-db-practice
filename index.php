<html>
    <head>
        <title></title>
    
    <style type="text/css">
        .gallery img {
            width: 20%;
            height: auto;
            border-radius: 5px;
            cursor: pointer;
            transition: .3s;
        }    
        .button {
            
        }
    </style>
    </head>
    
    <body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
    </form>
        

        
        <div class="gallery">
            <h2>Uploaded Images</h2>
                <?php
                // Include the database configuration file
                include 'dbConfig.php';

                // Get images from the database
                $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

                if($query->num_rows > 0){
                    while($row = $query->fetch_assoc()){
                        $imageURL = 'uploads/'.$row["file_name"];
                ?>
                    <img src="<?php echo $imageURL; ?>" alt="" />
                <?php }
                }else{ ?>
                    <p>No image(s) found...</p>
                <?php } ?>
        </div>
            <div class="button">
            <button type="button" id="delete">Delete</button>
               
        </div>

    </body>
</html>