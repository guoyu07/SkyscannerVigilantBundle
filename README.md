# Skyscanner Vigilant Bundle
[![Skyscanner Vigilant Bundle](http://business.skyscanner.net/Content/images/logo/ssf-white-color.png)](http://www.skyscanner.net)

[![Latest Stable Version](https://img.shields.io/badge/jeancsil-skyscanner--vigilant--bundle-blue.svg)](https://packagist.org/packages/jeancsil/skyscanner-vigilant-bundle)



Symfony2 Bundle that provides console commands to keep watching flight deals for you!


## Install
`composer require jeancsil/skyscanner-vigilant-bundle`

OR

Add in your composer.json:

```json
"require": {
    "jeancsil/skyscanner-vigilant-bundle": "1.*"
}
```

Enable the bundle:

```php
class AppKernel extends Kernel
{
    public function registerBundles()
	{
        $bundles = array(
	        ...
            new Jeancsil\Skyscanner\VigilantBundle\JeancsilSkyscannerVigilantBundle(),
            ...
        );

    }
}
```

Add these configurations in your parameters.yml file:

```yaml
jeancsil.skyscanner.api.host: 'http://partners.api.skyscanner.net'
jeancsil.skyscanner.api.key: YOUR_API_KEY
jeancsil.skyscanner.http.client.config:
    base_uri: '%jeancsil.skyscanner.api.host%'
    timeout: 30
    headers:
        Content-Type: application/x-www-form-urlencoded
        Accept: application/json
        User-Agent: 'Mozilla/5.0 (Windows NT 10.0; WOW64) (OPTIONAL)'
```

## Documentation

Simply run `bin/console skyscanner:vigilant:live_prices --help` to get it running.

Example:`bin/console skyscanner:vigilant:live_prices --from=GRU-sky --to=FRA-sky --departure=2016-10-01 --arrival=2016-11-01 --country=BR --currency=BRL --locale=pt-BR`.

You might want to put it in your crontab as well. (*and go grab a beer!*)

## Support

For general support and questions, find me on Twitter as [@jeancsil](http://twitter.com./jeancsil).

Bugs and suggestions: [open a ticket](https://github.com/jeancsil/SkyscannerVigilantBundle/issues).

## License

This package is available under the [MIT license](LICENSE).
