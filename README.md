# Local Config

Magento 2 module which allows you to store some system config settings in your file system. Just put file with name `.local_config` in root Magento folder with content like a:

```data
<config path> <config value>
<config path> <config value>
```

For example you can use this module if you want to switch your local Magento installation to staging database (if your local Magento server has different url with staging). In this situation file `.local_config` will have content like this:

```data
web/secure/base_url http://local_magento.local/
web/secure/base_web_url http://local_magento.local/
web/secure/base_link_url http://local_magento.local/
web/unsecure/base_url http://local_magento.local/
web/unsecure/base_web_url http://local_magento.local/
web/unsecure/base_link_url http://local_magento.local/
```

## TODO

 - Improve caching
 - System config values like a {{unsecure_base_url}} doesn't work
 - Add Composer
 - Add installation guide

License
----

MIT