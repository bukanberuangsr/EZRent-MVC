<?php
class Items extends Controller
{

    public function index()
    {
        $itemModel = $this->loadModel('ItemModel');
        $items = $itemModel->getAll();
        $this->loadView('items', ['items' => $items]);
    }


    public function create_form()
    {
        $this->loadView('insert_item');
    }


    public function create_process()
    {
        $itemModel = $this->loadModel('ItemModel');

        $title = addslashes($_POST['name']);
        $description = addslashes($_POST['description']);
        $available = addslashes($_POST['available']);
        $image = $this->handleImageUpload();

        $itemModel->insert($title, $description, $available, $image);
        header('Location: ?c=Items');
    }


    public function edit()
    {
        $id = $_GET['id'];

        if (!$id) header('Location: index.php?c=Items');

        $itemModel = $this->loadModel('ItemModel');
        $item = $itemModel->getById($id);

        if (!$item->num_rows) header('Location: index.php?c=Items');

        $this->loadView('edit', ['item' => $item->fetch_object()]);
    }


    public function update()
    {
        $itemModel = $this->loadModel('ItemModel');

        $id = $_POST['id'];
        $title = addslashes($_POST['name']);
        $description = addslashes($_POST['description']);
        $available = addslashes($_POST['available']);
        $image = $this->handleImageUpload(); //agar karakter aneh2 bisa kebaca, menghindari sql injection

        $itemModel->update($id, $title, $description, $available, $image);
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

    private function handleImageUpload(): ?string
    {
        if (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $target_path = "uploads/";
            $target_path = $target_path . basename($_FILES['image']['name']);

            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('File upload error: " . $_FILES['image']['error'] . "');</script>";
            echo "<script>window.location.href = '?c=Items';</script>";
            }

            if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
            echo "<script>alert('There was an error uploading the file, please try again!');</script>";
            echo "<script>window.location.href = '?c=Items';</script>";
            }

            return $target_path;
        }

        return null;
    }
}
