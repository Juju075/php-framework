<?php

namespace App\Controller;

use App\Exception\NotFoundException;
use App\Exception\ResourceNotFound;
use App\Framework\Database\EntityManager;
use App\Framework\Database\Query;
use App\Framework\Form\Form;
use App\Framework\Form\FormTypeInterface;
use App\Framework\Repository\RepositoryInterface;
use App\Framework\Router\Request;
use App\Framework\View\View;
use PDO;

/**
 * All Controllers don't need database relation
 * eg: MainController | ExceptController
 */
abstract class AbstractController
{
    private View $view;
    protected ?PDO $pdo;
    protected ?Query $query;
    protected ?EntityManager $em;
    protected ?RepositoryInterface $repository;

    /**
     * @param View $view
     * @param PDO|null $pdo
     * @param Query|null $query
     * @param EntityManager|null $em
     * @param RepositoryInterface|null $repository
     */
    public function __construct(
        View                $view,
        PDO                 $pdo = null,
        Query               $query = null,
        EntityManager       $em = null,
        RepositoryInterface $repository = null
    )
    {
        $this->view = $view;
        $this->pdo = $pdo;
        $this->query = $query;
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @throws ResourceNotFound
     * @throws NotFoundException
     */
    protected function render(string $childTemplate, array $data = []): string
    {
        return $this->view->render($childTemplate, $data);
    }

    protected function addFlash(string $flashType, string $message)
    {
        //TODO $this->>flashs[] = new Flash
    }

    /**
     * @param string $formType
     * @param object|null $entity
     * @return Form
     */
    public function createForm(string $formType, ?object $entity = null): Form
    {
        if (!class_exists($formType)) {
            exit();
        }

        $instance = new $formType($entity);
        if (!$instance instanceof FormTypeInterface) {
            throw new \LogicException("Given class doesn't implement FormTypeInterface)");
        }

        if ($entity === null) {
            return $instance->formBuilder();
        } else {
            return $instance->prepopulateFields(["title", "description"]);
        }
    }

    public function remove(): void
    {
        $message = "are you sure?";
        echo "<script type='text/javascript'>alert('$message');</script>";

        $id = (new Request())->getParam();
        $this->em->removeInDb($this->repository->getTable(), $id);
        header('location: /posts');
    }
}
