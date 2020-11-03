<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;

class CommonComponent extends Component
{
    // The other component your component uses
    //public $components = ['Folder', 'File'];

    public function upload_images( $image, $relative_upload_folder, $image_name_suffix = "" )
    {
        $message = 'File is null';
        $params = array();

        if( isset($image) && !empty($image) )
        {
            $upload_folder = WWW_ROOT;
            $sub_folder = 'uploads';
            $static_path = 'img' . DS . $sub_folder;

            $upload_folder .= $static_path;

            if( isset($relative_upload_folder) && !empty($relative_upload_folder) )
            {
                $upload_folder .= DS . $relative_upload_folder;
            } 
            else 
            {
                $upload_folder .= 'img' . DS . 'trash';
            }

            $folder = new Folder($upload_folder, true, 0777);

            if( $folder )
            {
                try
                {
                    $file = new File( $image['name'] );
                    // rename the uploaded file
                    $renamed_file = $image_name_suffix . '-' . date('YmdHis') . rand(1,5000) . '.' . $file->ext();
                    // set the full path of uploaded file name
                    $renamed_file_full_path = $upload_folder . DS . $renamed_file;

                    list($width, $height, $type, $attr) = getimagesize( $image['tmp_name'] );

                    move_uploaded_file($image['tmp_name'], $renamed_file_full_path);
                    chmod($renamed_file_full_path, 0777);
                    
                    return array(
                        'status' => true, 
                        'params' => array(
                            'ori_name' => $image['name'],
                            're_name' => $renamed_file,
                            'path' => $sub_folder . DS . $relative_upload_folder . DS . $renamed_file,
                            'type' => $type,
                            'width' => $width,
                            'height' => $height,
                            'size' => $image['size']
                        )
                    );
                } 
                catch(Exception $e) 
                {
                    $message = 'Upload file failed. ' . $e->getMessage();
                    $params = array(
                        're_name' => $renamed_file,
                        'folder_path' => $upload_folder,
                        'path' => $sub_folder . DS . $relative_upload_folder . DS . $renamed_file
                    );
                }
            } 
            else 
            {
                $message = 'Fail to create folder.';
                $params = array(
                    'folder_path' => $upload_folder,
                );
            }
        }

        return array(
            'status' => false, 
            'message' => $message,
            'params' => $params
        );
    }
}
