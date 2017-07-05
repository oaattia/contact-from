<?php


namespace Oaattia\ContactForm\Validation;


use Interop\Container\ContainerInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ContactFormValidation
 * @package Oaattia\ContactForm\Validation
 */
class ContactFormValidation
{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * @var ValidatorInterface
     */
    private $validator;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                new NotBlank(),
            ],
            'email' => [
                new Email(),
                new NotBlank(),
            ],
            'message' => [
                new NotBlank(),
            ],
        ];
    }

    /**
     * @return array
     */
    public function handle()
    {

        $violationsArray = [];

        foreach ($this->rules() as $key => $constraints) {
            $item = $this->container->request->getParsedBodyParam($key);
            $violationsArray[] = $this->validator->validate($item, $constraints);
        }

        return $violationsArray;

    }

}