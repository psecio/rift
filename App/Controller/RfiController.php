<?php

namespace App\Controller;
use App\Controller\BaseController;

class RfiController extends BaseController
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
            // See if the value is a URL
            if (filter_var($page, FILTER_VALIDATE_URL) == $page) {
                $data['isUrl'] = true;
                include_once($page);
            } else {
                include_once($path.'/'.$page);
            }

            $page = ob_get_clean();
            $data['page'] = $page;
        }

        return $this->render('/rfi/index.php', $data);
    }

    public function badcode()
    {
        echo '<?php print_r($_SERVER); ?>';
    }
    public function badtext()
    {
        echo "you've been hacked!";
    }
}
