<?php
class Items extends Controller
{

    public function index()
    {
        // Load model
        $itemModel = $this->loadModel('ItemModel');
        // Get data from the model
        $posts = $itemModel->getAll();      // Load the view
        $this->loadView('posts', ['posts' => $posts]);
    }


    public function create_form()
    {
        $this->loadView('insert_post');
    }


    public function create_process()
    {
        $itemModel = $this->loadModel('ItemModel');
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);
        $itemModel->insert($title, $content);
        header('Location: ?c=Items');
        exit;
    }


    public function edit()
    {
        $id = $_GET['id'];

        if (!$id) header('Location: index.php?c=Items');

        $itemModel = $this->loadModel('ItemModel');
        $post = $itemModel->getById($id);

        if (!$post->num_rows) header('Location: index.php?c=Items');

        $this->loadView('edit', ['post' => $post->fetch_object()]);
    }


    public function update()
    {
        $itemModel = $this->loadModel('ItemModel');

        $id = $_POST['id'];
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']); //agar karakter aneh2 bisa kebaca, menghindari sql injection

        $itemModel->update($id, $title, $content);
        header('Location: ?c=Items');
    }

    public function delete()
    {
        $id = $_POST['id'];

        $itemModel = $this->loadModel('ItemModel');
        $itemModel->delete($id);

        // redirect to post list after delete
        header('location:?c=Items');
    }
}
