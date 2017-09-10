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
class url extends \lib\url
{


}
