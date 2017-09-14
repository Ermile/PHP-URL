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
 * subDomain : ermile
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
 * \lib\url::subDomain()       // ermile.
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
 * \lib\url::subDomain()       // null
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
 * \lib\url::subDomain()       // null
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
 * \lib\url::subDomain()       // null
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
 * \lib\url::subDomain()       // null
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
namespace lib ;
class url
{
    private static $url_array = [];
    private static $url ;
    private static $is_config = false ;

    /**
     * @return string self::$url this page url
     */
    public static function make_url()
    {
        return self::$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    /**
     * check string is language or not
     *
     * @param string $_lang language or other string
     *
     * @return bool
     */
    public static function check_lang($_lang)
    {
        $lang_list = ["fa","az","en","us"];
        foreach ($lang_list as $key => $value)
        {
            if ($_lang == $value)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    /**
     * split self::url in url method to self::$url_array
     *
     * @return array|bool set self::$url_array and set is_config = true
     */
    public static function config()
    {
        if (self::$is_config === true)
        {
            return true;
        }
        else
        {

            $url = explode("/" , self::$url);
            $pars_base = explode("." ,$url[2]);

            // Check
            $query = null;
            $property = null;
            $content = null;
            $module = null;
            if(self::check_lang($url[3]) === true)
            {
                $lang = $url[3]."/";
                $content =$url[4]."/";
            }
            else
            {
                $lang = null;
                $content =$url[3]."/";
            }


            foreach ($url as $key=>$value)
            {
                if ($key == 0 ||$key == 1 ||$key == 2||$key == 3 )
                {

                    continue;
                }
                else
                {
                    $check_property = strpos($url[$key],"=");
                    $check_query = strpos($url[$key],"?");
                    if ($check_property === false && $check_query === false)
                    {
                        $content = str_replace("/","",$content);
                        if ($value == $content)
                        {
                            $content = $content."/";
                            continue;
                        }
                        else
                        {
                            $content = $content."/";
                            $module = $module.$value."/" ;

                        }
                    }
                    elseif($check_property !== false && $check_query === false)
                    {

                        $property = $property.$url[$key]."/";
                    }
                    elseif ($check_query !== false)
                    {

                        $split = explode("?",$url[$key]);
                        if (!empty($split[0]))
                        {
                            $property = $property.$split[0];
                        }
                        $query = "?".$split[1];
                    }
                    else
                    {
                        error_log("fuck");
                    }
                }
            }
            // base check
            if (isset($pars_base["3"]))
            {
                error_log("it's IP");
                $sub_domain = null;
                $root = null;
                list($tld,$port) = explode(":",$pars_base["3"]);
                $tld = null ;
            }
            elseif(isset($pars_base["2"]))
            {
                error_log("fucking sub domain");
                $sub_domain = $pars_base["0"];
                $root = $pars_base["1"];
                list($tld,$port) = explode(":",$pars_base["2"]);

            }
            elseif (isset($pars_base["1"]))
            {
                error_log("fucing root and tld");
                $sub_domain = null;
                $root = $pars_base["0"];
                list($tld,$port) = explode(":",$pars_base["1"]);
            }
            else
            {
                error_log("fuck your url");
                $sub_domain = null;
                $root = null;
                list($tld,$port) = null;
            }

            list($module , $child)= explode("/",$module);
            (empty($module) ? $module = null : $module = $module."/" );
            (empty($child) ? $child = null : $child = $child."/" );
            $full = self::$url;
            $path = $lang.$content.$module.$child.$property.$query;
            $base = $url[0]."//".$url[2];
            $dir  = $content.$module.$child.$property.$query ;
            $protocol = str_replace(":","",$url[0]);
            $domain = $root.".".$tld;
            self::$url_array =
                [
                    "full"       => $full,
                    "path"       => $path,
                    "base"       => $base,
                    "dir"        => $dir,
                    "protocol"   => $protocol,
                    "host"       => $url[2],
                    "sub_domain" => $sub_domain,
                    "domain"     => $domain,
                    "root"       => $root,
                    "tld"        => $tld,
                    "port"       => $port,
                    "lang"       => $lang,
                    "content"    => $content,
                    "module"     => $module,
                    "child"      => $child,
                    "property"   => $property,
                    "query"      => $query
                ];
            self::$is_config = true;
            return self::$url_array;
        }
//        return $url;
    }

    /**
     * @return mixed|null full url
     */
    public static function full()
    {
        self::config();
        if (self::$url_array["full"] !==null)
        {
            return $request = self::$url_array["full"];
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
        return $request = self::$url_array["path"];
    }

    /**
     * @return mixed url's base
     */
    public static function base()
    {
        self::config();
        return $request = self::$url_array["base"];
    }

    /**
     * @param integer $_argument directory number
     *
     * @return mixed directory number's value
     */
    public static function dir($_argument = null)
    {
        self::config();
        $url = self::$url_array["dir"] ;
        $pars = explode("/", $url );
        if ($_argument !== null)
        {
            return $url = $pars[$_argument];
        }
        else
        {
            return $url = self::$url_array["dir"];
        }
    }

    /**
     * @return mixed url's protocol( http || https )
     */
    public static function protocol()
    {
        self::config();
        return $request = self::$url_array["protocol"];
    }

    /**
     * @return mixed url's host
     */
    public static function host()
    {
        self::config();
        return $request = self::$url_array["host"];
    }

    /**
     * @return mixed url's sub domain
     */
    public static function sub_domain()
    {
        self::config();
        return $request = self::$url_array["sub_domain"];
    }

    /**
     * @return mixed url's domain
     */
    public static function domain()
    {
        self::config();
        return $request = self::$url_array["domain"];
    }

    /**
     * @return mixed url's root
     */
    public static function root()
    {
        self::config();
        return $request = self::$url_array["root"];
    }

    /**
     * @return mixed url's tld( .com | .biz | .org | .... )
     */
    public static function tld()
    {
        self::config();
        return $request = self::$url_array["tld"];
    }

    /**
     * @return mixed url's port
     */
    public static function port()
    {
        self::config();
        return $request = self::$url_array["port"];
    }

    /**
     * @return mixed url's language
     */
    public static function lang()
    {
        self::config();
        return $request = self::$url_array["lang"];
    }

    /**
     * @return mixed url's content directory
     */
    public static function content()
    {
        self::config();
        return $request = self::$url_array["content"];
    }

    /**
     * @return mixed url's content directory
     */
    public static function module()
    {
        self::config();
        return $request = self::$url_array["module"];
    }

    /**
     * @return mixed url's child of module
     */
    public static function child()
    {
        self::config();
        return $request = self::$url_array["child"];
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
            foreach ($pars as $key=>$value)
            {
                list($property_key,$property_val) = explode("=" ,$value);
                error_log($property_key);
                if ($_argument == $property_key)
                {
                    $return = $property_val;
                }
            }
            return $request = (isset($return) ? $return : null );
        }
        else
        {
            return $url;
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
        $url = str_replace("?","",self::$url_array["query"]);
        if ($_argument !== null)
        {
            $pars = explode("&" ,  $url);
            foreach ($pars as $key=>$value)
            {
                list($query_key,$query_val) = explode("=" ,$value);
                error_log($query_key);
                if ($_argument == $query_key)
                {
                    $return = $query_val;
                }
            }
            return $request = (isset($return) ? $return : null );
        }
        else
        {
            return $url;
        }
    }

}