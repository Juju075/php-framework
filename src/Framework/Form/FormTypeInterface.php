<?php

namespace App\Framework\Form;

interface FormTypeInterface
{
    public function formBuilder(): Form;
    public function prepopulateFields(array $fieldsName): Form;
}