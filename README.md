<p><img alt="Image" title="icon" src="Icon-pictures.png" /></p>
<blockquote>
    Framework personnel léger inpiré de Symfony<br>
    <mark>Natif PHP,</mark>
    réalisé chez Alpha Soft <em>(ESN d'applicatifs métiers, PHP Symfony)<br>
    <a href="https://www.linkedin.com/in/bempime-kheve/" target="_blank"> Bempime KHEVE</a><br>
    &copy; Copyright 2023
</blockquote>
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
               Object Relation database entity (recursive function):
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
               Exception:
                <a href="https://github.com/Juju075/php_framework/blob/main/src/Exception/NotFoundException.php" target="_blank">
                here </a><br>
            </td>
            <td>
                parent::__construct($message, ErrorCode::HTTP_NOT_FOUND);
            </td>
        </tr>
        <tr>
            <td>
               Dotenv:
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
               Authentification:
            </td>
            <td>
                code idi
            </td>
        </tr>
        <tr>
            <td>
               Session:
            </td>
            <td>
                code idi
            </td>
        </tr>
        <tr>
            <td>
               Event Manager (PSR-14):
            </td>
            <td>
                code idi
            </td>
        </tr>
        <tr>
            <td>
               ici
            </td>
            <td>
                code idi
            </td>
        </tr>
    </tbody>
</table>

> This framework respects basic coding usage, SOLID principle, pattern designs, implement PSR.

>During those months i learned a lot about PHP as
how i can use objects to my advantage, interface, abstract classes
work effectively with arrays and type correctly. 
spread my responsibility and refactor my code.









