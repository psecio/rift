<?php

namespace App\Controller;
use App\Controller\BaseController;

class UploadController extends BaseController
{
    public function index()
    {
        $data = [];
        $uploadPath = realpath(__DIR__.'/../../data/uploads');
        $data['files'] = $this->getFiles($uploadPath);

        return $this->render('/upload/index.php', $data);
    }
    public function indexSubmit()
    {
        $data = [
            'maxupload' => ini_get('upload_max_filesize')
        ];

        // These constants are in the manual: http://php.net/manual/en/features.file-upload.errors.php
        if (!empty($_FILES['upload']['error']) && $_FILES['upload']['error'] !== UPLOAD_ERR_OK) {
            $data['message'] = $this->handleError($_FILES['upload']);
        }

        // No error - we're good!
        $uploadPath = realpath(__DIR__.'/../../data/uploads');
        if ($uploadPath == false || !is_dir($uploadPath)) {
            $data['message'] = 'Count not write to the upload path!';
        } else {
            move_uploaded_file($_FILES['upload']['tmp_name'], $uploadPath.'/'.$_FILES['upload']['name']);
        }

        $data['files'] = $this->getFiles($uploadPath);

        return $this->render('/upload/index.php', $data);
    }

    /**
     * Using this pass-through script we can check permissions and plenty of other things
     */
    public function view()
    {
        $filename = $this->request->getParam('filename');
        $uploadPath = realpath(__DIR__.'/../../data/uploads');

        $filePath = $uploadPath.'/'.$filename;
        if (!is_file($filePath)) {
            echo "Invalid file or you don't have access!";
        }
        echo file_get_contents($filePath);
    }

    private function getFiles($path)
    {
        $files = [];
        $dir = new \DirectoryIterator($path);
        foreach ($dir as $file) {
            if (!$file->isDot()) {
                $files[] = $file->getFilename();
            }
        }
        return $files;
    }
    private function handleError($file)
    {
        $message = 'There was an error!';

        switch($file['error']) {
            case UPLOAD_ERR_INI_SIZE:
                $message = 'File too large (based on ini setting of '.ini_get('upload_max_filesize').')!';
                break;
            case UPLOAD_ERR_FORM_SIZE: $message = 'File too large (MAX_FILE_SIZE in form)!';
                break;
            case UPLOAD_ERR_PARTIAL: $message = 'File only partially uploaded!';
                break;
            case UPLOAD_ERR_NO_FILE: $message = 'No file was uploaded!';
                break;
            case UPLOAD_ERR_NO_TMP_DIR: $message = 'Missing temporary folder!';
                break;
            case UPLOAD_ERR_CANT_WRITE: $message = 'Can\'t write to disk!';
                break;
            case UPLOAD_ERR_EXTENSION: $message = 'An extension stopped the upload!';
                break;
        }
        return $message;
    }
}
