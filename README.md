# Laravel Consul KV

Package for help you load config from `Consul` server

## Install

`composer require faisalilhami/laravel-consul-kv`

### Laravel

1. Register service in `providers` array in `config/app.php` if you are using Laravel <= 10
2. Register service in `providers` array in `boostrap/providers.php` if you are using Laravel >= 11

```
Faisalilhami\LaravelConsulKv\ConsulProvider::class
```

Publish consul configuration file

```
php artisan vendor:publish --provider="Faisalilhami\LaravelConsulKv\ConsulProvider"
```

Publish consul configuration file

``` shell
cp vendor/faisalilhami/laravel-consul-kv/src/consul.php config/consul.php
```

## Config

Create `.env` file with these configurations:

```dotenv
CONSUL_ENABLE=true
CONSUL_URI=
CONSUL_TOKEN=
CONSUL_SCHEME=
CONSUL_DC=
CONSUL_PATH=
CONSUL_RECURSIVE=true
```

Add any Key Folder Consul you want to be loaded

```php
'keys'   => [
        // 'foo',
        // 'bar'
    ],
```

## Get env from Consul
```shell
php artisan get:consul
```
