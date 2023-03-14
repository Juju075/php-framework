<p><img alt="Image" title="icon" src="public/logo-php.png" height="90" /></p>
<blockquote>
    Framework personnel léger inpiré de Symfony<br>
    <em>Natif PHP</em><br>
    réalisé chez Alpha Soft <em>(ESN d'applicatifs métiers, PHP Symfony)</em><br>
    <a href="https://www.linkedin.com/in/bempime-kheve/" target="_blank"> Bempime KHEVE</a><br>
    <p>&copy; Copyright 2023</p>
</blockquote>
<table>
    <thead>
        <tr>
            <th>
                Documentation
            </th>
            <th>
                <a href="https://php-framework-documentation.bempime-kheve.com ">PHP FRAMEWORK DOCUMENTATION</a>
            underconstruction 1-2 days
            </th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th>
                Unit tests in GithHub Actions CI/CD
            </th>
        </tr>
    </thead>
</table>
<table>
    <thead>
        <tr>
            <th>
                SkillValue
            </th>
        </tr>
    </thead>
</table><br>

**MVC architecture**

<table>
    <thead>
        <tr>
            <th>
                Components
            </th>
            <th>
                Key points
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                Index <br>(PSR-4):
                <a href="https://github.com/Juju075/php_framework/blob/main/public/index.php" target="_blank"> here
                </a><br>
            </td>
            <td>
                <p class="code">
                    $app = new \App\Framework\App();<br>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Dependency Injection<br>(PSR-11):
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Container/Container.php" target="_blank"> here
                </a><br>
            </td>
            <td>
                class Container implements ContainerInterface
            </td>
        </tr>
        <tr>
            <td>
               Session Interface<br>
                (PSR-17)</br>:in progress
            </td>
            <td>
                ..
            </td>
        </tr>
        <tr>
            <td>
               Event Dispatcher <br>(PSR-14):
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Event/EventManager.php" target="_blank"> in progress
                </a><br>
            </td>
            <td>
                <p class="code">
                    class EventManager implements EventDispatcherInterface<br>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                Router:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Router/Router.php" target="_blank"> here
                </a><br>
            </td>
            <td>
                <p class="code">
                    $isRegex = strpos($route->getUrl(), "/^") !== false;<br>
                </p>
            </td>
        </tr>
        <tr>
            <td>
               Object Relation Model<br> w/o Reflexion<br><br> (recursive function,<br> File system):
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/Schema.php" target="_blank">
                here </a><br>
            </td>
            <td>
                $this->listing = DirectoryResolver::getAllFilesInSubdirectories(ENTITY_DIRECTORY, ['php']);
            </td>
        </tr>
        <tr>
            <td>
               FormBuilder:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Form/Type/PostType.php" target="_blank"> here </a><br>
            </td>
            <td>
                $this->form = new Form('', 'post', ['attribute' => 'test'],
            </td>
        </tr>
        <tr>
            <td>
               QueryBuilder
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/EntityManager.php" target="_blank">
                here </a><br>
            </td>
            <td>
                $query = (new Query())->insert($tableName, $keysValues);
            </td>
        </tr>
        <tr>
            <td>
               Hydratation:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/Hydrator.php" target="_blank">
                here </a><br>
            </td>
            <td>
                $dataClean = $isEntity ? $dataArray : FieldResolver::ValuesToClean($dataArray);
            </td>
        </tr>
        <tr>
            <td>
               Repository:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Repository/AbstractRepository.php" target="_blank">
                here </a><br>
            </td>
            <td>
                $query = (new Query())<br>
                    ->select()<br>
                    ->from($this->getTable())<br>
                    ->where($params);
            </td>
        </tr>
        <tr>
            <td>
               Exceptions:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Exception/NotFoundException.php" target="_blank">
                here </a><br>
            </td>
            <td>
                parent::__construct($message, ErrorCode::HTTP_NOT_FOUND);
            </td>
        </tr>
        <tr>
            <td>
               DotEnv:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/DotEnv.php" target="_blank">
                here </a><br>
            </td>
            <td>
                public function load(): self
            </td>
        </tr>
        <tr>
            <td>
               Csrf Token:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Form/Token.php" target="_blank">
                here </a><br>
            </td>
            <td>
                $token[] = sprintf('<input type="hidden"  name="%s"/>', form::TOKEN_FIELD_NAME);
            </td>
        </tr>
        <tr>
            <td>
               Pagination:
                <a href="https://github.com/Juju075/php_framework/blob/main/templates/content/Pagination.php" target="_blank">
                here </a><br>
            </td>
            <td>
                public function calcPagination(int $itemPerPage = 4): self
            </td>
        </tr>
        <tr>
            <td>
               Authentification:
            </td>
            <td>
                ..
            </td>
        </tr>
        <tr>
            <td>
               ..
            </td>
            <td>
                ..
            </td>
        </tr>
    </tbody>
</table>

>This framework respects basic coding usage, PHP clean code inspired from James Padolsey(clean code in javascript) ,
>SOLID principle, pattern designs, implement PSR.

> During those months I learned a lot about PHP especially
> how I can use objects to my advantage, interface, abstract classes
> work effectively with arrays, type correctly.
> spread my responsibility and refactor my code.









