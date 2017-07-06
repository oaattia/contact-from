<?php

namespace Oaattia\ContactForm\Validation;

use Interop\Container\ContainerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

abstract class AbstractValidator
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    /**
     * @var ValidatorInterface
     */
    protected $validator;

    /**
     * ContactFormValidation constructor.
     * @param ContainerInterface $container
     * @param ValidatorInterface $validator
     */
    public function __construct(ContainerInterface $container, ValidatorInterface $validator)
    {
        $this->container = $container;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return array
     */
    public function handle(array $data)
    {
        $violationsArray = [];

        foreach ($data['form'] as $item) {
            if (!isset($this->rules()[$item['name']])) {
                continue;
            }
            $violationsArray[] = $this->validator->validate($item['value'], $this->rules()[$item['name']]);
        }

        $messages = $this->fetchViolationMessages($violationsArray);

        return $messages;
    }

    /**
     * Fetch the violation messages if any
     *
     * @param $violationsArray
     * @return array
     */
    protected function fetchViolationMessages($violationsArray) : array
    {
        $messages = [];

        if (!empty($violationsArray)) {
            foreach ($violationsArray as $violation) {
                if (count($violation) > 0) {
                    foreach ($violation as $error) {
                        $messages[] = $error->getMessage();
                    }
                }
            }
        }

        return $messages;
    }

    /**
     * Define the rules
     *
     * @return array $rules
     */
    abstract public function rules();
}