# Elsuterino/Respondus

## Overview
Elsuterino/Respondus is a PHP package designed to handle Data Transfer Object (DTO) responses in a typed manner. It offers seamless integration with [Spatie TypeScript Transformer](https://github.com/spatie/typescript-transformer), enhancing the efficiency and readability of DTO responses in PHP applications.

## Requirements
- PHP 8.2 or higher

## Installation
To install the package, use Composer:

```composer require elsuterino/respondus```

## Usage
Elsuterino/Respondus simplifies the process of creating DTOs and managing their visibility. You can easily define hidden fields for your resources.

### Creating a Resource
```php
use Elsuterino\Respondus\Options;
use Elsuterino\Respondus\Respondus;

class UserResource extends Respondus
{
    public static function make(mixed $data, Options $options = new Options()): static
    {
        $resource = new self($options);
        $resource->id = $data->id;
        $resource->email = $data->email;
        // Additional fields...
        return $resource;
    }
    // Other class methods...
}

$options = Options::new()->setHidden(UserResource::class, 'email');
$instance = UserResource::make($data, $options);
$json = json_encode($instance);

## Nesting Resources
When working with nested resources, you can define hidden fields for each resource easily:
```php
$options = Options::new()
             ->setHidden(UserResource::class, 'email')
             ->setHidden(UserPostsResource::class, 'comments');
```

License
This project is licensed under the MIT License. For more details, see the LICENSE file.
