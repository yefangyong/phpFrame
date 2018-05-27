### 打造属于自己的PHP框架
#### 框架的运行流程
> 入口文件 > 定义常量 > 引入公共函数库 > 自动加载类 > 启动框架 > 路由解析 > 加载控制器 > 返回结果 

#### 框架的文件结构
> app------------项目文件夹</br>
      ---controller--------------控制器文件夹</br>
      ---model     --------------模型文件夹</br>
      ---views     --------------模板文件夹</br>
  core--------------------------核心文件夹</br>
      ---common    -------------公共文件夹</br>
      ------function.php----------公共函数类库</br>
      ---conf---------------------------配置文件夹</br>
      ---lib----------------------------扩展目录文件夹</br>
            ------drive-----------------驱动文件夹</br>
                       ---------log-----日志驱动文件夹</br>
            ------conf.php--配置类核心文件</br>
            ------log.php---日志类核心文件</br>
            ------model.php--模型类核心文件</br>
            ------route.php--路由类核心文件</br>
      ---imooc.php-----------启动框架核心文件</br>
      ---log----------------------------日志文件夹</br>
      ---vendor-------------------------第三方核心文件类库</br>
      ---composer.json------------------composer配置文件</br>
      ---index.php----------------------入口文件