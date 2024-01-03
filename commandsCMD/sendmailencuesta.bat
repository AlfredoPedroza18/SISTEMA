@ECHO OFF
SET DIR_PHP=D:\ServidorWeb\php\php.exe
SET DIR_ARTISAN=D:\ServidorWeb\Apache24\htdocs\erp-demo\
 
%DIR_PHP% %DIR_ARTISAN%artisan schedule:run