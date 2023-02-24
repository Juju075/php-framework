<?php

namespace App\Framework\Form;

use App\Form\Form;

interface FormTypeInterface
{
    public function formBuilder(): Form;
    public function prepopulateFields(array $fieldsName): Form;
}