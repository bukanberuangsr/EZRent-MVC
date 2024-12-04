<?php
class Items extends Controller
{

    public function index()
    {
        // Load model
        $itemModel = $this->loadModel('ItemModel');
        // Get data from the model
        $items = $itemModel->getAll();
        // Load the view
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
        $title = addslashes($_POST['name']);
        $description = addslashes($_POST['description']);
        $available = addslashes($_POST['available']);
        $image = $this->handleImageUpload(); //agar karakter aneh2 bisa kebaca, menghindari sql injection

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

    public function handleImageUpload()
    {
        if ($_FILES['image']['error'] == 0) {
            $target_dir = "/uploads/"; // Folder to store uploaded images
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

            // Check if the file type is allowed
            if (in_array($imageFileType, $allowed_types)) {
                // Move uploaded file to the target directory
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $image = $target_file; // Save the file path
                } else {
                    echo "Sorry, there was an error uploading the image.";
                }
            } else {
                echo "Only JPG, JPEG, PNG & GIF files are allowed.";
            }
        } else {
            echo "No image uploaded.";
        }
    }
}
