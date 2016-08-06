# Hướng dẫn cài đặt
- Cài đặt xampp
- Cài đặt Composer (https://getcomposer.org/download/)
- Cài đặt github để clone source về (https://desktop.github.com/)
- Sau khi kéo source về thì cd vào thư mục chứa source trong htdocs của xampp/htdocts/ten_du_an
- Type: composer install
- Đợi install xong
- Config datatabase: 
- Gõ: php artisan migrate
- Gõ: php artisan db:seed
- Mở browser gõ: localhost/laravel-onlineshop/public ko thấy lỗi là thành công
- Nhấn vào login: đăng nhập: taihanh0310/1234qwer để đăng nhập với quyền hạn cao nhất.
 
# Tài liệu
- Khái hiệm đa hình: (http://freetuts.net/tinh-da-hinh-trong-lap-trinh-huong-doi-tuong-php-34.html)
- Khái niệm abstract: (http://freetuts.net/lop-truu-tuong-abstract-trong-php-oop-37.html)
- Mô hình MVC (http://freetuts.net/mvc-php-mo-hinh-mvc-la-gi-354.html)
- Đọc Eloquent ORM (https://laravel.com/docs/5.2/eloquent)
- Route (https://laravel.com/docs/5.2/routing)
- Controller (https://laravel.com/docs/5.2/controllers)
- Request (https://laravel.com/docs/5.2/requests)
- View (https://laravel.com/docs/5.2/views)

# Mục đích và phạm vi của dự án
<pre>
Hiện nay công nghệ thông tin ngày càng phát triển và cho thấy việc ứng dụng công nghệ thông tin trong công tác quản lý thông tin của doanh nghiệp đặc biệt là thông tin khách hàng, bán hàng. Nếu trang có đầy đủ thông tin sẽ đưa ra được nhưng chính sách kinh doanh, khuyến mãi hợp lý để thu hút khách hàng: thẻ thành viên, quà tặng, tích lũy điểm (loyalty), …
</pre>
<pre>
Tiết kiệm tối đa sức lao động của con người, không còn cảm thấy số lượng công việc quá lớn đè lên đôi vai.
</pre>
<pre>
Giảm tối thiểu thời gian quản lý, báo cáo rõ ràng nhanh chóng mọi lúc.
</pre>

- Trang quản trị: 
- Quản lý thẻ thành viên khách hàng và các chương trình khuyến mãi: giảm giá, tích lũy điểm,…
- Quản lý các nhiều loại chính sách khuyến mãi trên mặt hàng
- Phân tích doanh số bán hàng theo từng ngày, từng giờ
- Phân tích doanh số, lợi nhận theo thời gian, mặt hàng
- Quản lý các thông tin liên quan đến mặt hàng.
- In mã vạch (barcode) của mặt hàng theo tiêu chuẩn quốc tế, Việt Nam
- Báo cáo dự báo các mặt hàng không đủ tồn kho.
- Quản lý thông tin nhập hàng, trả hàng, bán sĩ, bán lẻ, nhập hàng trả lại, hàng hư, hàng bị mất, tồn kho.
- Phần mềm bán hàng hỗ trợ phân quyền người dùng theo nhóm chức năng. 
- Phần mềm bán hàng đảm bảo chỉ nhưng người có quyền mới thực hiện được các chức năng tương ứng trong hệ thống.
- 

# Hướng dẫn sự dụng git command
- What ?

- Why ?
- How ?

+ Cai dat git tren windows ()
        - https://www.sourcetreeapp.com/download/ (GUI)
        - https://git-scm.com/download/win (Command line)
+ Linux

+ Tao moi mot repository
        - Create new directory, open it and perform a [git init] to create a new git repository.

+ checkout a repository
        - create a working copy of local repository and running the command [git clone https://taihanh0310@bitbucket.org/stoneitteam/henbacsi.git]

+ Workflow
        - Refer: https://www.atlassian.com/git/tutorials/comparing-workflows/

+ add & commit
        - show current branch
                * [git branch]
        - show file changes
                * [git status]
        - add all file
                * [git add * ]
        - add file
                * [git add <file name>]
        - commit: 
                * [git commit -m "commit message"]
                * The file is commited to the HEAD, but NOT in your REMOTE repository.			

+ pushing chanes
        - show current branch
                * [git branch]
        - Send source to remote
                * [git push origin <branch name>]

+ branching
        - The 'master' branch is the 'default' branch when create a repository. Use other branches for development and merge them back to the master branch upon completion.
        - create new branch
                * [git branch <branch name>]
        - create new branch named "task#x" and switch to it using
                * [git checkout -b task#]
        - switch back to master
                * [git checkout master]
        - delete the branch again
                * [git branch -d task#x]

+ update & merge
        - to update your local repository to the newest commit, execute 
                * [git pull <branch name>]
        - in your working directory to fetch and merge remote changes.to merge another branch into your active branch (e.g. master), use
                * [git megre <branch name>]
        - Unfortunately, this is not always possible and results in conflicts. You are responsible to merge those conflicts manually by editing the files shown by git. After changing, you need to mark them as merged with
                * [git add <file name>]
        - before merging changes, preview them by using
                * [git diff <source_branch> <target_branch>]
+ log
        - see only the commits of a certain author:
                * [git log --author=taihanh0310 ]
        - se only which files have changed
                * [git log --name-status]	
			
+ Ví dụ: 
- Kiểm tra brand hiện tại: git brand
- Chuyển sang brand khác: git checkout brandname
- Kiểm tra tình trạng file: git status
- Push file lên host: git status, git add --a, git commit -m "comment", git pull origin "brandname", git push origin "brandname"

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

# payment
https://github.com/anouarabdsslm/laravel-paypalpayment

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

#realtime
http://www.volkomenjuist.nl/blog/2013/10/20/laravel-4-and-nodejsredis-pubsub-realtime-notifications/
http://www.kodeinfo.com/post/realtime-app-using-laravel-nodejs-angularjs-redis
http://stackoverflow.com/questions/18396603/laravel-and-angularjs-form-validation
https://scotch.io/tutorials/angularjs-form-validation-with-ngmessages
https://github.com/blueimp/jQuery-File-Upload/wiki

#example
http://preview.codecanyon.net/item/laravel-user-manager-create-l5-project-with-ease/full_screen_preview/13760351?_ga=1.25104442.1638636412.1470274928 [admin/123456]
https://codecanyon.net/item/eshop-ecommerce-cms/12279150
http://104.236.63.156/administrator/clients
Administrator
Email : admin@mail.com
Password : admin

http://demopavothemes.com/pav_food_store/admin/index.php?route=common/login
[demo/demo]