<?php


namespace Oaattia\ContactForm\Validation;

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactFormValidation extends AbstractValidator
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            'name' => [
                new NotBlank(["message" => "Name is missing."]),
            ],
            'email' => [
                new Email(["message" => "Invalid email address."]),
                new NotBlank(["message" => "Email address is missing."]),
            ],
            'message' => [
                new NotBlank(["message" => "Message shouldn't be blank."]),
            ],
        ];
    }

}