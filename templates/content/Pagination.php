<?php


use App\Exception\NotFoundException;
use App\Framework\App;
use App\Framework\Repository\RepositoryInterface;
use App\Framework\Router\ControllerResolver;
use const App\Framework\View\PostRepository;

class Pagination
{
    private RepositoryInterface $repository;
    private int $currentPage;
    private int $itemPerPage;
    private int $offset;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $itemPerPage
     * @return $this
     */
    public function calcPagination(int $itemPerPage = 4): self
    {
        $this->itemPerPage = $itemPerPage;
        $totalPosts = $this->repository->total($this->repository->getTable());
        $currentPage = 1;

        if (isset($_GET['page']) && !empty((int)$_GET['page'])) {
            $currentPage = (int)$_GET['page'];
            var_dump($currentPage);
        } elseif (isset($_GET['page']) && !is_int((int)$_GET['page'])) {
            throw new \LogicException("numero de page $currentPage n\'est pas valide");
        }
        $this->currentPage = $currentPage;

        $nbPages = ceil($totalPosts / $itemPerPage);

        $this->offset = $itemPerPage * ($currentPage - 1);
        return $this;
    }


    /**
     * @param int|null $offset
     * @return array
     */
    public function requestItems(int $offset = null): array
    {
        if ($offset === null) {
            $offset = $this->offset;
        }

        return $this->repository->selectedPage
        (
            $this->repository->getTable(),
            $this->itemPerPage,
            $offset
        );
    }
}
