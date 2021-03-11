# Laravel 8 授予使用者漫威（Marvel）角色的超能力

引入 inani 的 maravel-permissions 套件來擴增授予使用者漫威角色的超能力。超級英雄之所以能成為英雄，除過良好的自身素養、品格之外，超能力是最不可缺少的。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/user/show` 來進行授予使用者漫威角色的超能力。

----

## 畫面截圖
![](https://i.imgur.com/7FjCh3w.png)
> 超級英雄往往都有超人的力氣、或是變種特殊能力、甚至會魔法，也因為這些現實生活中不可能實現的特質，都讓粉絲沉醉其中