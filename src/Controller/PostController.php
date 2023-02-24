<?php

namespace App\Controller;

use App\Entity\Post;
use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;
use App\Form\FieldResolver;
use App\Form\Type\PostType;
use App\Framework\Database\CreateTable;
use App\Framework\Database\Hydrator;
use App\Framework\View\Pagination;
use App\Framework\View\View;
use Exception;
use PDO;

class PostController extends AbstractController
{
    /**
     * @return void
     * @throws NotFoundException
     * @throws ResourceNotFound
     */
    public function index(?array $posts = [])
    {
        if (isset($_GET['page'])) {
            $posts = (new Pagination($this->repository))->calcPagination(2)->requestItems();
            //load more
        } else {
            $posts = $this->repository->selectAll();
        }
        if (empty($posts)) {
            throw new NotFoundException('Page not found', 404);
        }
        echo $this->render('content/posts.php', ['posts' => $posts]);
    }

    public function createTables()
    {
        $ct = new CreateTable();
        $ct->createTable();
    }

    /**
     * method GET, PUT, DELETE
     * @param int $id
     * @return void
     * @throws NotFoundException
     * @throws ResourceNotFound
     */
    public function show(int $id)
    {
        $post = $this->repository->selectOneById(['id' => $id]);
        //$post = parent::remove()
        echo $this->render('content/post.php', ['post' => $post]);
    }

    /**
     * @return void
     * @throws NotFoundException
     * @throws ResourceNotFound
     * @throws Exception
     */
    public function create()
    {
        echo 'function create';
        $form = (parent::createForm(PostType::class));

        $messageFlash = [];
        if ($form->isSubmitted() && $form->isValid($_POST)) {
            echo 'submitted & valid form';

            $data = $_POST;
            if ($form->ifFileExist()) {
                echo 'un fichier est chargé';
                $image = FieldResolver::imageProcessing();
                $data['pictureFileName'] = $image;
            }

            $post = Hydrator::hydrate($data, Post::class);
            var_dump("Le post hydraté : ", $post);

            /** @var Post $post */
            $post->setCreatedAt(new \DateTime());
            $this->em->persist($post);
            $this->em->flush();

            $messageFlash = ['success' => 'ici le message'];
            $this->addFlash(View::FLASH_SUCCESS, "Post bien ajouté");

            //rediriger vers le post cree
            $lastId = $this->em->getLastId();
            header('location: /post/' . $lastId);
            exit();
        }

        echo $this->render(
            'content/create-post.php',
            ['form' => (string)$form, 'messageFlash' => $messageFlash]
        );
    }

    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    public function update(int $id): void
    {
        $post = $this->repository->selectOneById(['id' => $id]); // object need Post
        $form = (parent::createForm(PostType::class, $post));
        $date = (new \DateTime())->format('Y-m-d H:i:s');

        echo $this->render('content/update_post.php', ['form' => $form, 'createdAt' => $date]);
    }
}

