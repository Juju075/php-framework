<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBcGhwX2ZyYW1ld29yayUzQSUzQUp1anUwNzU%3D%2F1d8d56ca-3d83-4798-bd77-3871b8113210.png?alt=media&token=645b3dc1-6118-4d7d-900d-a1774403db19" style="width:'25%'"/></div>

<br/>

> Framework personnel léger inpiré de Symfony<br/>
> _Natif PHP_<br/>
> réalisé chez Alpha Soft _(ESN d'applicatifs métiers, PHP Symfony)_<br/>
> [Bempime KHEVE](https://www.linkedin.com/in/bempime-kheve/)<br/>
>
> © Copyright 2023

<br/>

<br/>

## Unit tests in Github Action CI/CD

<br/>

### SkillValue

<br/>

### UML `📄 UML`

<br/>

<br/>

## MVC Architecture

<br/>

<div align="center"><img src="https://firebasestorage.googleapis.com/v0/b/swimmio-content/o/repositories%2FZ2l0aHViJTNBJTNBcGhwX2ZyYW1ld29yayUzQSUzQUp1anUwNzU%3D%2F8138bd6c-b661-43e1-8129-375f845bdcef.png?alt=media&token=cb5eb76b-09a5-4875-8c14-b7b95d4aa1f2" style="width:'50%'"/></div>

<br/>

## Autoloading Standard (PSR-4)

This PSR describes a specification for autoloading classes from file paths. It is fully interoperable, and can be used in addition to any other autoloading specification, including PSR-0. This PSR also describes where to place files that will be autoloaded according to the specification.

## Index `📄 public/index.php`

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 public/index.php
```hack
6      require '../vendor/autoload.php';
7      
8      
9      
10     $app = new \App\Framework\App();
```

<br/>

## Container Interface (PSR-11)

This document describes a common interface for dependency injection containers.

The goal set by ContainerInterface is to standardize how frameworks and libraries make use of a container to obtain objects and parameters (called entries in the rest of this document).

<br/>

## Dependency Injection `📄 src/Framework/Container/Container.php`

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Container/Container.php
```hack
19         public function get($id)
20         {
21             if ($this->has($id)) {
22                 $this->entries[$id] = $this->services[$id]($this);
```

<br/>

## Event Dispatcher (PSR-14) `📄 src/Framework/Event/EventManager.php`

Event Dispatching is a common and well-tested mechanism to allow developers to inject logic into an application easily and consistently.

The goal of this PSR is to establish a common mechanism for event-based extension and collaboration so that libraries and components may be reused more freely between various applications and frameworks.

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Event/EventManager.php
```hack
5      class EventManager implements EventDispatcherInterface
```

<br/>

## Router `📄 src/Framework/Router/Router.php`

Match the url with your routes

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Router/Router.php
```hack
28                 $isRegex = strpos($route->getUrl(), "/^") !== false;
29                 if ($isRegex && preg_match($route->getUrl(), $currentUrl) === 1) {
30                     if($currentMethod !== 'GET'){
31                         $method = $_POST['_method'];
```

<br/>

## Object Relation Model w/o reflexion `📄 src/Framework/Database/Schema.php`

Use of a recursive function and file system to scrape your entity folder to reconstruct a model of your database 'tables and columns'

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Database/DirectoryResolver.php
```hack
49         public static function getClassNameAndNamespace(array $listing): array
50         {
51             $ClassNameAndNamespace = [];
52             foreach ($listing as $fileName) {
53                 $FileLgn = file($fileName, FILE_SKIP_EMPTY_LINES);
```

<br/>

## FormBuilder `📄 src/Framework/Form/Form.php`

Build your formType and obtain a html

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Form/Type/PostType.php
```hack
17         public function formBuilder(): Form
18         {
19             $this->form = new Form('', 'post', ['attribute' => 'test'],
20                 'Send');
```

<br/>

## QueryBuilder `📄 src/Framework/Database/Query.php`

Build your query request on the fly

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Database/EntityManager.php
```hack
32             $query = (new Query())->insert($tableName, $keysValues);
33             $this->request = $this->pdo->prepare($query);
34     
35             foreach ($keysValues as $key => $value) {
```

<br/>

## Hydratation `📄 src/Framework/Database/Hydrator.php`

Allows you to hydrate any object

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Database/Hydrator.php
```hack
25             $dataClean = $isEntity ? $dataArray : FieldResolver::ValuesToClean($dataArray);
26             $instance = new $className();
27             foreach ($dataClean as $key => $value) {
28                 $setter = 'set' . ucwords($key);
```

<br/>

## Repository `📄 src/Framework/Repository/PostRepository.php`

Interrogate your database and return a response

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Repository/AbstractRepository.php
```hack
27         public function selectOneById(array $params): object
28         {
29             $query = (new Query())
30                 ->select()
31                 ->from($this->getTable())
```

<br/>

## Exceptions `📄 src/Exceptions/NotFoundException.php`

Create your own exception that overide /Exception

NotFoundException | RessourceNotFound | ect...

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Exceptions/NotFoundException.php
```hack
11     class NotFoundException extends Exception implements ExceptionInterface
12     {
13         public function __construct($message = "Page not found")
14         {
15             parent::__construct($message, AbstractErrorCode::HTTP_NOT_FOUND);
```

<br/>

## DotEnv `📄 src/Framework/Database/DotEnv.php`

Load and read your .env file perform an extraction of your params as \[key=>value\]

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Database/DotEnv.php
```hack
49             foreach ($scrapped as $key => $value) {
50                 if ($key === 'DATABASE_DNS') {
51                     $this->credentials[$key] = $value;
52                 }
```

<br/>

## Csrf Token `📄 src/Framework/Form/Token.php`

Generate the crsf token for you

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 src/Framework/Form/Token.php
```hack
31         public function __toString(): string
32         {
33             $token = [];
34             $token[] = sprintf('<input type="hidden"  name="%s"/>', form::TOKEN_FIELD_NAME);
35             return implode($token);
```

<br/>

## Pagination `📄 templates/content/Pagination.php`

Split your response per page

<br/>


<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 templates/content/Pagination.php
```hack
20         public function calcPagination(int $itemPerPage = 4): self
21         {
22             $this->itemPerPage = $itemPerPage;
23             $totalPosts = $this->repository->total($this->repository->getTable());
24             $currentPage = 1;
```

<br/>

## Authentification/

Lets you connect with you credentials

<br/>

## Session Interface

<br/>

<br/>

> This framework respects basic coding usage, PHP clean code inspired from James Padolsey(clean code in javascript) , SOLID principle, pattern designs, implement PSR.

> During those months I learned a lot about PHP especially how I can use objects to my advantage, interface, abstract classes work effectively with arrays, type correctly. spread my responsibility and refactor my code.

<br/>

