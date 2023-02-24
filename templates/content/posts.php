<h2>All posts</h2>
<?php
/**
 * @var array $posts
 * @var Post $post
 */

use App\Entity\Post;
use App\Framework\Repository\PostRepository;

if (!empty($posts)) {
    foreach ($posts as $index => $post) {
        $date = null;
        if (!empty($post->getUpdatedAt())) {
            $date = $post->getUpdatedAt()->format('Y-m-d H:i:s');
        } else {
            $date = $post->getCreatedAt()->format('Y-m-d H:i:s');
        }

        echo sprintf('
            <a href="/post/%s"><h2>%s</h2></a>
            <p>%s</p>
            <p>%s<p>'
            , $post->getId(),
            $post->getTitle(),
            //image ici
            $post->getDescription(),
            $date
        );

        echo '<br><br><br>';
    }

    //cumul click  | current page | +1 offset requestItems() | reload foreach
    echo '<div id="load-more">
    <button>LOAD MORE</button>
    </div>';

} else {
    echo '<h1>You can add your first post  <a href="/create-post">here!</a> </h1>';
}
?>

