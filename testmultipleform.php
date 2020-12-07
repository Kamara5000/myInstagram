<?php 

    // require 'connection.php';
    
    // $output_dir = "upload/";/* Path for file upload */
    // $fileCount = count($_FILES["image"]['name']);
	// for($i=0; $i < $fileCount; $i++)
		
	// 	{
    //         $RandomNum   = time();
    //         print_r($RandomNum);
    //         $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
    //         print_r($ImageName);
    //         //$ImageType      = $_FILES['image']['type'][$i]; /*"image/png", image/jpeg etc.*/
    //         //print_r($ImageType);
    //         $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    //         print_r($ImageExt);
    //         $ImageExt       = str_replace('.','',$ImageExt);
    //         print_r($ImageExt);
    //         $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    //         print_r($ImageName);
    //         $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    //         print_r($NewImageName);
            
    //         //$ret[$NewImageName]= $output_dir.$NewImageName;
    //         $last_id = $output_dir.$NewImageName;
    //         /* Try to create the directory if it does not exist */
	// 		// if (!file_exists($output_dir . $last_id))
	// 		// {
	// 		// 	@mkdir($output_dir . $last_id, 0777);
	// 		// }
                        
    //         //move_uploaded_file($_FILES["image"]["tmp_name"][$i],$last_id );
		    
    //          /*$insert_img = "insert into `category_images` SET `category_ads_id`='".$category_ads_id_image."', `image`='".$NewImageName."'";
    //           $result = $dbobj->query($insert_img);*/
    //            }
    
    //     echo "Image Uploaded Successfully";


        
    require 'connection.php';
    
    $output_dir = "upload/";
    $fileCount = count($_FILES["image"]['name']);
    //print_r($fileCount);
	for($i=0; $i < $fileCount; $i++)
		
		{
            $seconds   = date('s');
            $RandomNum   = rand(10,100000);
            $num = $seconds.$RandomNum;

            print_r($num);
            $ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
            //print_r($ImageName);
            
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        
            $ImageExt       = str_replace('.','',$ImageExt);
            //print_r($ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            //print_r($ImageName);
            $NewImageName = $ImageName.'-'.$num.'.'.$ImageExt;
    
            $last_id = $output_dir.$NewImageName;
                        
            $moved = move_uploaded_file($_FILES["image"]["tmp_name"][$i],$last_id );
            
            if ($moved) {
                $a = $con->query("INSERT INTO userpost (post_image)
                VALUES ('$NewImageName')");
                echo "Image Uploaded Successfully";
            }else{
                echo "Image Upload failed";
            }
           
               }
    
        

        ?>