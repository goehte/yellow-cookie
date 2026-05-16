<?php
// Cookie extension for Datenstrom Yellow
// Provides a simple cookie management

class YellowCookie {
    const VERSION = "0.0.1";
    public $yellow;

    // Initialize session automatically when the extension loads
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content element
    public function onParseContentElement($page, $name, $text, $attributes, $type) {
        $output = "";

        if ($name=="cookie" && ($type=="block" || $type=="inline")) {
        
            list($comand, $key, $value) = $this->yellow->toolbox->getTextArguments($text);

            // Set Cookie with [cookie set key value]
            if ($comand=="set" && !empty($key) && !empty($value)) $this>setCookie($key, $value);
            
            // Get Cookie with [cookie get key]
            if ($comand=="get" && !empty($key)) { $output = $this->getCookie($key); }
            
            // Delete Cookie with [cookie del key]
            if ($comand=="del" && !empty($key)) $this->deleteCookie($key);
        
        }
        return $output;
    }

    public function getCookie($key) {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : "";
    }

    public function setCookie($key, $value, $expire = 0, $path = "", $domain = "", $secure = false, $httpOnly = false) {
        setcookie($key, (string)$value, (int)$expire, (string)$path, (string)$domain, (bool)$secure, (bool)$httpOnly);
        $_COOKIE[$key] = $value;
    }

    public function deleteCookie($key, $path = "", $domain = "") {
        if (isset($_COOKIE[$key])) {
            setcookie($key, "", time() - 3600, $path, $domain);
            unset($_COOKIE[$key]);
        }
    }
}
