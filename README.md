# yellow-cookie
Simple Cookie Extension for Datenstrom Yellow  

The main purpose of this extension is to use its functions in other extensions.

## Example
``` php
// Using Cookie Extension in another Extension
if ($this->yellow->extension->isExisting("cookie")) {

    $this->yellow->extension->get("cookie")->setCookie("Key1", "Value1"); // one liner

    // When multiply time used this approach is suggested:
    $cookie = $this->yellow->extension->get("cookie");
    $cookie>setCookie("Key2", "Value2");
    $output = $cookie->getCookie("Key2");
}
```

## Testing

Set a cookie (example markdown page):  
``` 
---
Title: Example page
---
This is an example page seting a cookie:
[cookie set Key1 Value1]
```
Reading a cookie: 
``` 
[cookie get Key1]
```

Deleting a cookie:  
``` 
[cookie del Key1]
``` 

The Markdown inline functinality above is more for testing purpose.

## Discussion
This is just an inital proposal.  
Please use this discussion to bring in your suggestions:
https://github.com/datenstrom/community/discussions/1083
