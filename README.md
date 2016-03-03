# thinksns-installer
The ThinkSNS-Installer is ThinkSNS 4 version installed library.

# 工具使用的必备条件
```
你需要安装Composer工具和PHP，并设置到环境变量中
```
你也可以下载点击[Composer.phar](https://getcomposer.org/composer.phar)将其放入到当前程序bin目录下。得以具备执行条件。
# 如何获得ThinkSNS-Installer
1. Composer
```shell
composer require medz/thinksns-installer
```
2. Git
```shell
git clone https://github.com/medz/thinksns-installer.git thinksns-installer
cd thinksns-install
composer install
```
3. Phar
```
https://medz.github.io/thinksns-installer/thinksns.phar
```
4. PHP
```shell
php -r "readfile('https://medz.github.io/thinksns-installer/thinksns.phar');" | php > thinksnsn.phar
```
# 如何使用Installer
不管你是用哪条方式~安装后的脚本都存在bin目录
<br>如果你是使用
```shell
composer global require medz/thinksns-installer
```
<br>方式，安装，如果你的全局composer bin目录在你的环境变量中，可直接使用thinksns命令：
```shell
thinksns -V
```
<br>查看版本号
<br>否则，你如果直接使用源脚本，命令格式如下
```shell
php bin\thinksns
```
执行thinksns-install默认不会安装，而是现实帮助信息
<br>如果你是使用的thinksns.phar脚本
```shell
php thinksns.phar
```
# 如何自己创建thinksns.phar
```shell
php bin\thinksns-install-build
```
执行以下命令~就可以创建得到thinksns.phar档案包~
