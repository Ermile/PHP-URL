<?php
/**
 * @desc :
 * An url can contain the following components :
 * url :‌
 * https://ermile.tejarak.com:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * protocol.subdomain.root.tld:port/lang/content/module/child/property?query
 * base      : https://ermile.tejarak.com:80/fa
 * path      : fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * dir       : cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * host      : ermile.tejarak.com:80
 * protocol  : https
 * sub_domain : ermile
 * root      : tejarak
 * tld       : .com
 * domain    : tejarak.com
 * port      : 80
 * lang      : fa
 * content   : cp
 * module    : tools
 * child     : sitemap
 * property  : ch=1/sa=2
 * query     : run=true&ex=0
 * If our url contains an IP :
 * url :‌
 * https://192.168.1.2:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * protocol.ip:port/lang/content/module/child/property?query
 * IP replacement subdomain.root.tld

 * @example1 :
 * url :
 * https://ermile.tejarak.com:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::full()            // https://ermile.tejarak.com:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::path()            // fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::base()            // https://ermile.tejarak.com:80/fa
 * \lib\url::dir()             // cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::dir(0)            // cp
 * \lib\url::dir(1)            // tools
 * \lib\url::dir(2)            // sitemap
 * \lib\url::dir(3)            // ch=1
 * \lib\url::dir(4)            // sa=2
 * \lib\url::protocol()        // https
 * \lib\url::host()            // ermile.tejarak.com:80
 * \lib\url::sub_domain()       // ermile.
 * \lib\url::domain()          // tejarak.com
 * \lib\url::root()            // tejarak
 * \lib\url::tld()             // .com
 * \lib\url::port()            // 80
 * \lib\url::lang()            // fa
 * \lib\url::content()         // cp
 * \lib\url::module()          // tools
 * \lib\url::child()           // saitemap
 * \lib\url::property()        // ch=1/sa=2
 * \lib\url::property("ch")    // 1
 * \lib\url::property("sa")    // 2
 * \lib\url::query()           // run=true&ex=0
 * \lib\url::query("run")      // true
 * \lib\url::query("ex")       // 0

 * @example2 :
 * url :‌
 * https://192.168.1.2:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::full()            // https://192.168.1.2:80/fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::path()            // fa/cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::base()            // https://192.168.1.2:80/fa
 * \lib\url::dir()             // cp/tools/sitemap/ch=1/sa=2?run=true&ex=0
 * \lib\url::dir(0)            // cp
 * \lib\url::dir(1)            // tools
 * \lib\url::dir(2)            // sitemap
 * \lib\url::dir(3)            // ch=1
 * \lib\url::dir(4)            // sa=2
 * \lib\url::protocol()        // https
 * \lib\url::host()            // 192.168.1.2:80
 * \lib\url::sub_domain()       // null
 * \lib\url::domain()          // 192.168.1.2
 * \lib\url::root()            // null
 * \lib\url::tld()             // null
 * \lib\url::port()            // 80
 * \lib\url::lang()            // fa
 * \lib\url::content()         // cp
 * \lib\url::module()          // tools
 * \lib\url::child()           // saitemap
 * \lib\url::property()        // ch=1/sa=2
 * \lib\url::property("ch")    // 1
 * \lib\url::property("sa")    // 2
 * \lib\url::query()           // run=true&ex=0
 * \lib\url::query("run")      // true
 * \lib\url::query("ex")       // 0

 * @example3 :
 * url :
 * https://tejarak.com/cp/tools/sitemap/ch=1/sa=2
 * \lib\url::full()            // https://tejarak.com/cp/tools/sitemap/ch=1/sa=2
 * \lib\url::path()            // cp/tools/sitemap/ch=1/sa=2
 * \lib\url::base()            // https://tejarak.com
 * \lib\url::dir()             // cp/tools/sitemap/ch=1/sa=2
 * \lib\url::dir(0)            // cp
 * \lib\url::dir(1)            // tools
 * \lib\url::dir(2)            // sitemap
 * \lib\url::dir(3)            // ch=1
 * \lib\url::dir(4)            // sa=2
 * \lib\url::protocol()        // https
 * \lib\url::host()            // tejarak.com
 * \lib\url::sub_domain()       // null
 * \lib\url::domain()          // tejarak.com
 * \lib\url::root()            // tejarak
 * \lib\url::tld()             // .com
 * \lib\url::port()            // null
 * \lib\url::lang()            // null
 * \lib\url::content()         // cp
 * \lib\url::module()          // tools
 * \lib\url::child()           // saitemap
 * \lib\url::property()        // ch=1/sa=2
 * \lib\url::property("ch")    // 1
 * \lib\url::property("sa")    // 2
 * \lib\url::query()           // null

 * @example4 :
 * url :
 * http://tejarak.com/cp/tools/sitemap
 * \lib\url::full()            // http://tejarak.com/fa/tools/sitemap/
 * \lib\url::path()            // fa/tools/sitemap
 * \lib\url::base()            // https://tejarak.com/fa
 * \lib\url::dir()             // tools/sitemap
 * \lib\url::dir(0)            // null
 * \lib\url::dir(1)            // tools
 * \lib\url::dir(2)            // sitemap
 * \lib\url::dir(3)            // null
 * \lib\url::protocol()        // http
 * \lib\url::host()            // tejarak.com
 * \lib\url::sub_domain()       // null
 * \lib\url::domain()          // tejarak.com
 * \lib\url::root()            // tejarak
 * \lib\url::tld()             // .com
 * \lib\url::port()            // null
 * \lib\url::lang()            // null
 * \lib\url::content()         // null
 * \lib\url::module()          // tools
 * \lib\url::child()           // saitemap
 * \lib\url::property()        // null
 * \lib\url::query()           // null

 * @example5 :
 * url :
 * http://tejarak.com/
 * \lib\url::full()            // http://tejarak.com
 * \lib\url::path()            // null
 * \lib\url::base()            // https://tejarak.com
 * \lib\url::dir()             // null
 * \lib\url::dir(0)            // null
 * \lib\url::protocol()        // http
 * \lib\url::host()            // tejarak.com
 * \lib\url::sub_domain()       // null
 * \lib\url::domain()          // tejarak.com
 * \lib\url::root()            // tejarak
 * \lib\url::tld()             // .com
 * \lib\url::port()            // null
 * \lib\url::lang()            // null
 * \lib\url::content()         // null
 * \lib\url::module()          // null
 * \lib\url::child()           // null
 * \lib\url::property()        // null
 * \lib\url::query()           // null
 */
namespace lib;


class url
{
    private static $page_url = null;
    public static $url_array = null;
    private static $is_set = false;

    /**
     * @param null|string $_url
     *
     * @return null|string = self::$page_url
     */
    public static function make_url($_url = null)
    {
        if (isset($_url))
        {
            self::$page_url = null;
            self::$url_array = null;
            self::$is_set = false;
            if (filter_var($_url, FILTER_VALIDATE_URL))
            {
                self::$page_url = $_url;
                return self::$page_url;
            }

        }
        else
        {

            if (isset($_SERVER['HTTPS']))
            {
                $protocol = "https";
            }
            else
            {
                $protocol = "http";
            }
            self::$page_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        }

        if (isset(self::$page_url) && strpos(self::$page_url ,"/") !== false )
        {
            return self::$page_url;
        }
        else
        {
            self::$page_url = false;
            return self::$page_url ;
        }
    }


    /**
     * @param $_language string a word to check is language or not
     *
     * @return bool
     */
    private static function check_language($_language)
    {
        $languages = ["fa","en","us","az"];
//        $languages = (is_array($languages) ? $languages : null);
        if (is_array($languages) && isset($languages))
        {
            if (in_array($_language,$languages) === true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            $languages = null;
            return false;
        }
    }

    /**
     * @return self::$url_array
     */
    public static function config()
    {
        if (self::$url_array !== null && self::$is_set === false)
        {
            return true;
        }
        elseif (self::$is_set === true)
        {
            $url = self::$page_url;
            if ($url === false)
            {
                return null;
            }
            if (isset(self::$url_array["sub_domain"]) &&isset(self::$url_array["root"]) &&isset(self::$url_array["tld"]))
            {
                self::$url_array["domain"] = self::$url_array["root"].".".self::$url_array["tld"];
                error_log("");
                if (isset(self::$url_array["port"]))
                {
                    self::$url_array["host"]   = self::$url_array["sub_domain"].".".self::$url_array["domain"].":".self::$url_array["port"];
                }
                else
                {
                    self::$url_array["host"]   = self::$url_array["sub_domain"].".".self::$url_array["domain"];
                }
            }
            elseif (isset(self::$url_array["root"])&&isset(self::$url_array["tld"]))
            {
                self::$url_array["domain"] = self::$url_array["root"].".".self::$url_array["tld"];
                if (isset(self::$url_array["port"]))
                {
                    self::$url_array["host"]   = self::$url_array["domain"].":".self::$url_array["port"];
                }
                else
                {
                    self::$url_array["host"]   = self::$url_array["sub_domain"].".".self::$url_array["domain"];
                }
            }
            else
            {
                // eny change in host !
            }
            self::$url_array["base"]   = self::$url_array["protocol"]."://".self::$url_array["host"]."/".self::$url_array["lang"];
            list($content,$module,$child,$property,$query) = null;
            if (isset(self::$url_array["content"]))
            {
                $content = self::$url_array["content"]."/";
            }
            if (isset(self::$url_array["module"]))
            {
                $module = self::$url_array["module"]."/";
            }
            if (isset(self::$url_array["child"]))
            {
                $child = self::$url_array["child"]."/";
            }
            if (isset(self::$url_array["property"]))
            {
                $property = self::$url_array["property"];
            }
            if (isset(self::$url_array["query"]))
            {
                $query = "?".self::$url_array["query"];
            }

            self::$url_array["dir"] = $content.$module.$child.$property.$query;
            if (empty(self::$url_array["dir"]))
            {
                self::$url_array["path"] = self::$url_array["lang"];
                self::$url_array["full"] = self::$url_array["base"];
            }
            else
            {
                self::$url_array["path"] = self::$url_array["lang"]."/".self::$url_array["dir"];
                self::$url_array["full"] = self::$url_array["base"]."/".self::$url_array["dir"];
            }
            return self::$url_array;
        }
        self::$url_array["protocol"]   = null;
        self::$url_array["sub_domain"] = null;
        self::$url_array["root"]       = null;
        self::$url_array["tld"]        = null;
        self::$url_array["port"]       = null;
        self::$url_array["domain"]     = null;
        self::$url_array["host"]       = null;
        self::$url_array["lang"]       = null;
        self::$url_array["base"]       = null;
        self::$url_array["content"]    = null;
        self::$url_array["module"]     = null;
        self::$url_array["child"]      = null;
        self::$url_array["property"]   = null;
        self::$url_array["query"]      = null;
        self::$url_array["dir"]        = null;
        self::$url_array["path"]       = null;
        self::$url_array["full"]       = null;
        if (self::$page_url === false)
        {
            return null;
        }
        elseif (self::$page_url=== null)
        {
            self::make_url();
        }
        $url = self::$page_url;
        $url_content = explode("/",$url);
        if (!is_array($url_content))
        {
            error_log("bad url");
            return false;
        }
        if (array_key_exists(0,$url_content) === false && array_key_exists(2,$url_content) === false)
        {
            error_log("bad url");
            return false;
        }
        if (strpos($url_content[2],".") === false)
        {
            // host has_not tld
            self::$url_array["sub_domain"] = null;
            self::$url_array["root"]       = null;
            self::$url_array["tld"]        = null;
            self::$url_array["host"]       = $url_content[2];
            // port
            if (strpos($url_content[2],":") !== false)
            {
                $host_content =explode(":",$url_content[2]);
                if (isset($host_content[1]))
                {
                self::$url_array["port"] = $host_content[1];
                }
                else
                {
                    self::$url_array["port"] = null;
                }
            }
            else
            {
                self::$url_array["port"] = null;
            }
        }
        else
        {
           $host_content = explode(".",$url_content[2]);
           if (array_key_exists(3,$host_content) !== false )
           {
                // host is port !
               self::$url_array["sub_domain"] = null;
               self::$url_array["root"]      = null;
               self::$url_array["tld"]       = null;
               self::$url_array["host"]      = $url_content[2];
               self::$url_array["domain"]    = null;
               if (strpos($url_content[2],":") !== false)
               {
                   $host_content =explode(":",$url_content[2]);
                   if (isset($host_content[1]))
                   {
                       self::$url_array["port"] = $host_content[1];
                   }
                   else
                   {
                       self::$url_array["port"] = null;
                   }
               }
               else
               {
                   self::$url_array["port"] = null;
               }
           }
           elseif (array_key_exists(2,$host_content) !== false)
           {
               self::$url_array["sub_domain"] = $host_content[0];
               self::$url_array["root"]      = $host_content[1];
               if (strpos($host_content[2],":") !== false)
               {
                   list($tld,$port) = explode(":",$host_content[2]);
                   if (isset($tld) && isset($port))
                   {
                       self::$url_array["tld"]       = $tld;
                       self::$url_array["port"]      = $port;
                       self::$url_array["domain"]    = self::$url_array["root"].".".self::$url_array["tld"];
                       self::$url_array["host"] = self::$url_array["sub_domain"]."."
                           .self::$url_array["root"].".".self::$url_array["tld"].":".self::$url_array["port"];
                   }
               }
               else
               {
                   self::$url_array["tld"]       = $host_content[2];
                   self::$url_array["port"]      = null;
                   self::$url_array["domain"]    = self::$url_array["root"].".".self::$url_array["tld"];
                   self::$url_array["host"] = self::$url_array["sub_domain"].".".self::$url_array["root"].".".self::$url_array["tld"];
               }
           }
           elseif (array_key_exists(1,$host_content) !== false)
           {
               self::$url_array["sub_domain"] = null;
               self::$url_array["root"]      = $host_content[0];
               if (strpos($host_content[1],":") !== false)
               {
                   list($tld,$port) = explode(":",$host_content[1]);
                   if (isset($tld) && isset($port))
                   {
                       self::$url_array["tld"]       = $tld;
                       self::$url_array["port"]      = $port;
                       self::$url_array["domain"]    = self::$url_array["root"].".".self::$url_array["tld"];
                       self::$url_array["host"] = self::$url_array["root"].".".self::$url_array["tld"].":".self::$url_array["port"];
                   }
               }
               else
               {
                   self::$url_array["tld"]       = $host_content[1];
                   self::$url_array["port"]      = null;
                   self::$url_array["host"]      = self::$url_array["root"].".".self::$url_array["tld"];
                   self::$url_array["domain"]    = self::$url_array["root"].".".self::$url_array["tld"];
               }
           }
           else
           {
               self::$url_array["sub_domain"] = null;
               self::$url_array["root"]      = null;
               self::$url_array["tld"]       = null;
               self::$url_array["port"]      = null;
               self::$url_array["host"]      = null;
           }
        }
        if (isset($url_content[3]))
        {
            if (self::check_language($url_content[3]) === true)
            {
                self::$url_array["lang"] = $url_content[3];
                self::$url_array["content"] = $url_content[4];
            }
            else
            {
                self::$url_array["lang"] = null;
                self::$url_array["content"] = $url_content[3];
            }
        }
        else
        {
            return self::$url_array;
        }
        self::$url_array["property"]  = null;
        $module_slash = null;
        $child_slash = null;
        $property_slash = null;
        $query_slash = null;
        foreach ($url_content as $key => $value)
        {
            if ($key == 0 || $key == 1 ||$key == 2 ||$key == 3)
            {

                continue;
            }
            if ($value == self::$url_array["content"])
            {

                continue;
            }
            if (strpos ($value,"=") !== false)
            {
                if (strpos ($value,"?") !== false)
                {
                    // $value = query
                    $query_slash = "?";                    $query_content = explode("?" , $value);
                    if (isset($query_content[0]) && isset($query_content[1]))
                    {
//                        self::$url_array["property"]
                        if (self::$url_array["property"] === null)
                        {
                            self::$url_array["property"] = $query_content[0];
                        }
                        else
                        {
                            self::$url_array["property"] = self::$url_array["property"]
                                ."/".$query_content[0];
                        }
                        self::$url_array["query"]    = $query_content[1];
                    }
                }
                else
                {
                    // $value = property
                    $property_slash = "/";
                    if (self::$url_array["property"] === null)
                    {
                        self::$url_array["property"] = $value;
                    }
                    else
                    {
                        self::$url_array["property"] = self::$url_array["property"]
                            ."/".$value;
                    }
                }
            }
            else
            {
                // $value = module or child
                $module_slash = "/";
                if (isset(self::$url_array["module"]))
                {
                    self::$url_array["child"] = $value;
                    $child_slash = "/";
                }
                else
                {
                    self::$url_array["module"] = $value;
                }
            }
        }

        self::$url_array["protocol"]  = substr($url_content[0], 0, -1);
        if (empty(self::$url_array["lang"]))
        {
            self::$url_array["base"]        = self::$url_array["protocol"]."://".self::$url_array["host"];
        }
        else
        {
            self::$url_array["base"]        = self::$url_array["protocol"]."://".self::$url_array["host"]."/".self::$url_array["lang"];
        }

        self::$url_array["dir"]         = self::$url_array["content"].$module_slash
            .self::$url_array["module"].$child_slash.self::$url_array["child"].$property_slash
            .self::$url_array["property"].$query_slash.self::$url_array["query"];

        if (empty(self::$url_array["dir"]))
        {
            if (empty(self::$url_array["lang"]))
            {
                self::$url_array["path"]        = null;

            }
            else
            {
                self::$url_array["path"]        = self::$url_array["lang"];
            }
            self::$url_array["full"]        = self::$url_array["base"];
        }
        else
        {
            if (empty(self::$url_array["lang"]))
            {
                self::$url_array["path"]        = self::$url_array["dir"];
            }
            else
            {
                self::$url_array["path"]        = self::$url_array["lang"]."/".self::$url_array["dir"];
            }
            self::$url_array["full"]        = self::$url_array["base"]."/".self::$url_array["dir"];
        }
        return self::$url_array;

    }

    /**
     * @return url
     */
    public static function get_array()
    {
        if (self::$url_array !== null)
        {
            return self::config();
        }
        else
        {
            return self::config();
        }
    }


    /**
     * @return mixed|null full url
     */
    public static function full()
    {
        self::config();
        if (self::$url_array["full"] !==null)
        {
            return self::$url_array["full"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's path
     */
    public static function path()
    {
        self::config();
        if (self::$url_array["path"] !==null)
        {
            return self::$url_array["path"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's base
     */
    public static function base()
    {
        self::config();
        if (self::$url_array["base"] !==null)
        {
            return self::$url_array["base"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @param integer $_argument directory number
     *
     * @return mixed directory number's value
     */
    public static function dir($_argument = null)
    {
        self::config();
        $url = self::$url_array["dir"];
        $pars = explode("/", $url );
        if ($_argument !== null)
        {
            if (isset($pars[$_argument]) && !empty($pars[$_argument]))
            {
                return $pars[$_argument];
            }
            else
            {
                return null;
            }
        }
        else
        {
            if (isset(self::$url_array["dir"]) && !empty(self::$url_array["dir"]))
            {
                return self::$url_array["dir"];
            }
            else
            {
                return null;
            }
        }
    }


    /**
     * @return mixed url's protocol( http || https )
     */
    public static function protocol()
    {
        self::config();
        if (self::$url_array["protocol"] !==null)
        {
            return self::$url_array["protocol"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's host
     */
    public static function host()
    {
        self::config();
        if (self::$url_array["host"] !==null)
        {
            return self::$url_array["host"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's sub domain
     */
    public static function sub_domain()
    {
        self::config();
        if (self::$url_array["sub_domain"] !== null)
        {
            return self::$url_array["sub_domain"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's domain
     */
    public static function domain()
    {
        self::config();
        if (self::$url_array["domain"] !==null)
        {
            return self::$url_array["domain"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's root
     */
    public static function root()
    {
        self::config();
        if (self::$url_array["root"] !==null)
        {
            return self::$url_array["root"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's tld( .com | .biz | .org | .... )
     */
    public static function tld()
    {
        self::config();
        if (self::$url_array["tld"] !==null)
        {
            return self::$url_array["tld"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's port
     */
    public static function port()
    {
        self::config();
        if (self::$url_array["port"] !==null)
        {
            return self::$url_array["port"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's language
     */
    public static function lang()
    {
        self::config();
        if (self::$url_array["lang"] !==null)
        {
            return self::$url_array["lang"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's content directory
     */
    public static function content()
    {
        self::config();
        if (self::$url_array["content"] !==null)
        {
            return self::$url_array["content"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's content directory
     */
    public static function module()
    {
        self::config();
        if (self::$url_array["module"] !==null)
        {
            return self::$url_array["module"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @return mixed url's child of module
     */
    public static function child()
    {
        self::config();
        if (self::$url_array["child"] !==null)
        {
            return self::$url_array["child"];
        }
        else
        {
            return null;
        }
    }


    /**
     * @param string/null $_argument property key to return value
     *
     * @return mixed|null $request/$url/null
     */
    public static function property($_argument = null)
    {
        self::config();
        $url =  self::$url_array["property"];
        if ($_argument !== null)
        {
            $pars = explode("/" ,  $url);
            if (!is_array($pars ) && !isset($pars))
            {
                return null;
            }
            foreach ($pars as $key=>$value)
            {
                if (strpos($value,"=") === false)
                {
                    return null;
                }
                list($property_key,$property_val) = explode("=" ,$value);
                if ($_argument == $property_key)
                {
                    $return = $property_val;
                }
            }
            if (isset($return))
            {
                return $return;
            }
            else
            {
                return null;
            }
        }
        else
        {
            if (isset($url) && $url !== null)
            {
                return $url;
            }
            else
            {
                return null;
            }
        }
    }


    /**
     * @param string/null $_argument query key to return value
     *
     * @return mixed|null $request = keys value /$url = full query /null
     */
    public static function query($_argument = null)
    {
        self::config();
        if (isset(self::$url_array["query"]) && self::$url_array["query"] !== null)
        {
            $url = substr(self::$url_array["query"], 1);
        }
        else
        {
            return null;
        }

        if ($_argument !== null)
        {
            $pars = explode("&" ,  $url);
            if (!is_array($pars ) && !isset($pars))
            {
                return null;
            }
            foreach ($pars as $key=>$value)
            {
                if (strpos($value,"=") === false)
                {
                    return null;
                }
                list($query_key,$query_val) = explode("=" ,$value);
                if ($_argument == $query_key)
                {
                    $return = $query_val;
                }
            }
            if(isset($return))
            {
                return $return;
            }
            else
            {
                return null;
            }


        }
        else
        {

            if (isset($url) && $url !== null)
            {
                return $url;
            }
            else
            {
                return null;
            }
        }
    }


    /**
     * @param $_name string what want to change in self::url_array's key
     * @param $_arguments array $_arguments[1] == set
     *
     * @return bool process may true or false
     */
    public static function __callStatic($_name, $_arguments)
    {
        if (empty($_arguments) || empty($_name))
        {
            return false;
        }
        self::$is_set = true;
        $name = substr($_name, 4);
        if (isset($_arguments[1]))
        {
            $key = $_arguments[0];
            $value    = $_arguments[1];
            switch ($name)
            {
                case "dir":
                    $dirs = explode("/",self::$url_array["dir"]);
                    if ( array_key_exists($key,$dirs) === true )
                    {
                        $dirs[$key] = $value;
                        $dir = implode("/", $dirs);
                        self::$url_array["dir"] = $dir;
                        return true;
                    }
                    else
                    {
                        return false;
                    }
                    break;
                case "property":
                    $propertys = explode("/",self::$url_array["property"]);
                    $true = 0;
                    $propert_key = 0 ;
                    if (!is_array($propertys))
                    {
                        return false;
                    }
                    foreach ($propertys as $property_key => $property_value)
                    {
                        $propert_key = $property_key + 1 ;
                        $propertys2 = explode("=",$property_value);
                        if ( in_array($key,$propertys2) === true )
                        {
//                            array_key_exists($key,$propertys2) ===
                            $propertys2[1] = $value;
                            $propertys[$property_key] = implode("=", $propertys2);
                            $true = 1;
                        }
                    }
                    if ($true == 1)
                    {
                        $property2 = implode("/",$propertys );
                        self::$url_array["property"] = $property2;
                        return true;
                    }
                    else
                    {
                        if ($propert_key != 0 )
                        {
                            $propertys["$propert_key"] = $key."=".$value;
                            $property2 = implode("/",$propertys );
                            self::$url_array["property"] = $property2;
                            return true;
                        }

                    }
                    return false;
                    break;
                case "query":
                    $querys = explode("&",self::$url_array["query"]);
                    $true = 0;
                    $quer_key = 0 ;
                    if (!is_array($querys))
                    {
                        return false;
                    }
                    foreach ($querys as $query_key => $query_value)
                    {
                        $quer_key = $query_key + 1 ;
                        $querys2 = explode("=",$query_value);
                        if ( in_array($key,$querys2) === true )
                        {
//                            array_key_exists($key,$querys2) ===
                            $querys2[1] = $value;
                            $querys[$query_key] = implode("=", $querys2);
                            $true = 1;
                        }
                    }
                    if ($true == 1)
                    {
                        $query2 = implode("&",$querys );
                        self::$url_array["query"] = $query2;
                        return true;
                    }
                    else
                    {
                        if ($quer_key != 0 )
                        {
                            $querys["$quer_key"] = $key."=".$value;
                            $query2 = implode("&",$querys );
                            self::$url_array["query"] = $query2;
                            return true;
                        }

                    }
                    return false;
                    break;
            }
            return false;
        }
        if (!isset(self::$url_array[$name]) && self::$url_array[$name] !== null)
        {
            return false;
        }
        self::$url_array[$name] = $_arguments["0"];
        return true;
    }

}