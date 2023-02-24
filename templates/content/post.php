<h2>Post</h2>
<?php
/**
 * @var Post $post
 */

use App\Entity\Post;

$date = $post->getCreatedAt()->format('Y-m-d H:i:s');;
if (!empty($post->getUpdatedAt())) {
    $date = $post->getUpdatedAt()->format('Y-m-d H:i:s');;
}

echo $post->getTitle();
echo '<br>';
echo $post->getDescription();
echo '<br>';
echo $date;
echo '<br>';

$id = $post->getId();
echo ' 
 <br>
  <br>
   <br>
 ';


echo'<div class="flex"><div>';
echo '<form action="/post/'.$id. '" method="post">';
echo '
         <input type="hidden" name="_method" value="PUT" />   
         <button type="submit">Update</button>
    </form>
     <br>
   ';


echo '<form action="/post/'.$id. '" method="post">';
echo '
         <input type="hidden" name="_method" value="DELETE" />
         <button type="submit" >Delete</button>
    </form>
    ';
echo'</div></div>';
