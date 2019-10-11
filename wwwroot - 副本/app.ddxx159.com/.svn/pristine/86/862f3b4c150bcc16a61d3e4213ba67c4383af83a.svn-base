<?php

// +------------------------------------------------------------------
// | 信用卡代还管理系统
// +------------------------------------------------------------------
// | 版权所有 2015~2025 山东帝云信息科技有限公司
// +------------------------------------------------------------------
// | 官方网站: http://www.diyunkeji.com 
// +------------------------------------------------------------------
// | 开发人员 ：PHP-Navy
// +------------------------------------------------------------------
// |     这不是一个自由软件！未经本公司授权您只能在不用于商业目的
// | 的前提下对程序代码进行修改和使用；不允许对程序代码以任何形式
// | 任何目的的再发布。
// +------------------------------------------------------------------

use service\DataService; 
use service\NodeService;
use think\Db;

/**
 * 打印输出数据到文件
 * @param mixed $data 输出的数据
 * @param bool $force 强制替换
 * @param string|null $file
 */
function p($data, $force = false, $file = null)
{
    is_null($file) && $file = env('runtime_path') . date('Ymd') . '.txt';
    $str = (is_string($data) ? $data : (is_array($data) || is_object($data)) ? print_r($data, true) : var_export($data, true)) . PHP_EOL;
    $force ? file_put_contents($file, $str) : file_put_contents($file, $str, FILE_APPEND);
}

function array_num($area){
    if($area =='M013'){
        $area=array("M001","M002","M003","M004","M005","M006","M007","M008","M009","M010","M011","M012");
        $num=array_rand($area,1);
        $area=$area[$num];
    }else{
        $area=$area;
    }
    return $area;
  
}

/**
 * RBAC节点权限验证
 * @param string $node
 * @return bool
 */
function auth($node)
{
    return NodeService::checkAuthNode($node);
}

/**
 * 设备或配置系统参数
 * @param string $name 参数名称
 * @param bool $value 默认是null为获取值，否则为更新
 * @return string|bool
 * @throws \think\Exception
 * @throws \think\exception\PDOException
 */
function sysconf($name, $value = null,$db_config='')
{
    static $config = [];
    if ($value !== null) {
        list($config, $data) = [[], ['name' => $name, 'value' => $value]];
        return DataService::save('SystemConfig', $data, 'name');
    }
    if(!$db_config){
        $db_config=session('db_config');
    }
    if (empty($config)) {
        $config = Db::name('SystemConfig')->column('name,value');
    }
    return isset($config[$name]) ? $config[$name] : '';
}

/**
 * 日期格式标准输出
 * @param string $datetime 输入日期
 * @param string $format 输出格式
 * @return false|string
 */
function format_datetime($datetime, $format = 'Y年m月d日 H:i:s')
{
    return date($format, strtotime($datetime));
}

/**
 * UTF8字符串加密
 * @param string $string
 * @return string
 */
function encode($string)
{
    list($chars, $length) = ['', strlen($string = iconv('utf-8', 'gbk', $string))];
    for ($i = 0; $i < $length; $i++) {
        $chars .= str_pad(base_convert(ord($string[$i]), 10, 36), 2, 0, 0);
    }
    return $chars;
}

/**
 * UTF8字符串解密
 * @param string $string
 * @return string
 */
function decode($string)
{
    $chars = '';
    foreach (str_split($string, 2) as $char) {
        $chars .= chr(intval(base_convert($char, 36, 10)));
    }
    return iconv('gbk', 'utf-8', $chars);
}

/**
 * 下载远程文件到本地
 * @param string $url 远程图片地址
 * @return string
 */
function local_image($url)
{
    return \service\FileService::download($url)['url'];
}



//定义一个函数getIP() 客户端IP，
function getIP(){            
      if (getenv("HTTP_CLIENT_IP")){
            $ip = getenv("HTTP_CLIENT_IP");
    }
    else if(getenv("HTTP_X_FORWARDED_FOR")){
            $ip = getenv("HTTP_X_FORWARDED_FOR");
      }
      else if(getenv("REMOTE_ADDR")){
            $ip = getenv("REMOTE_ADDR");
    }
    else{ 
            $ip = "Unknow";
    }
    return $ip;
}
// 服务器端IP
function serverIP(){   
    return gethostbyname($_SERVER["SERVER_NAME"]);   
}



// http请求
function http($url, $params, $method = 'GET', $header = array(), $timeout = 40){
    $opts = array(
        CURLOPT_TIMEOUT        => $timeout,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER     => $header
        );
    /* 根据请求类型设置特定参数 */
    switch(strtoupper($method)){
        case 'GET':
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            throw new Exception('不支持的请求方式！');
    }
    // dump($opts[CURLOPT_URL]);
    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data  = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if($error) throw new Exception('请求发生错误：' . $error);
    return  $data;
}

/**
 * curl post 模拟发送数据
 *
 */
function postData($data, $url){
    
    if(is_array($data)) $data=http_build_query($data);
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
    $result = curl_exec($curl);
    curl_close($curl);
    if($result === false){
        return curl_error($curl);
    }else{
        return $result;
    }
}

// 转字符串
function to_string($data){
  if (is_array($data)) {
    foreach ($data as &$val) {
      if (is_array($val)) {
        $val = to_string($val);
      }else{
        $val = (string)$val;
      }
    }
  }else{
    $data = (string)$data;
  }
  return $data;
}


//返回json
function echoJson($msg="",$type="9999",$array=""){
    $msg = to_string($msg);
    $json['status'] = $type;
    $json['message'] = $msg;
    if ($array) {
        $json['info'] = to_string($array);
    }
    echo json_encode($json,JSON_UNESCAPED_UNICODE);
    exit;
}

//字段文字内容隐藏处理方法
function hide_content($cardnum,$type=1,$default=""){
    if(empty($cardnum)) return $default;
    if($type==1) $cardnum = substr($cardnum,0,3).str_repeat("*",12).substr($cardnum,strlen($cardnum)-4);//身份证
    elseif($type==2) $cardnum = substr($cardnum,0,3).str_repeat("*",5).substr($cardnum,strlen($cardnum)-4);//手机号
    elseif($type==3) $cardnum = str_repeat("*",strlen($cardnum)-4).substr($cardnum,strlen($cardnum)-4);//银行卡
    elseif($type==4) $cardnum = substr($cardnum,0,3).str_repeat("*",strlen($cardnum)-3);//用户名
    elseif($type==5) $cardnum = substr($cardnum,0,3).str_repeat("*",3).substr($cardnum,strlen($cardnum)-3);//新用户名
    return $cardnum;
}

//获取随机字符串
function rand_string($len=6,$type='',$addChars='') {
    $str ='';
    switch($type) {
        case 1:
            $chars= str_repeat('0123456789',3);
            break;
        case 2:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
            break;
        case 3:
            $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 4:
            $chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
            break;
        default :
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
            break;
    }
    if($len>10 ) {//位数过长重复字符串一定次数
        $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
    }
    if($type!=4) {
        $chars   =   str_shuffle($chars);
        $str     =   substr($chars,0,$len);
    }else{
        // dump($chars);
        // 中文随机字
        for($i=0;$i<$len;$i++){
            $str.= MSubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
        }
    }
    return $str;
}

/**
 * 截取字符串
 */
function MSubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = false){
    $newStr = '';
    if (function_exists ( "mb_substr" )) {
        if ($suffix){
            $newStr = mb_substr ( $str, $start, $length, $charset )."...";
        }else{
            $newStr = mb_substr ( $str, $start, $length, $charset );
        }
    } elseif (function_exists ( 'iconv_substr' )) {
        if ($suffix){
            $newStr = iconv_substr ( $str, $start, $length, $charset )."...";
        }else{
            $newStr = iconv_substr ( $str, $start, $length, $charset );
        }
    }
    if($newStr==''){
    $re ['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re ['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re ['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re ['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all ( $re [$charset], $str, $match );
    $slice = join ( "", array_slice ( $match [0], $start, $length ) );
    if ($suffix)
        $newStr = $slice;
    }
    return $newStr;
}
/**
 * 二维码
 * @param $id
 */
function GenerateCode($url,$id,$type='friend'){
    require_once 'vendor/phpqrcode/phpqrcode.php';
    //vendor('phpqrcode.phpqrcode');
    $level=3;
    $size=6;
    $path = "./static/rcode/";
    $fileName = $path.$type.'-'.$id.'.png';
    $errorCorrectionLevel = intval($level) ;//容错级别
    $matrixPointSize = intval($size);//生成图片大小
    //生成二维码图片
    $object = new \QRcode();
    $object->png($url, $fileName, $errorCorrectionLevel, $matrixPointSize,2);
    return SITE_URL."/static/rcode/".$type.'-'.$id.'.png';
}

/**
 * 循环删除目录和文件函数
 * @param string $dirName 路径
 * @param boolean $fileFlag 是否删除目录
 * @return void
 */
function del_dir_file($dirName, $bFlag = false){
    if ($handle = opendir("$dirName")) {
        while (false !== ($item = readdir($handle))) {
            if ($item != "." && $item != "..") {
                if (is_dir("$dirName/$item")) {
                    del_dir_file("$dirName/$item", $bFlag);
                } else {
                    unlink("$dirName/$item");
                }
            }
        }
        closedir($handle);
        if ($bFlag) {
            rmdir($dirName);
        }
        return true;
    }else{
        return false;
    }
}



/****************************
/*  手机短信接口
/* 参数：$mob          手机号码
/*        $content       短信内容 
/*        $content       短信类型 
*****************************/
function sendsms($mob,$content){

    // 短信日志
    $data = array();
    $data['phone'] = $mob;
    $data['content'] = $content;
    $data['smsIP'] = getIP();
    $data['createTime'] = date('Y-m-d H:i:s');
    Db::name("sms_log")->insert($data);

    
    $re = [];
    if(!$content){
        $re['code'] = false;
        $re['msg'] = "接收手机号或短信内容不能为空！";
        return $re;
    }
    header("Content-type:text/html;charset=utf-8");
    $content=urlencode('【'.sysconf('smsSign').'】'.$content);        
    $sendurl="http://smssh1.253.com/msg/send?";
    $sdata="un=".sysconf('smsUser')."&pw=".sysconf('smsPass')."&msg=".$content."&phone=".$mob."&rd=1";       
    $output=file_get_contents($sendurl.$sdata);
    $result=preg_split("/[,\r\n]/",$output);
    // dump($sendurl.$sdata);
    //返回的状态码
    $statusStr = array(
        '0' =>'发送成功',
        '101'=>'无此用户',
        '102'=>'密码错',
        '103'=>'提交过快',
        '104'=>'系统忙',
        '105'=>'敏感短信',
        '106'=>'消息长度错',
        '107'=>'错误的手机号码',
        '108'=>'手机号码个数错',
        '109'=>'无发送额度',
        '110'=>'不在发送时间内',
        '111'=>'超出该账户当月发送额度限制',
        '112'=>'无此产品',
        '113'=>'extno格式错',
        '115'=>'自动审核驳回',
        '116'=>'签名不合法，未带签名',
        '117'=>'IP地址认证错',
        '118'=>'用户没有相应的发送权限',
        '119'=>'用户已过期',
        '120'=>'内容不是白名单',
        '121'=>'必填参数。是否需要状态报告，取值true或false',
        '122'=>'5分钟内相同账号提交相同消息内容过多',
        '123'=>'发送类型错误(账号发送短信接口权限)',
        '124'=>'白模板匹配错误',
        '125'=>'驳回模板匹配错误',
        '128'=>'内容解码失败'
    );
    if(isset($result[1])){
        if($result[1]==0){
                $re['code'] = true;
        }else{
                $re['code'] = false;
        }
            $re['msg'] = $statusStr[$result[1]];
    }else{
            $re['code'] = false;
            $re['msg'] = "发生未知错误";
    }   
   
    return $re;
}


// 短信余额
function sms_num(){
    $url="https://smssh1.253.com/msg/balance/?un=".sysconf('smsUser')."&pw=".sysconf('smsPass');
    $num="";
    $output=file_get_contents($url);
    // dump($output);
    $result=preg_split("/[,\r\n]/",$output);
    if(isset($result['1'])){
            switch($result['1']){
                case 0:
                        $num=$result['2']."条";
                        break;
                case 101:
                        $num='无此用户';
                        break;
                case 102:
                        $num= '密码错误';
                        break;
                case 103:
                        $num= '查询过快';
                        break;
            }
    }else{
            $num= "查询失败";
    }
    return $num;
}


/**
 * 获取系统根目录
 */
function rootPath(){
    return dirname(dirname(dirname(dirname(__File__))));
}

/**
 * 获取项目地址
 */
function getUrl(){
    $url = $_SERVER['REQUEST_SCHEME']?$_SERVER['REQUEST_SCHEME']:'http';
    $url = $url.'://'.$_SERVER['HTTP_HOST'];
    return $url;
}


/**
 * 用户邀请人 -- 列表
 */
function getMember($id,$allmemberId){
    $member = Db::connect(db_config($allmemberId))->name('member')->where("id",$id)->field("phone,realname")->find();
    if ($member) {
        return $member['realname']?$member['phone']."（".$member['realname']."）":$member['phone'];
    }else{
        return "---";
    }
}


/**
 * 获得用户等级信息
 * "levelName"      等级名称 
 * "memberNum"       升级推广人数-直推并激活
 * "memberPrice"       激活码
 * "firstRepaymentRate"      云闪付 
 * "secondRepaymentRate"       畅捷110002和0102新无卡(6家银行)
 * "thirdRepaymentRate"       畅捷0101新无卡(10家银行)
 * "fourthRepaymentRate"       畅捷110003新无卡(40家地方性银行)
 */
function getMemberLevel($allmemberId){
    $list = Db::connect(db_config($allmemberId))->name("member_level")->where("dataFlag",1)->order('sort DESC,id DESC')->select();
    return $list;
}



/**
 * 获得用户等级名称
 */
function getMemberLevelName($level,$allmemberId){
    return Db::connect(db_config($allmemberId))->name("member_level")->where("dataFlag",1)->where("id",$level)->value('name');
}

/**
 * 获得分类名称
 */
function getCate($id){
    return Db::name("cate")->where("dataFlag",1)->where("id",$id)->value('cateName');
}

/**
 * 获得分类名称列表
 */
function getCates(){
    return Db::name("cate")->where("dataFlag",1)->where("status",1)->field('id,cateName')->select();
}

/**
 * 用户资金变动日志
 * 交易类型："1"=>"收益分配","2"=>"提现申请","3"=>"提现成功","4"=>"提现失败","5"=>"升级使用","6"=>"系统调整"
 */
function memberMoneyLog($memberId,$money,$type,$info){
    $member = Db::name("member")->where("id",$memberId)->field("phone,realname,accountMoney,freezeMoney,bonusMoney")->find();
    $update = [];
    switch ($type) {
        case '1':
            $update = array(
                "accountMoney" => $member['accountMoney']+$money,
                "freezeMoney" => $member['freezeMoney'],
                "bonusMoney" => $member['bonusMoney']+$money,
                );
            break;
        case '2':
            $update = array(
                "accountMoney" => $member['accountMoney']-$money,
                "freezeMoney" => $member['freezeMoney']+$money,
                "bonusMoney" => $member['bonusMoney'],
                );
            break;
        case '3':
            $update = array(
                "accountMoney" => $member['accountMoney'],
                "freezeMoney" => $member['freezeMoney']-$money,
                "bonusMoney" => $member['bonusMoney'],
                );
            break;
        case '4':
            $update = array(
                "accountMoney" => $member['accountMoney']+$money,
                "freezeMoney" => $member['freezeMoney']-$money,
                "bonusMoney" => $member['bonusMoney'],
                );
            break;
        case '5':
            $update = array(
                "accountMoney" => $member['accountMoney']-$money,
                "freezeMoney" => $member['freezeMoney'],
                "bonusMoney" => $member['bonusMoney'],
                );
            break;
        default:
            $update = array(
                "accountMoney" => $member['accountMoney']-$money,
                "freezeMoney" => $member['freezeMoney'],
                "bonusMoney" => $member['bonusMoney'],
                );
            break;
    }
    Db::startTrans();
    try{
        $re = Db::name("member")->where("id",$memberId)->update($update);
        $log = array(
            "uid" => $memberId,
            "phone" => $member['phone'],
            "realname" => $member['realname'],
            "moneyType" => $type,
            "affectMoney" => $money,
            "accountMoney" => $update['accountMoney'],
            "freezeMoney" => $update['freezeMoney'],
            "info" => $info,
            "add_time" => date("Y-m-d H:i:s"),
            "add_ip" => getIP(),
            );
        $res = Db::name('moneylog')->insert($log);
        if ($re && $res) {
            Db::commit();
            return true;
        }
    }catch (\Exception $e) {
        Db::rollback();
    }

    return false;
}
/**
 * 通知数据保存
 *
 * @param mixed $type
 * @param mixed $data
 * @param mixed $url
 * @param mixed $status
 */
function notifyMsg($type, $data, $url, $status,$customerNumber='')
{
    $data = json_encode($data);
    $data_md5 = md5($data);
    $notify = Db::name("notify")->where("data_md5='{$data_md5}'")->field('id, num')->find();
    $arr['last_time'] = time();
    $arr['status'] = $status;
    if($notify['id']){  // 更新 状态、次数、最后时间
        $arr['num'] = $notify['num']+1;
        Db::name('notify')->where("id",$notify['id'])->update($arr);
    }else{
        $arr['data_md5'] = $data_md5;
        $arr['notify_url'] = $url;
        $arr['data'] = $data;
        $arr['addtime'] = time();
        $arr['num'] = 1;
        $arr['type'] = $type;
        $arr['customerNumber']=$customerNumber;
        Db::name('notify')->insert($arr);
    }
}
/**
 * 用户消息
 */
function member_msg($uid,$title,$content){
    $msg = array(
        'uid' => $uid,
        'title' => $title,
        'content' => $content,
        'add_time' => time(),
        'add_ip' => getIP(),
        'is_read'=>0
    );
    
    $re = Db::name("member_message")->insert($msg);
    if ($re) {
        return true;
    }else{
        return false;
    }
}
// 交易明细
// $order_type 交易类型：'1'=>'代还消费','2'=>'代还还款','3'=>'提现处理'
function order_enter($uid,$money,$fee_money,$out_bank_num,$to_bank_num,$type,$deal_info){
    $bill = array(
        "memberId" => $uid,
        "money" => $money,
        "fee_money" => $fee_money,
        "out_bank_num" => $out_bank_num,
        "in_bank_num" => $to_bank_num,
        "type" => $type,
        "info" => $deal_info,
        "add_time" => date('Y-m-d H:i:s'),
        "add_ip" => getIP(),
    );
    Db::name("bill")->insert($bill);
}

/**
 * 生成支付单编号(两位随机 + 从2000-01-01 00:00:00 到现在的秒数+微秒+会员ID%1000)，该值会传给第三方支付接口
 * 长度 =2位 + 10位 + 3位 + 3位  = 18位
 * 1000个会员同一微秒提订单，重复机率为1/100
 * @return string
 */
function makePaySn($member_id) {
    return mt_rand(10,99)
    . sprintf('%010d',time() - 946656000)
    . sprintf('%03d', (float) microtime() * 1000)
    . sprintf('%03d', (int) $member_id % 1000);
}

//用户编号
function memberID(){
    $code = rand_string(6);
    $has = DB::name("member")->where("sysCode='{$code}'")->find();
    if ($has) {
        memberID();
    }else{
        return $code;
    }
}

/*
 * 新颜 身份证鉴权
 *
 * $post 提交参数
 * $type 类型
 */
function authVerify($realname,$idCard){
    $arrayData=array(
        "member_id"=>config('xinyan.memberId'),
        "terminal_id"=>config('xinyan.terminalId'),
        "trans_id"=>date('YmdHis').rand(100,999),
        "trade_date"=>date('YmdHis'),
        "id_card"=>$idCard,
        "id_holder"=>$realname,
        "is_photo" => "noPhoto",
        "industry_type" => "A1"
    );
    $data_content = str_replace("\\/", "/", json_encode($arrayData));//转JSON
    $pfxpath = config('xinyan.merchant_private_key');
    $pfx_pwd = config('xinyan.pfxPwd');
    
    $encryptUtil = new EncryptUtil($pfxpath, "", $pfx_pwd, TRUE); //实例化加密类。
    $data_content = $encryptUtil->encryptedByPrivateKey($data_content);
    $data_type = config('xinyan.dataType');
    $PostArry = array(
        "member_id" => config('xinyan.memberId'),
        "terminal_id" => config('xinyan.terminalId'),
        "data_type" => config('xinyan.dataType'),
        "data_content" => $data_content);
    $PostArryJson = str_replace("\\/", "/", json_encode($PostArry));//转JSON
    $request_url = config('xinyan.idCardAuthUrl');
    $result = json_decode(postData($PostArry, $request_url),true);  //发送请求到服务器，并输出返回结果。
    //dump($result);
    return $result;
}
/*
 *银行卡验证
 *
 *array(4) {
      ["success"] => bool(false)
      ["data"] => NULL
      ["errorCode"] => string(5) "S1000"
      ["errorMsg"] => string(21) "手机号格式错误"
    }
 *
 * array(4) {
      ["success"] => bool(true)
      ["data"] => array(9) {
        ["code"] => string(1) "0"
        ["desc"] => string(18) "亲，认证成功"
        ["trans_id"] => string(17) "20190315140022135"
        ["trade_no"] => string(24) "201903151400231158658357"
        ["org_code"] => NULL
        ["org_desc"] => NULL
        ["fee"] => string(1) "Y"
        ["bank_id"] => string(3) "BOC"
        ["bank_description"] => string(12) "中国银行"
      }
      ["errorCode"] => NULL
      ["errorMsg"] => NULL
    }
 */ 
function authVerifyElement($realname,$idCard,$bankNum,$phone){
    $arrayData=array(
        "member_id"=>config('xinyan.memberId'),
        "terminal_id"=>config('xinyan.terminalId'),
        "id_card"=>$idCard,
        "id_holder"=>$realname,
        "acc_no"=>$bankNum,
        "mobile"=>$phone,
        "verify_element"=>"1234",
        "trans_id"=>date('YmdHis').rand(100,999),
        "trade_date"=>date('YmdHis'),
        "industry_type"=>"A1",//根据自己的行业类型传入
        "product_type"=>0
    );
    $data_content = str_replace("\\/", "/", json_encode($arrayData));//转JSON
    $pfxpath = config('xinyan.merchant_private_key');
    $pfx_pwd = config('xinyan.pfxPwd');
    $encryptUtil = new \EncryptUtil($pfxpath, "", $pfx_pwd, TRUE); //实例化加密类。
    $data_content = $encryptUtil->encryptedByPrivateKey($data_content);
    $data_type = config('xinyan.dataType');

    $PostArry = array(
        "member_id" => config('xinyan.memberId'),
        "terminal_id" => config('xinyan.terminalId'),
        "data_type" => config('xinyan.dataType'),
        "data_content" => $data_content);
    $PostArryJson = str_replace("\\/", "/", json_encode($PostArry));//转JSON
    $request_url = config('xinyan.bankCardAuthUrl');
    $result = json_decode(postData($PostArry, $request_url),true);  //发送请求到服务器，并输出返回结果。
    return $result;
}


/*
 * 代付
 *
 */
function doCash($orderno,$realname,$idcard,$bank_num,$bank_name,$bank_code,$province,$city,$subbranch,$money,$remake=""){


    $Kbpay = new Kbpay();
        
    /**************基本参数****************/
    $service = 'create_batch_pay2bank';//服务名称
    $version = "1.0";//接口版本
    $request_time = date("YmdHis");//请求时间
    $partner_id = "200006503094";//合作者身份ID
    $_input_charset = "utf-8";//参数编码字符集
    $sign_type = "RSA";//签名类型
    $notify_url = SITE_URL.URL("cash_notify");//异步通知地址
    $encrypt_version = "1.0";//加密版本
    $sign_version = "1.0";//签名版本
    $memo = $orderno;//备注
    /****************业务参数***********************/
    $batch_no=md5($orderno.$realname.$idcard.$bank_num);//批次号
    //交易明细列表 需要对敏感字段加密
    $detailList = $orderno."^".$realname."^".$idcard."^".$bank_num."^".$bank_name."^".$bank_code."^".$province."^".$city."^".$subbranch."^".$money."^C^DEBIT^".$remake;
    // dump($detailList);
    $detail_list = $Kbpay->create_detail_list($detailList,$_input_charset);
    
    /****************组织基本参数***********************/
    $param=array();
    $param['service']=$service;
    $param['version']=$version;
    $param['request_time']=$request_time;
    $param['partner_id']=$partner_id;
    $param['_input_charset']=$_input_charset;
    $param['sign_type']=$sign_type;
    if($notify_url != null){
        $param['notify_url']=$notify_url;
    }
    if($encrypt_version != null){
        $param['encrypt_version']=$encrypt_version;
    }
    if($sign_version != null){
        $param['sign_version']=$sign_version;
    }
    if($memo != null){
        $param['memo']=$memo;
    }
    /****************组织业务参数***********************/
    $param['batch_no']=$batch_no;
    $param['detail_list']=$detail_list;
    
    ksort($param);//对签名参数据排序
    // dump($param);
    //进行签名
    $sign=$Kbpay->getSignMsg($param,$sign_type,$_input_charset);
    //将签名结果存入请求数组中
    $param['sign']=$sign;
    $Kbpay->write_log("批量付款到银行卡请求参数".json_encode($param));
    $data = $Kbpay->createcurl_data($param); 
    // 调用createcurl_data创建模拟表单需要的数据
    $result = $Kbpay->curlPost("http://test.gate.yacolpay.com/mas/gateway.do",$data,$_input_charset); 
    // echo "请求已经发送";
    // 使用模拟表单提交进行数据提交
    $splitdata = json_decode($result,true);
    $sign_type = $splitdata ['sign_type'];//签名方式
    ksort($splitdata); // 对签名参数据排序
    if ($Kbpay->checkSignMsg ($splitdata,$sign_type,$_input_charset)) {
        $Kbpay->write_log("返回结果签名验证成功");
    } else {
        $Kbpay->write_log("返回结果签名验证错误");
    }
    return json_decode($result,true);

}




// 根据登录token获取用户id
function getUserId(){
    $token = input("token/s","");
    if ($token) {
        $userInfo = Db::name("member")->where("token",$token)->field("id,status,loginTime,dataFlag")->find();
        if ($userInfo) {
            if ($userInfo['dataFlag'] != "1") {
                echoJson("账户信息无效！","0000");
            }elseif ($userInfo['status'] != "1") {
                echoJson("账户已被停用，联系客服！","0000");
            }elseif ((time()-strtotime($userInfo['loginTime']))>(86400*90)) {
                echoJson("距离您上次登录已超过90天，请重新登录！","0000");
            }else{
                return $userInfo['id'];
            }
        }else{
            echoJson("登录已过期或尚未登录！","0000");
        }
    }else{
        return "";
    }
}


// 获得用户的经理信息
function getManager($memberId,$recommendId=0){
    $member = Db::name("member")->where("id",$memberId)->find();
    if (!$recommendId) {
        $recommendId = $member['recommendId'];
    }
    if ($recommendId>0) {
        $recommend = Db::name("member")->where("id",$recommendId)->find();
        $member_level = Db::name("member_level")->where('id',$member['level'])->find();
        $recommend_level = Db::name("member_level")->where('id',$recommend['level'])->find();
        // dump($member_level['name'].'-'.$recommend_level['name']);
        // dump($member_level['sort'].'-'.$recommend_level['sort']);
        // dump($member_level['id'].'-'.$recommend_level['id']);
        // dump($member['recommendId'].'-'.$recommend['recommendId']);
        if ($member_level['sort']<$recommend_level['sort']) {
            return ['phone'=>$recommend['phone'],'realname'=>$recommend['realname']];
        } elseif ($member_level['sort'] == $recommend_level['sort']) {
            if ($member_level['id'] < $recommend_level['id']) {
                return ['phone'=>$recommend['phone'],'realname'=>$recommend['realname']];
            }else{
                if ($recommend['recommendId']>0) {
                    return getManager($memberId,$recommend['recommendId']);
                }else{
                    return [];
                }
            }
        }else{
            if ($recommend['recommendId']>0) {
                return getManager($memberId,$recommend['recommendId']);
            }else{
                return [];
            }
        }
    }else{
        return [];
    }
}



/*
 * 一键还款生成
 * $bank            银行信息
 * $money           还款金额
 * $minMoney        预留金额
 * $rate            消费费率，万分比
 * $cash            还款手续费 元/笔
 * $repaymentDate   信用卡还款日
 * $repaymentType   还款模式，1-一消一还，2-两消一还，3-三消一还
 * $repaymentNum    还款次数：一消一还最大为6，两消一还最大为3，三消一还最大为2
 * $channel         渠道类型：changjie-畅捷大额，tonglian-通联小额,kubao-酷宝大额，kubaoMin-酷宝小额
 * $mccid           通联渠道必传：消费行业ID
 * $areacode        通联渠道必传：消费地区ID，精确到市级单位
 * 
 */

function autoMakePlan($bank,$money,$minMoney,$repaymentDate,$rate,$cash,$channel,$areacode,$mccid,$num=0){
    if(strlen($repaymentDate)<2)$repaymentDate="0".$repaymentDate;
    $startDate = date("Y-m-d");
    $endDate = strtotime(date("Y-m")."-".$repaymentDate);
    if ($endDate<strtotime(date("Y-m-d"))) {
        $endDate = strtotime(date("Y-m",strtotime("+1 month"))."-".$repaymentDate);
    }
    // dump(date("Y-m-d",$endDate));
    if ($num>0) {
        $num++;
    }else{
        $num = ceil($money/$minMoney/2);
    }
    // dump($num);
    // dump($endDate);
    $dates = [];
    for ($i=1; $i <= $num; $i++) { 
        if (strtotime("+".$i." days")>($endDate+86399)) {
            echoJson("距离还款日时间较短，请增加预留金额！","2002");
        }
        $dates[] = date("Y-m-d",strtotime("+".$i." days"));
    }
    // dump($dates);
    $dates = implode(",", $dates);
    $plan = makePlan($bank,$money,$rate,$cash,$dates,2,2,$channel,$areacode,$mccid,true);
    if ($plan['minMoney']>$minMoney) {
        return autoMakePlan($bank,$money,$minMoney,$repaymentDate,$rate,$cash,$channel,$areacode,$mccid,$num);
    }else{
        return $plan;
    }
}




/*
 * 代还制定计划
 * $bank            银行信息
 * $money           还款金额
 * $rate            消费费率，万分比
 * $cash            还款手续费 元/笔
 * $dates           还款时间，多个日期用英文逗号隔开：2019-01-10,2019-01-13,2019-01-18
 * $repaymentType   还款模式，1-一消一还，2-两消一还，3-三消一还
 * $repaymentNum    还款次数：一消一还最大为6，两消一还最大为3，三消一还最大为2
 * $channel         渠道类型：changjie-畅捷大额，tonglian-通联小额,kubao-酷宝大额，kubaoMin-酷宝小额
 * $mccid           通联渠道必传：消费行业ID
 * $areacode        通联渠道必传：消费地区ID，精确到市级单位
 * 
 */

function makePlan($bank,$money,$rate,$cash,$dates,$repaymentType,$repaymentNum,$channel,$areacode,$mccid,$auto=false){
    //还款天数
    $day_list_old = explode(",",$dates);
    foreach ($day_list_old as $k=>$val) {
        if (!$val) {
            unset($day_list_old[$k]);
        }
    }
    // dump($day_list);
    $days = count($day_list_old);
    // dump($days);
    if ($days<1) {
        echoJson("还款时间选择错误！","3000");
    }
    
    asort($day_list_old);

    $day_list = [];
    $startDate = "";
    $endDate = "";
    foreach ($day_list_old as $v) {
        if ( $startDate == "" ) {
            $startDate = $v;
        }
        $endDate = $v;
        if (strtotime($v)<time()) {
            echoJson("还款时间必须为今日之后！","3001");
        }
        if (in_array($v, $day_list)) {
            echoJson("时间选择重复，请联系客服！","3001");
        }
        $day_list[] = $v;
    }

    switch ($repaymentType) {
        case '1':
            if ($repaymentNum>6) {
                echoJson("还款次数有误！",'3002');
            }
            break;
        case '2':
            if ($repaymentNum>3) {
                echoJson("还款次数有误！",'3003');
            }
            break;
        case '3':
            if ($repaymentNum>2) {
                echoJson("还款次数有误！",'3004');
            }
            break;
        
        default:
            echoJson("还款模式有误！",'3005');
            break;
    }
    // dump($days);
    // dump($bank);
    // 日均消费金额
    $dayMoney = ($money+$repaymentNum*$cash*$days)/(1-$rate/10000)/$days;
    // dump($dayMoney);

    if ($channel == 'changjie') {   //畅捷大额
        if ($dayMoney>$bank['cj_daymoney']) {
            echoJson("日均消费金额最大为{$bank['cj_daymoney']}元，请修改还款参数！",'3006');
        }
        // 还款时间范围
        $tradetime = explode("-", $bank['cj_tradetime']);
        $singlemoney = explode("-", $bank['cj_singlemoney']);
    } elseif ($channel == 'kubao') {//酷宝大额
        if ($dayMoney>$bank['kb_daymoney']) {
            echoJson("日均消费金额最大为{$bank['kb_daymoney']}元，请修改还款参数！",'3006');
        }
        // 还款时间范围
        $tradetime = explode("-", $bank['kb_tradetime']);
        $singlemoney = explode("-", $bank['kb_singlemoney']);
    }  elseif ($channel == 'kubaoMin') {//酷宝小额
        if ($dayMoney>$bank['kb_min_daymoney']) {
            echoJson("日均消费金额最大为{$bank['kb_min_daymoney']}元，请修改还款参数！",'3006');
        }
        // 还款时间范围
        $tradetime = explode("-", $bank['kb_tradetime']);
        $singlemoney = explode("-", $bank['kb_singlemoney']);
    } elseif ($channel == 'tonglian') {//通联小额
        if ($dayMoney>$bank['tl_daymoney']) {
            echoJson("日均消费金额最大为{$bank['tl_daymoney']}元，请修改还款参数！",'3007');
        }
        // 还款时间范围
        $tradetime = explode("-", $bank['tl_tradetime']);
        $singlemoney = explode("-", $bank['tl_singlemoney']);
    } else {
        echoJson("还款渠道有误！",'3005');
    }
    // dump($tradetime);
    // dump($singlemoney);
    if (!isset($tradetime[0]) || !isset($tradetime[1])) {
        echoJson("渠道还款时间格式有误，请联系客服纠正！",'3008');
    }
    if (!isset($singlemoney[0]) || !isset($singlemoney[1])) {
        echoJson("渠道还款金额格式有误，请联系客服纠正！",'3009');
    }
    // 还款时间范围，秒
    $seconds = strtotime(date("Y-m-d").' '.$tradetime[1])-strtotime(date("Y-m-d").' '.$tradetime[0]);
    // dump($seconds);
    if ($seconds<7200) {
        echoJson("渠道还款时间范围有误，请联系客服纠正！",'3010');
    }
    
    // 每天消费次数
    $dayPayNum = $repaymentType*$repaymentNum;
    // dump($dayPayNum);

    // 平均单次还款金额
    $repaymentMoney = $money/$days/$repaymentNum;
    // dump($repaymentMoney);
    
    // 平均单次消费还款金额
    $oneMoney = $money/$days/$dayPayNum;
    // dump($repaymentMoney);

    // 平均单次消费金额
    $paymentMoney = ($dayMoney/$dayPayNum)/(1-$rate/10000);
    // dump($paymentMoney);
    if ($auto) {
        if ($paymentMoney<$singlemoney[0]) {
            echoJson("当前预留金额过低，请调整！",'3011');
        } elseif ($paymentMoney>$singlemoney[1]) {
            echoJson("当前预留金额过低，请调整！",'3012');
        }
    }else{
        if ($paymentMoney<$singlemoney[0]) {
            echoJson("单次最小消费金额为{$singlemoney[0]}元，请修改还款参数！",'3011');
        } elseif ($paymentMoney>$singlemoney[1]) {
            echoJson("单次最大消费金额为{$singlemoney[1]}元，请修改还款参数！",'3012');
        }
    }

    // 每天执行计划总次数
    $dayRunNum = $repaymentType*$repaymentNum+$repaymentNum;
    // dump($dayRunNum);
    // 每次计划执行平均间隔时间
    $avgSeconds = intval($seconds/$dayRunNum);
    // dump($avgSeconds);
    $plan = [];
    $k = 0;

    // 第一次消费开始时间
    $startTime = 0;
    // dump($startTime);
    // 生成计划时间
    for ($i=0; $i < $days; $i++) { 
        $surplusTime = 0;
        $todayStart = strtotime($day_list[$i]." ".$tradetime[0]);
        for ($j=1; $j <= $dayRunNum; $j++) { 
            // dump(date("Y-m-d H:i:s",$todayStart));
            $time = rand(($todayStart+600),($todayStart+$avgSeconds+$surplusTime));
            if ($j%($repaymentType+1)) {
                $plan[$k] = array(
                    'sort' => $k+1,
                    'type' => "1",
                    "run_time" => $time,
                    );
            }else{
                $plan[$k] = array(
                    'sort' => $k+1,
                    'type' => "2",
                    "run_time" => $time,
                    );
            }
            $surplusTime = ($todayStart+$avgSeconds+$surplusTime)-$time;
            $todayStart = $time;
            // dump(date("Y-m-d H:i:s",$time));
            $k++;
        }
    }

    $min_money = ceil($repaymentMoney-($repaymentMoney*0.05));
    $repaymentMoney = ceil($repaymentMoney);

    $min_re_money = ceil($oneMoney-($oneMoney*0.05));
    if ($min_re_money<$singlemoney[0]) {
        $min_re_money=$singlemoney[0];
    }
    $oneMoney = ceil($oneMoney);
    $surplusMoney = 0;
    $hasMoney = 0;
    $repayMoney = 0;
    $n = 1;
    $r = 100;
    $first_money = 0;
    $fee_money = 0;
    for ($i=0; $i < count($plan); $i++) { 
        if ($plan[$i]['type'] == '1') {
            $randMoney = rand($min_re_money,($oneMoney+$surplusMoney));
            if ($i == (count($plan)-2)) {
                $randMoney = $money-$hasMoney;
            }
            
            $payMoney = $randMoney;

            if ($i==0) {
                $first_money = $payMoney;
            }
            if ($payMoney>$singlemoney[1] || $payMoney<$singlemoney[0]) {
                $i = -1;
                $min_re_money = $oneMoney-$r;
                if ($r<0) {
                    echoJson("单次消费金额为{$singlemoney[0]}~{$singlemoney[1]}元，请修改还款参数！","3013");
                }
                $surplusMoney = 0;
                $hasMoney = 0;
                $repayMoney = 0;
                $first_money = 0;
                $fee_money = 0;
                $n = 1;
                $r -- ;
            }else{
                $surplusMoney = ($oneMoney+$surplusMoney)-$randMoney;
                $hasMoney += $randMoney;
                $plan[$i]['money'] = $payMoney;
                $plan[$i]['fee_money'] = ceil($payMoney*$rate/100)/100;
                $repayMoney += $randMoney;
                $n++;
            }
        }else{
            $plan[$i]['money'] = $repayMoney;
            $plan[$i]['fee_money'] = $cash;
            $repayMoney = 0;
            $n = 1;
        }
        if ($i>0) {
            $fee_money += $plan[$i]['fee_money'];
        }
        $firstPayMoney = ceil(($first_money+$fee_money)/(1-$rate/10000)*100)/100;
        if ($firstPayMoney>$singlemoney[1] || $firstPayMoney<$singlemoney[0]) {
            $i = -1;
            $min_re_money = $oneMoney-$r;
            if ($r<0) {
                echoJson("单次消费金额为{$singlemoney[0]}~{$singlemoney[1]}元，请修改还款参数！","3013");
            }
            $surplusMoney = 0;
            $hasMoney = 0;
            $repayMoney = 0;
            $first_money = 0;
            $fee_money = 0;
            $n = 1;
            $r -- ;
        }else{
            $plan[0]['money'] = $firstPayMoney;
            $plan[0]['fee_money'] = ceil($firstPayMoney*$rate/100)/100;
        }
    }
    $info = array(
        "repaymentMoney" => $money,
        "repaymentFee" => 0,
        "paymentFee" => 0,
        "feeMoney" => 0,
        "minMoney" => 0,
        );

    foreach ($plan as &$val) {
        // dump(date("Y-m-d H:i:s",$val['run_time']));
        $info['feeMoney'] += $val['fee_money'];
        if ($val['type'] == '1') {
            $info['paymentFee'] += $val['fee_money'];
        }else{
            $info['repaymentFee'] += $val['fee_money'];
            if ($info['minMoney']<$val['money']) {
                $info['minMoney'] = $val['money'];
            }
        }
        
        if ($channel == "tonglian") {
            $val['areacode'] = $areacode;
            if ($mccid == 'M000') {
                $mccidNum = mt_rand(1,12);
                if ($mccidNum<10) {
                    $mccidNum = "M00".$mccidNum;
                }else{
                    $mccidNum = "M0".$mccidNum;
                }
            }else{
                $mccidNum = $mccid;
            }
            $val['mccid'] = $mccidNum;
        } elseif($channel == "changjie") {
            $val['areacode'] = $areacode;
        }
    }

    $info['minMoney'] += $info['feeMoney'];
    $info['plan'] = $plan;
    $info['startDate'] = $startDate;
    $info['endDate'] = $endDate;
    return $info;
}

// 新人奖励
function profitNew($memberId){
    $member = Db::name("member")->where("id",$memberId)->find();
    $count = Db::name("bill")->where("memberId",$memberId)->where("type",2)->count();
    if ($count == "1") {
        $memberLevel = Db::name("member_level")->where("id",$member['level'])->find();
        if ($memberLevel['new_money']>0) {
            memberMoneyLog($memberId,$memberLevel['new_money'],1,"您首次使用本软件还款，奖励您新人奖{$memberLevel['new_money']}元！");
            Db::name("member")->where("id",$memberId)->setInc("newcomerMoney",$memberLevel['new_money']);
        }
        if ($member['recommendId']>0) {
            $recommend = Db::name("member")->where("id",$member['recommendId'])->find();
            $recommendLevel = Db::name("member_level")->where("id",$member['level'])->find();
            if ($recommendLevel['new2_money']>0) {
                Db::name("member")->where("id",$member['recommendId'])->setInc("newcomerMoney",$recommendLevel['new2_money']);
                memberMoneyLog($recommend['id'],$recommendLevel['new2_money'],1,"您邀请的用户【{$member['phone']}】首次使用本软件还款，奖励您新人奖{$recommendLevel['new2_money']}元！");
            }
        }
    }
}




// 用户分润+业绩汇总
function profit($repaymentMid,$rId,$money,$rate,$cash,$channel,$same=true){
    $recommend = Db::name("member")->where("id",$rId)->find();
    $level = Db::name("member_level")->where("id",$recommend['level'])->find();
    if ($recommend && $repaymentMid!=$rId) {
        $inser = array(
            "uid" => $rId,
            "repayment_uid" => $repaymentMid,
            "repayment_money" => $money,
            "add_time" => date("Y-m-d H:i:s"),
            );
        Db::name("achievement")->insert($inser);
        $memberRate = [];
        switch ($channel) {
            case 'tl':
                $memberRate = array(
                    "rate" => $level['tl_rate'],
                    "cash" => $level['tl_fee'],
                    );
                $repaymentName = sysconf("firstRepaymentName");
                break;

            case 'cj1':
                $memberRate = array(
                    "rate" => $level['cj_1_rate'],
                    "cash" => $level['cj_fee'],
                    );
                $repaymentName = sysconf("secondRepaymentName");
                break;
            case 'cj2':
                $memberRate = array(
                    "rate" => $level['cj_2_rate'],
                    "cash" => $level['cj_fee'],
                    );
                $repaymentName = sysconf("thirdRepaymentName");
                break;
            case 'cj3':
                $memberRate = array(
                    "rate" => $level['cj_3_rate'],
                    "cash" => $level['cj_fee'],
                    );
                $repaymentName = sysconf("fourthRepaymentName");
                break;
            case 'kb1':
                $memberRate = array(
                    "rate" => $level['kb_1_rate'],
                    "cash" => $level['kb_fee'],
                    );
                $repaymentName = sysconf("sixthRepaymentName");
                break;
            case 'kb2':
                $memberRate = array(
                    "rate" => $level['kb_2_rate'],
                    "cash" => $level['kb_fee'],
                    );
                $repaymentName = sysconf("seventhRepaymentName");
                break;
            case 'kb3':
                $memberRate = array(
                    "rate" => $level['kb_3_rate'],
                    "cash" => $level['kb_fee'],
                    );
                $repaymentName = sysconf("eighthRepaymentName");
                break;
            case 'kb4':
                $memberRate = array(
                    "rate" => $level['kb_4_rate'],
                    "cash" => $level['kb_fee'],
                    );
                $repaymentName = sysconf("fifthRepaymentName");
                break;
            
            default:
                # code...
                break;
        }

        if ($memberRate) {
            $profit = 0;
            if ($rate>$memberRate['rate']) {
                $profit += intval($money*($rate-$memberRate['rate'])/100)/100;
                $rate = $memberRate['rate'];
            }else{
                dump("团队奖励");
                if ($same) {
                    $same = false;
                    $group_money = array(
                        "memberId" => $rId,
                        "money" => intval($level['group_rate']*$money)/100,
                        "add_time" => date("Y-m-d H:i:s"),
                        );
                    if ($group_money['money']>0) {
                        Db::name("group_money")->insert($group_money);
                    }
                }
            }

            if ($cash>$memberRate['cash']) {
                $profit += $cash-$memberRate['cash'];
                $cash = $memberRate['cash'];
            }
            if ($profit>0) {
                memberMoneyLog($recommend['id'],$profit,1,"您团队中用户【".Db::name("member")->where("id",$repaymentMid)->value('phone')."】使用【".$repaymentName."】还款，奖励您分润入账！");
            }
        }
    }
    if ($recommend['recommendId']>0) {
        profit($repaymentMid,$recommend['recommendId'],$money,$rate,$cash,$channel,$same);
    }
}


 //畅捷账户
function MN_code(){
    $code = rand_string('3','4');
    $has = Db::name("changjie_min")->where("merchantName='{$code}'")->find();
    if ($has) {
        MN_code();
    }else{
        return $code;
    }
}



// 畅捷支付
function getYfParams($postData,$order_sn,$transtype='SHORTCUTPAYCJ',$allMemberId){
    $allMember=Db::name('allmember')->where(['id'=>$allMemberId])->find();
    $info=Db::name('info')->where(['id'=>$allMember['fid']])->find();
    
    $postData = json_encode($postData);
    //应用code 必填
    $data['app_id'] = $info['app_id'];
    //交易流水号  必填
    $data['client_trans_id'] = $order_sn;
    //签名  必填
    $data['sign'] = md5('data='.base64_encode($postData)."&key=".$info['sign_key']);
    //交易类型  必填
    $data['trans_type'] = $transtype;
    //请求时间 必填
    $data['trans_timestamp'] = time();
    //请求数据 必填
    $data['data'] = $postData;
    //商户编号 必填
    $data['merchant_id'] = $info['merchant_id'];
    return $data;
/*     $postData = json_encode($postData);
    //应用code 必填
    $data['app_id'] = Config('yunpay.app_id');
    //交易流水号  必填
    $data['client_trans_id'] = $order_sn;
    //签名  必填
    $data['sign'] = md5('data='.base64_encode($postData)."&key=".Config('yunpay.sign_key'));
    //交易类型  必填
    $data['trans_type'] = $transtype;
    //请求时间 必填
    $data['trans_timestamp'] = time();
    //请求数据 必填
    $data['data'] = $postData;
    //商户编号 必填
    $data['merchant_id'] = Config('yunpay.merchant_id');
    return $data; */
}


/**
 * 卡呗请求
 * @param string $data 参数
 * @param string $url  请求地址
 */
function postYfData($data, $url){
    // dump($url);
    if(is_array($data)) $data=http_build_query($data);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false); // 对认证证书来源的检查
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查 SSL 加密算法是否存在
    $result = curl_exec($curl);
    curl_close($curl);
    if($result === false){
        return curl_error($curl);
    }else{
        return $result;
    }
}


// 获取团队人数
function getTeamNum($memberId,$num=0){
    $list = Db::name("member")->where("recommendId",$memberId)->where("dataFlag",1)->field("id")->select();
    foreach ($list as $val) {
        $num ++ ;
        $num = getTeamNum($val['id'],$num);
    }
    return $num;
}


// 用户升级分润
function upgradeMoney($memberId,$level,$payMoney,$repaymentMid){
    $member = Db::name("member")->where("id",$memberId)->find();
    if ($member) {
        if ($member['recommendId']>0) {
            $levelInfo = Db::name("member_level")->where("id",$level)->find();
            if ($levelInfo['cost']) {
                $cost = unserialize($levelInfo['cost']);
                $recommend = Db::name("member")->where("id",$member['recommendId'])->find();
                if ($cost['id_'.$recommend['level']]) {
                    $cost_money = $cost['id_'.$recommend['level']];
                    if ($payMoney>$cost_money) {
                        memberMoneyLog($recommend['id'],($payMoney-$cost_money),1,"您团队中用户【".Db::name("member")->where("id",$repaymentMid)->value('phone')."】升级为【".$levelInfo['name']."】，奖励您分润入账！");
                        $payMoney = $cost_money;
                    }
                    upgradeMoney($recommend['id'],$level,$payMoney,$repaymentMid);
                }else{
                    return false;
                }
            }
        }
    }
}

//酷宝入件身份证图片转化
function base64EncodeImage ($image_file) {
    if(!file_exists($image_file)){
        //默认图片
        $image_file='static/idcard.jpeg';
    }
    $image_file=SITE_URL.'/'.$image_file;
    $base64_image = '';
    $ontent=file_get_contents($image_file);
    $base64_image=base64_encode($ontent);
    return $base64_image;
}
/**
 * 平台资金变动日志
 * @access  public
 * @param   int     &$uid      用户ID
 * @param   float   &$money    变更金额
 * @param   int     &$type     交易类型：
 * 1-收益入账，2-提现申请，3-提现成功，4-提现失败,
 * 5-全额扣款，6-全额入账
 * 7-平台充值，8-平台扣款
 * 9-其他消耗（二、四要素）
 * @param   string  &$info     变更说明
 */
function allmember_moneylog($uid,$money,$info,$type='1',$otherId,$otherType,$db_config=''){
    $allmember = Db::name("allmember")->where('id',$uid)->find();
    
    if (!$allmember || !$money) {
        return false;
    }
    if(!$db_config){
        $db_config=session('db_config');
    }
    if ($type == "1") {
        $data['freezeMoney']=$allmember['freezeMoney'];
        $data['accountMoney'] = $allmember['accountMoney'] + $money;
        $data['bonusMoney'] = $allmember['bonusMoney'] + $money;
    }elseif($type == "2"){
        $data['accountMoney'] = $allmember['accountMoney'] - $money;
        $data['freezeMoney'] = $allmember['freezeMoney'] + $money;
    }elseif($type == "3"){
        $data['accountMoney'] = $allmember['accountMoney'];
        $data['freezeMoney'] = $allmember['freezeMoney'] - $money;
    }elseif($type == "4"){
        $data['accountMoney'] = $allmember['accountMoney'] + $money;
        $data['freezeMoney'] = $allmember['freezeMoney'] - $money;
    }elseif($type == "5"){
        $data['accountMoney'] = $allmember['accountMoney'] - $money;
        $data['freezeMoney'] = $allmember['freezeMoney'];
    }elseif($type == "6"){
        $data['accountMoney'] = $allmember['accountMoney'] + $money;
        $data['freezeMoney'] = $allmember['freezeMoney'];
    }elseif($type == "7"){
        $data['accountMoney'] = $allmember['accountMoney'] + $money;
        $data['freezeMoney'] = $allmember['freezeMoney'];
    }elseif($type == "8"){
        $data['accountMoney'] = $allmember['accountMoney'] - $money;
        $data['freezeMoney'] = $allmember['freezeMoney'];
    }elseif($type == "9"){
        $data['accountMoney'] = $allmember['accountMoney'] - $money;
        $data['freezeMoney'] = $allmember['freezeMoney'];
    }
    if($otherType == 'agent'){
        $user=Db::connect($db_config)->name('agent')->field(['phone','realname'])->where(['id'=>$otherId])->find();
    }elseif($otherType == 'member'){
        $user=Db::connect($db_config)->name('member')->field(['phone','realname'])->where(['id'=>$otherId])->find();
    }else{
        $user = Db::name("allmember")->where(['id'=>$uid])->field(['phone','realname'])->find();
    }
    
    $log = array(
        'uid' => $otherId,
        'type'=>$otherType,
        'phone'=>$user['phone'],
        'realname'=>$user['realname'],
        'moneyType' => $type,
        'affectMoney' => $money,
        'accountMoney' => $data['accountMoney'],
        'freezeMoney'=>$data['freezeMoney'],
        'info' => $info,
        'add_time' => date('Y-m-d H:i:s'),
        'add_ip' => getIP(),
    );
    $logid = Db::connect($db_config)->name("allmember_moneylog")->insertGetId($log);
    if ($logid) {
        $re = Db::name("allmember")->where('id',$uid)->update($data);
        if($re){
            return true;
        }else{
            Db::connect($db_config)->name("allmember_moneylog")->where('id',$logid)->delete();
            return false;
        }
    }else{
        return false;
    }
}
/***
 * 检查本地四要素
 */
function checkBank($realname,$idcard,$bankNum,$phone,$bankName,$db_config='')
{
    $data=[
        'realName'=>$realname,
        'idCard'=>$idcard,
        'bank_card'=>$bankNum,
        'bank_name'=>$bankName,
        'phone'=>$phone,
    ];
    if(!$db_config){
        $db_config=session('db_config');
    }
    $result=Db::connect($db_config)->name("member_cx")->where($data)->find();
    if($result){
        return true;
    }else{
        return false;
    }
    
}
/**
 * 获得品牌信息
 *
 */
function getAllMember(){
    $where=['dataFlag'=>1];
    if(session('user.isAllShow') == '0'){
        $where['fid']=session('user.id');
    }
    $info=Db::name('allmember')->where($where)->field('id,mysqlName,companyName')->order('id asc')->select();
    return $info;
}
/**
 * 品牌数据连接
 * */
function db_config($allmemberId){
    $where=[
        'status'=>1,
        'dataFlag'=>1
    ];
    if($allmemberId){
        $where['id']=$allmemberId;
    }
    $allmember=Db::name('allmember')->where($where)->field(['id','mysqlName','key'])->order('id asc')->find();
    if($allmember){
        $db_config= Config('database.type').'://'.Config('database.username').':'.Config('database.password').'@'.Config('database.hostname').':'.Config('database.hostport').'/'.$allmember['mysqlName'].'#utf8';
    }else{
        $db_config= Config('database.type').'://'.Config('database.username').':'.Config('database.password').'@'.Config('database.hostname').':'.Config('database.hostport').'/'.Config('database.database').'#utf8';
        
    }
    return $db_config;
}

function userKey($id) {
    //strtoupper转换成全大写的
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $uuid = $id.substr($charid, 0, 8).substr($charid, 8, 4).substr($charid,12, 4).substr($charid,16, 4).substr($charid,20,12);
    return $uuid;
}

function repaymentChannelType($name=''){
    $array=[
        'hx'=>'环讯小额',
        'cjm'=>'畅捷小额',
        'cj'=>'畅捷大额'
    ];
    if($name){
        return isset($array[$name])?$array[$name]:'';
    }
    return $array;
}
?>



