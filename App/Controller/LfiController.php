<?php

namespace App\Controller;
use App\Controller\BaseController;

class LfiController extends BaseController
{
    public function index()
    {
        $path = '../data/pages';
        $page = $this->request->getParam('page');
        $files = [];

        // Get our file and page names
        $dir = new \DirectoryIterator($path);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $filename = $fileinfo->getPathname();
                $name = str_replace([$path.'/', '.txt'], '', $filename);
                $files[$name] = str_replace('.txt', '', $filename);
            }
        }

        $data = [
            'files' => $files
        ];

        if ($page !== null) {
            ob_start();
            include_once($path.'/'.$page);

            // Detect the injection
            $realpath = realpath($path.'/'.$page);

            $pagepath = realpath($path);
            if (substr($realpath, 0, strlen($pagepath)) !== $pagepath) {
                $data['isInjection'] = true;
            }

            $page = ob_get_clean();
            $data['page'] = $page;
        }

        return $this->render('/lfi/index.php', $data);
    }
}
