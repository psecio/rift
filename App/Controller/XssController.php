<?php

namespace App\Controller;
use App\Controller\BaseController;

class XssController extends BaseController
{
    private function getLatestPosts($toArray = true)
    {
        $posts = new \App\Collection\Posts($this->get('db'));
        $posts->findAll();

        return ($toArray == true) ? $posts->toArray(true) : $posts;

    }
    public function index()
    {
        $data = [];
        return $this->render('/xss/index.php', $data);
    }
    public function reflected()
    {
        $data = [
            'test' => $this->request->getParam('test')
        ];
        return $this->render('/xss/reflected.php', $data);
    }
    public function stored()
    {
        $data = [
            'posts' => $this->getLatestPosts()
        ];
        return $this->render('/xss/stored.php', $data);
    }
    public function addPost()
    {
        $post = new \App\Model\Post($this->get('db'));
        $post->load([
            'title' => $this->request->getParam('title'),
            'content' => $this->request->getParam('content'),
            'created' => time(),
            'updated' => time()
        ]);
        $post->save();

        $data = [
            'posts' => $this->getLatestPosts()
        ];
        return $this->render('/xss/stored.php', $data);
    }
    public function delete($id)
    {
        $post = new \App\Model\Post($this->get('db'));
        $post->findById($id);

        if ($post->id !== null) {
            $post->delete();
        }
        // Redirect to the main page
        return $this->response->withStatus(302)->withHeader('Location', '/xss/stored');
    }
    public function dom()
    {
        $data = [];
        return $this->render('/xss/dom.php', $data);
    }
}
