<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//email 配置，启动可以自动加载,服务器必须有能访问外网的权限
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.163.com';
$config['smtp_user'] = 'xxx@163.com'; //发件人的邮箱
$config['smtp_pass'] = 'xxx'; //发件人邮箱密码
$config['smtp_port'] = '25';
$config['mailtype'] = 'html';
