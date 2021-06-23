Google SDK
==========

# Previous integration

"bitgandtter/google-api": "0.6.*"

# Next integration

"google/apiclient": "dev-master"

# SDK context

```
'google' => array(
    'key' => '927858122838.apps.googleusercontent.com',
    'secret' => 'whG26_3I6QD5KzrE_jGid8lP',
    'api_key' => 'AIzaSyCpdJua8XkOww-RmWHSk7xIhAwK2ln_ymw'
)

$this['google'] = $this->share(function() use ($externalParameters) {

    $google = new \Google_Client();
    $google->setClientId($externalParameters['google']['key']);
    $google->setClientSecret($externalParameters['google']['secret']);
    $google->setDeveloperKey($externalParameters['google']['api_key']);

    return $google;
});

```
