#Dynamic Inset PHP renderer
##A reference renderer for insets, in php

This php library is a reference implementation of a renderer for the [inset.json spec](https://docs.google.com/a/dowjones.com/document/d/1NQ0UZYnyq89RFg3-Y7WxmYr7qVhsVBIrNPDpmgF66JA/edit?usp=sharing).

The library takes a remote inset.json file, finds the data and template urls, requests them, and returns the rendered result. The individual assets are available after rendering for access or post-processing as well.

##Note:
This library uses the [mustache.php](https://github.com/bobthecow/mustache.php/)
renderer, embedded in this repo for the time being. It will later be replaced by a
[Composer-compatible](https://getcomposer.org/) package.

###PHP library
```php
<?php

    //include the inset rendering library
    require('lib/inset.php');

    //create a new inset
    $inset = new inset();

    //render the inset
    $rendered_inset = $inset->render('http://dynamic-insets.s3.amazonaws.com/example/inset.json');

    //output the inset
    echo $rendered_inset;
```

###Example of [inset.json](http://dynamic-insets.s3.amazonaws.com/example/inset.json)
```javascript
{
  "status": "OK",
  "type": "InsetDynamic",
  "platforms": [
    "desktop",
    "mobile"
  ],
  "serverside": {
    "data": {
      "url": "http://dynamic-insets.s3.amazonaws.com/example/data.json"
    },
    "template": {
      "url": "http://dynamic-insets.s3.amazonaws.com/example/template.mu"
    }
  }
}

```
