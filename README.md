<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBcGhwX2ZyYW1ld29yayUzQSUzQUp1anUwNzU%3D%2F1d8d56ca-3d83-4798-bd77-3871b8113210.png?alt=media&token=645b3dc1-6118-4d7d-900d-a1774403db19" style="width:'25%'"/></div>

<br/>

> Framework personnel léger inpiré de Symfony<br/> > _Natif PHP_<br/>
> réalisé chez Alpha Soft _(ESN d'applicatifs métiers, PHP Symfony)_<br/> > [Bempime KHEVE](https://www.linkedin.com/in/bempime-kheve/)<br/>
>
> © Copyright 2023

<br/>

<br/>
Unit tests in Github Action CI/CD
<br/>

SkillValue | HackerRank

## Topics<br>

| <a href="https://github.com/Juju075/php_framework#uml">UML</a> | <a href="https://github.com/Juju075/php_framework#mvc-architecture">MVC Architecture</a> | <a href="https://github.com/Juju075/php_framework#autoloading-standard-psr-4">Autoloading</a> | <a href="https://github.com/Juju075/php_framework#container-interface-psr-11">Container Interface</a> | <a href="https://github.com/Juju075/php_framework#event-dispatcher-psr-14">Event Dispatcher</a> | <a href="https://github.com/Juju075/php_framework#router">Router</a> | <a href="https://github.com/Juju075/php_framework#object-relation-model-wo-reflexion">ORM</a>
| <a href="https://github.com/Juju075/php_framework#formbuilder">FormBuilder</a> |<br>
| <a href="https://github.com/Juju075/php_framework#querybuilder">QueryBuilder</a> | <a href="https://github.com/Juju075/php_framework#hydratation">Hydratation</a> | <a href="https://github.com/Juju075/php_framework#template-engine">Template Engine</a> | <a href="https://github.com/Juju075/php_framework#repository">Repository</a> | <a href="https://github.com/Juju075/php_framework#exceptions">Exceptions</a> | <a href="https://github.com/Juju075/php_framework#dotenv">DotEnv</a>
| <a href="https://github.com/Juju075/php_framework#csrf-token">Csrf Token</a> | <a href="https://github.com/Juju075/php_framework#pagination">Pagination </a>|<br> | <a href="https://github.com/Juju075/php_framework#authentication">Authentification</a> | <a href="https://github.com/Juju075/php_framework#session-interface">Session Interface</a> | ...

<a href="https://github.com/Juju075/php_framework#other-projects">Other projects:</a>
<br/>

## UML

### <a href="https://github.com/Juju075/php_framework/tree/main/UML">`📄 See diagrams`</a>

<div align="center"><img src="/UML/diagClass.JPG"></div>

<br/>

<br/>

## MVC Architecture

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBcGhwX2ZyYW1ld29yayUzQSUzQUp1anUwNzU%3D%2F8138bd6c-b661-43e1-8129-375f845bdcef.png?alt=media&token=cb5eb76b-09a5-4875-8c14-b7b95d4aa1f2" style="width:'50%'"/></div>

<br/>

## Autoloading Standard (PSR-4)

This PSR describes a specification for autoloading classes from file paths. It is fully interoperable, and can be used in addition to any other autoloading specification, including PSR-0. This PSR also describes where to place files that will be autoloaded according to the specification.

<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->

<h3>Index</h3>

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/public/index.php">📄 public/index.php</a>

```hack
6      require '../vendor/autoload.php';
7      require_once dirname(__DIR__) . '/config/const.php';
8      $app = new \App\Framework\App();
```

<br/>

## Container Interface (PSR-11)

The goal set by ContainerInterface is to standardize how frameworks and libraries make use of a container to obtain objects and parameters (called entries in the rest of this document).

<br/>

<h3>Dependency Injection </h3>

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Container/Container.php">`📄 src/Framework/Container/Container.php`</a>

```hack
19         public function get($id)
20         {
21             if ($this->has($id)) {
22                 $this->entries[$id] = $this->services[$id]($this);
```

<br/>

## Event Dispatcher (PSR-14)

Event Dispatching is a common and well-tested mechanism to allow developers to inject logic into an application easily and consistently.

The goal of this PSR is to establish a common mechanism for event-based extension and collaboration so that libraries and components may be reused more freely between various applications and frameworks.

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Event/EventManager.php">`📄 src/Framework/Event/EventManager.php`</a>

```hack
5      class EventManager implements EventDispatcherInterface
```

<br/>

## Router

Match the url with your routes using Regex depending on which one is requested.<br>
Recognize all methods [GET, POST, PUT, DELETE]

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Router/Router.php">`📄 src/Framework/Router/Router.php`</a>

```hack
28                 $isRegex = strpos($route->getUrl(), "/^") !== false;
29                 if ($isRegex && preg_match($route->getUrl(), $currentUrl) === 1) {
30                     if($currentMethod !== 'GET'){
31                         $method = $_POST['_method'];
```

<br/>

## Object Relation Model w/o reflexion

#### > run this script w custom CLI cmd like 'create database'

Use of a recursive function and file system to scrape your entity folder and reconstruct a model of your database 'tables and columns'

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/DirectoryResolver.php">📄 src/Framework/Database/DirectoryResolver.php</a>

```hack
49         public static function getClassNameAndNamespace(array $listing): array
50         {
51             $ClassNameAndNamespace = [];
52             foreach ($listing as $fileName) {
53                 $FileLgn = file($fileName, FILE_SKIP_EMPTY_LINES);
```

<br/>

## FormBuilder

Build your formType and obtain a html

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Form/Type/PostType.php">📄 src/Form/Type/PostType.php</a>

```hack
17         public function formBuilder(): Form
18         {
19             $this->form = new Form('', 'post', ['attribute' => 'test'],
20                 'Send');
```

<br/>

## QueryBuilder

Build your query request on the fly

<br/>

### <a  href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/EntityManager.php">📄 src/Framework/Database/EntityManager.php</a>

```hack
32             $query = (new Query())->insert($tableName, $keysValues);
33             $this->request = $this->pdo->prepare($query);
34
35             foreach ($keysValues as $key => $value) {
```

<br/>

## Hydratation

Allows you to hydrate any object

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/Hydrator.php">📄 src/Framework/Database/Hydrator.php</a></a>

```hack
25             $dataClean = $isEntity ? $dataArray : FieldResolver::ValuesToClean($dataArray);
26             $instance = new $className();
27             foreach ($dataClean as $key => $value) {
28                 $setter = 'set' . ucwords($key);
```

<br/>

## Template Engine

Generate output page on the fly

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Controller/PostController.php">📄 src/Controller/PostController.php</a></a>

```hack
36            $template = new Template(TEMPLATE_DIRECTORY.'content/posts.php', 1, ['posts' => $posts]);
37            TemplateResolver::createChildTemplateContent((string)$template);
38            echo $this->render($template->getPath(), $template->getParameters());
```

<br/>
<a href="https://github.com/Juju075/php_framework#topics">Top of page</a>

## Repository

Interrogate your database and return a response

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Repository/AbstractRepository.php">📄 src/Framework/Repository/AbstractRepository.php</a>

```hack
27         public function selectOneById(array $params): object
28         {
29             $query = (new Query())
30                 ->select()
31                 ->from($this->getTable())
```

<br/>

## Exceptions

Create your own exception that override /Exception

NotFoundException | ResourceNotFound | ect...

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Exceptions/NotFoundException.php">📄 src/Exceptions/NotFoundException.php</a>

```hack
11     class NotFoundException extends Exception implements ExceptionInterface
12     {
13         public function __construct($message = "Page not found")
14         {
15             $code = ErrorStatusCode::HTTP_NOT_FOUND;
16             if (!in_array(ErrorStatusCode::errors[$code], ErrorStatusCode::errors)) {
```

<br/>

## DotEnv

Load,read your .env file perform and extraction your params as \[key=>value\]

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Database/DotEnv.php">📄 src/Framework/Database/DotEnv.php</a>

```hack
49             foreach ($scrapped as $key => $value) {
50                 if ($key === 'DATABASE_DNS') {
51                     $this->credentials[$key] = $value;
52                 }
```

<br/>

## Csrf Token

Generate the crsf token for you

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/src/Framework/Form/Token.php">📄 src/Framework/Form/Token.php</a>

```hack
31         public function __toString(): string
32         {
33             $token = [];
34             $token[] = sprintf('<input type="hidden"  name="%s"/>', form::TOKEN_FIELD_NAME);
35             return implode($token);
```

<br/>

## Pagination

Split your response per page

<br/>

### <a href="https://github.com/Juju075/php_framework/blob/main/templates/content/Pagination.php">📄 templates/content/Pagination.php</a>

```hack
20         public function calcPagination(int $itemPerPage = 4): self
21         {
22             $this->itemPerPage = $itemPerPage;
23             $totalPosts = $this->repository->total($this->repository->getTable());
24             $currentPage = 1;
```

<br/>

## Authentication/

Lets you connect with your credentials

<br/>

## <a href="">Session Interface</a>

<br/>

<br/>

<h3>What i learned?</h3>

> This framework respects basic coding usage, PHP clean code inspired from James Padolsey(clean code in javascript) , SOLID principle, pattern designs, implement PSR.

> During those months I learned a lot about PHP especially how I can use objects to my advantage, interface, abstract classes, the power of inheritance work effectively with arrays, type correctly. spread my responsibility and refactor my code.
>
> Now i'm proud to be able to code a structured and maintainable application.

[Bempime KHEVE](https://www.linkedin.com/in/bempime-kheve/)<br/>

<a href="https://github.com/Juju075/php_framework#topics">Top of page</a>

# Other projects:

<a href="https://github.com/Juju075/symfony-devops">Symfony 6 + PHP8.1.0 + PHPUnit + Jenkins + Docker</a>
