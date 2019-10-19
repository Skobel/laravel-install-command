# Laravel Artisan Install Command

### Introduction
Use this package to define your application's installation steps,
so you can deploy your Laravel project more easily.

### Installation

Install using composer:
```
composer require skobel/laravel-install-command
```

Laravel should automatically discover the service provider.

### Quickstart
Follow these steps to get started quickly.

Run the setup command:
```
php artisan installer:setup
```
This will create the following files and directories in your `app` folder:
```
Installation/
    Steps/
    Configuration.php
```

In the newly created `Configuration.php` you can define your installation steps. 
There are a few default steps available out of the box.

```
class Configuration extends \Skobel\LaravelInstallCommand\Configuration
{
    public function steps(): array
    {
        return [
            //new CopyDotEnvFile,
            //new GenerateApplicationKey,
            //new RunMigrations,
            //new SeedDatabase,
        ];
    }
}
```

Begin installation:
```
php artisan install
```

### Available Steps

| Class name                | Description   |
| ------------------------- | ------------- |
| CopyDotEnvFile            | Copy .env.example to .env
| GenerateApplicationKey    | Run `php artisan key:generate`
| RunMigrations             | Run your migrations with the `--force` option
| SeedDatabase              | Seed your database with the `--force` option
| CreatePassportKeys        | Run `php artisan passport:keys`, use only if you have Laravel Passport installed

### Creating Installation Steps

```
php artisan installer:step StepName
```
This will generate a Step class with the given name. Next add this Step to your `steps` array in your configuration:
```
use App\Installation\Steps\StepName;

class Configuration extends \Skobel\LaravelInstallCommand\Configuration
{
    public function steps(): array
    {
        return [
            // ...
            new StepName,
        ];
    }
}
```

### Custom Configuration and Directory Structure
Of course you can place your configuration class and installation steps wherever you want. After you have
your configuration class at a custom location add the following code to your `AppServiceProvider`'s boot method.
```
use App\Installation\Configuration;

// ...

public function boot()
{
    Installer::use(new Configuration);
}
```
