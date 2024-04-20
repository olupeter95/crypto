## About Coinshape

## Things The Admin Should Note
- 

## Make authentication ui.
Since, it is making use of laravel version 7, the laravel ui version will be version 2
1.) composer require laravel/ui:^2
2.) php artisan ui bootstrap --auth
3.) npm install && npm run dev --"This completes your fresh scaffolding

## Avoid ssl issue in smtp configuration
Add the lines below to the config/mail.php file after the line 'timeout' => null 
'stream' => [
    'ssl' => [
        'allow_self_signed' => true,
        'verify_peer' => false,
        'verify_peer_name' => false,
    ],
],

## Override the default mail ui for laravel
1.) php artisan vendor:publish --tag=laravel-notifications
2.) php artisan vendor:publish --tag=laravel-mail

## Override the default error code page in laravel
1.) php artisan vendor:publish --tag=laravel-errors

## Clear configuration cache
php artisan config:cache

## To implement must verify email
Add the line below to the said Model, e.g User
implements MustVerifyEmail

## To add the necessary verify routes
Add ['verify' => true] to Auth::routes()

## To allow only verified users access
Add ->middleware('verified') to said route

## Include sidebar
@include('xx.xxx')


### Contributor

- **[Lois Onyinyemme Bassey](https://github.com/ThatLadyDev/)**


## Security Vulnerabilities

If you discover a security vulnerability within Coinshape, please send an e-mail to Lois Bassey via [loisbassey@gmail.com](mailto:loisbassey@gmail.com). All security vulnerabilities will be promptly addressed.

