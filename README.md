# laravel-onlineshop
# send email
http://blog.damirmiladinov.com/laravel/laravel-5.2-email-verification-with-activation-code.html#.V2yOlPmLTcs
# login fb
http://blog.damirmiladinov.com/laravel/laravel-5.2-socialite-facebook-login.html#.V2yPlfmLTcs
# role
https://github.com/Zizaco/entrust
# file manager
https://github.com/UniSharp/laravel-filemanager
https://github.com/UniSharp/laravel-ckeditor
https://www.youtube.com/watch?v=vBzg0Us5MDk
http://laravelcoding.com/blog/laravel-5-beauty-upload-manager
# laravel admin
https://github.com/pingpong-labs/admin
https://github.com/zgldh/laravel-upload-manager
# demo blog - post
http://www.findalltogether.com/tutorial/simple-blog-application-in-laravel-5-part-3-controllers/
https://laravel.com/docs/5.2/quickstart-intermediate

#noti 
https://github.com/edvinaskrucas/notification
#cart
https://github.com/Crinsane/LaravelShoppingcart
https://github.com/Crinsane/LaravelShoppingcart
# user email verification
https://github.com/edvinaskrucas/laravel-user-email-verification

# admin panel
http://www.tutorials.kode-blog.com/laravel-5-admin-panel
# bower
http://laravelcoding.com/blog/laravel-5-beauty-using-bower?tag=L5+Beauty
http://www.tutorials.kode-blog.com/laravel-5-admin-panel

## PHP Web Scraping Class

1. A PHP web scraper class that utilizes the cURL library to scrape web page content. Scrape web pages using GET or POST methods. Also scrape web page content from asp.net based websites using form POST methods.
2. Support for:
    1. Get Mathod
    2. POST Method
    3. ASP Calls
    4. Retrieve Page Contents by Markup Tag Names
    5. Retrieve Values from Form Fields

### Getting a full webpage content:
<pre>
&lt;?php
include_once( './scraper.php' );
$scraper = new Scraper();
$pageUrl = 'http://maps.google.com';
$pageHtmlContent = $scraper->curl($pageUrl);
?&gt;
</pre>

### Getting a full webpage content with Using Proxy IP:
<pre>
&lt;?php
include_once( './scraper.php' );
$scraper = new Scraper();
$pageUrl = 'http://maps.google.com';
$pageHtmlContent = $scraper->curl($pageUrl, "93.118.xx.141:8800", "6USERR:8PASS1");
?&gt;
</pre>

### Parsing a page html content:
<pre>
&lt;?php
$subHtmlContent =  $scraper->getValueByTagName($pageHtmlContent, '&lt;div class="itemlist"&gt;', '&lt;/div&gt;');
?&gt;
</pre>

### How It Works:
1. Include The Class scraper.php in your Working page header.
2. Set some default settings.
3. Get the page content by it's existing methods.
4. Split your content by getValueByTagName methods if single content you are searching for.
5. If grid data needed, split the content with a needle Ex: explode()
6. Then loop it whole and get the content by getValueByTagName again to make the filnal array of grid data.
7. Thats' all


public function rules()
{
    $user = User::find($this->users);

    switch($this->method())
    {
        case 'GET':
        case 'DELETE':
        {
            return [];
        }
        case 'POST':
        {
            return [
                'user.name.first' => 'required',
                'user.name.last'  => 'required',
                'user.email'      => 'required|email|unique:users,email',
                'user.password'   => 'required|confirmed',
            ];
        }
        case 'PUT':
        case 'PATCH':
        {
            return [
                'user.name.first' => 'required',
                'user.name.last'  => 'required',
                'user.email'      => 'required|email|unique:users,email,'.$user->id,
                'user.password'   => 'required|confirmed',
            ];
        }
        default:break;
    }
}


# Nhap va tinh tien lai
SP A con 1 sp, yeu cau nhap hang.
Nhap hang thi co ngay nhap va gia ban cho tung san pham.
Khi tinh tien lai trong khoang thoi gian abc thi tinh ntn?

# Get noi dung tu web site khac
- Hien nay beatvn dang la trang web co rat nhieu ng xem
- 15p, request mot lan toi /hot nhat cua website do de gan vao du lieu web minh

# Example permisson
https://docs.mulesoft.com/mule-management-console/v/3.2/setting-up-users
https://www.drupal.org/node/120614
http://blog.orbitone.com/post/Minimum-Dynamics-CRM-Permissions
http://shivtr.com/blog/107-permissions-update-live