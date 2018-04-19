# [Translate - A easy way to support multi-language](doc/translate.md)

Translate以与Laravel相似的方式，支持PHP网站的国际化。

从指定的目录读取多语言配置文件，根据指定的msgid获取对应语言的翻译文本。

msgid支持多级目录，多层数组形式。

## Basic Usage

```php
<?php
use Phplib\Translate;

Translate::initSingleton("/xxx/lang", "zh_cn", "en");

echo __("live/link.guest.ready");

```

## 多语言配置文件

### 目录结构

配置文件的结构如下，其中/xxx/lang/为任务路径，en和zh_cn为支持的语言(locale)

locale下的目录和文件即为实际的配置文件，可按项目或者业务做目录分层 

	/xxx/lang/
	|-- en
	|   |-- live
	|   |     |
	|   |     `--link.php
	|   `-- common.php
	`-- zh_cn
	    |-- live
	    |      |
	    |      `--link.php
	    `-- common.php
	    
### 配置文件内容

每一个配置文件(php文件)格式为返回一个数组，这个数组即为对应的多语言配置

如link.php的内容如下

```php
<?php
return [
    'accept' => '接受',
    'guest' => [
        'ready' => '嘉宾准备好了',
    ],
];
```

### 加载配置规则

msgid有两部分组成，以分号分隔，前面部分为配置文件路径(path)，而剩下的部分称之为(key)

如之前的live/link.guest.ready，其中path为live/link，而key为guest.ready

Translate会加载```/xxx/lang/``` ```locale/``` ```path```.php下的文件

再再找到的文件返回值数组中，找到key对应的配置，key是以```.```做为多级数组的分割

所以live/link.guest.ready找到的配置为```嘉宾准备好了```

## 单例模式使用

### 初使化实例

如之前例子，在程序入口处初使化实例

```php
Translate::initSingleton("/xxx/lang", "zh_cn", "en");
```

也可以使用getInstance方法做为初使化调用，所不同的是getInstace方法返回Translate实例，可以做后续的调用

```php
Translate::getInstance("/xxx/lang", "zh_cn", "en")->setThrowException(false);
```

注意，初使化只会发生一次，多次调用的参数以第一次调用为准

### 调用函数翻译文本

有三种方法可调用翻译文本

```php
<?php
echo __("live/link.guest.ready");
echo trans("live/link.guest.ready");
echo \Phplib\Translate::getInstance()->get("live/link.guest.ready");
```
以上三种调用方式完全等价，前两个函数只是第三种调用形式的helper函数

### fallback机制

初使化或者构造函数的第三个参数为fallback locale，即在使用指定locale无法找到对应翻译时，会使用fallback locale翻译


## 多实例模式

即使用构造函数形式，可以返回多个不同的实例，构造函数的参数与getInstace和initSingleton参数一致

多实例模式下调用翻译不能使用helper两个函数，只能使用实例调用get方法



