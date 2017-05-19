<?php

namespace App\Controller;
use App\Controller\BaseController;

class RateLimitController extends BaseController
{
    const LIMIT = 5;
    // const TIMEOUT = '-5 minutes';
    const TIMEOUT = '-5 seconds';

    public function index()
    {
        $blocked = false;
        $key = 'attempts'.$_SERVER['REMOTE_ADDR'];
        $now = new \DateTime();
        $clear = $this->request->getParam('clear');

        // Clear it out if requested
        if ($clear !== null) {
            $attempts = $_SESSION[$key] = [];
        } else {
            $attempts = (isset($_SESSION[$key])) ? $_SESSION[$key] : $_SESSION[$key] = [];
        }

        $_SESSION[$key][] = $now->format(\DateTime::ISO8601);

        if (count($attempts) >= self::LIMIT) {
            // See when the last one was
            usort($attempts, function($date1, $date2) {
                return new \DateTime($date1) > new \DateTime($date2);
            });
            $last = $attempts[count($attempts)-1];

            // See if the last one was less than the limit ago
            $last = new \DateTime($last);
            $boarder = $now->modify(self::TIMEOUT);

            ($last > $boarder) ? $blocked = true : $_SESSION[$key] = [];
        }

        $data = [
            'blocked' => $blocked,
            'attempts' => $_SESSION[$key]
        ];
        return $this->render('/ratelimit/index.php', $data);
    }

}
