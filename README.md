# Barklis/Respondus

## Overview
Barklis/Respondus is a PHP package designed to handle Data Transfer Object (DTO) responses in a typed manner. It offers seamless integration with [Spatie TypeScript Transformer](https://github.com/spatie/typescript-transformer), enhancing the efficiency and readability of DTO responses in PHP applications.

## Requirements
- PHP 8.2 or higher

## Installation
To install the package, use Composer:

```composer require elsuterino/respondus```

## Usage
Barklis/Respondus simplifies the process of creating DTOs and managing their visibility. You can easily define hidden fields for your resources.

### Creating a Resource
```php
use Barklis\Respondus\Options;
use Barklis\Respondus\Respondus;

class UserResource extends Respondus
{
    public function makeFromModel(User $user): self
    {
        $this->id = $user->id;
        $this->email = $user->email;
        // Additional fields...
        return $this;
    }
    // Other class methods...
}

$resource = (new UserResource)->makeFromModel($user)->setHidden(UserResource::class, 'email')->toArray();
```

License
This project is licensed under the MIT License. For more details, see the LICENSE file.
