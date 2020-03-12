<?php
/**
 * Created by PhpStorm.
 * User: Dylan.L
 * Date: 2019/5/29
 * Time: 13:57
 */
$sitenames = array("绿意", "千碧", "翠色", "千山", "碧波", "翠绿", "绿草", "绿茵", "春树", "暮云", "丽藻", "春暖花开", "春露", "秋霜", "春花秋月", "景明", "春沂", "山水", "锦绣", "河山", "高云", "水天一色", "峦嶂", "山明水秀", "高山流水", "万红", "红花", "绿柳", "姹紫", "嫣红", "翠色", "五彩", "缤纷", "五光十色", "百花", "花团", "锦簇", "五彩", "天色", "郁郁", "葱葱", "青山", "水秀", "湖光", "山色", "江画", "春雨", "绵绵", "立峰", "崇山", "嶙峋", "奇峰", "冰雪", "山色", "莺飞", "明秀", "明月", "清风", "花草", "花鸟", "美景", "美胜", "蔚蓝", "富丽", "妙伦", "天工", "锦上花", "深林", "山径", "绿水", "青翠", "苍翠", "山花烂漫", "群山", "水滴", "春寒", "春意", "春暖", "春风化雨", "骄阳", "秋爽", "秋色", "冰天", "和气", "明媚", "鹅毛", "大雪", "景明", "春月", "春蛙", "秋蝉", "诵弦", "春笋", "磅礴", "巍峨", "冰峰", "雪岭", "绵伏", "石林", "山溪", "水涧", "泉水叮咚", "腾飞", "云霄", "云际", "云端", "巍巍", "雄峻", "山峻", " 山奇", "枝叶", "红叶", "春晖", "寸草", "春秋", "春夏", "秋冬", "春华秋实", "春台", "秋月", "桃红李白", "桃红", "蝶舞", "花枝", "斑斓", "巨峰", "奇峰", "青峰", "逶迤", "绵延", "千山", "晴空", "群山", "幽谷", "寒木", "雨后", "春冰", "花语", "丽葩", "阑珊", "水镜", "澎湃", "波澜", "粼粼", "锦簇", "山野", "荒野", "巍然", "花伞", "水珠", "银装", "水榭", "澄明", "风铃", "露珠", "细雨", "玲珑");
$sitename_suffix = array("资讯网", "阅读网", "文章网", "资讯阅读网", "文章阅读网");
$keywords = array("文章", "知识", "阅读", "资讯", "情感文章", "故事", "美文", "热点新闻", "好文章", "好文章阅读", "文章阅读网", "美文阅读", "故事大全");
$descriptions = "为您精选<repl>等优质文章欣赏阅读!";
$categorys = array(
    'society' => '社会',
    'finance' => '财经',
    'ent' => '娱乐',
    'sports' => '体育',
    'mil' => '军事',
    'tech' => '科技',
    'digi' => '数码',
    'fashion' => '时尚',
    'auto' => '汽车',
    'edu' => '教育',
    'games' => '游戏',
    'house' => '房产',
    'astro' => '星座',
    'cul' => '文化',
    'comic' => '动漫',
    'health' => '健康',
    'visit' => '旅游',
    'history' => '历史',
    'inspiration' => '鸡汤',
    'science' => '科学',
    'baby' => '育儿',
    'food' => '美食',
    'pet' => '宠物'
);
$db = array(
    'database' => 'news',
    'username' => 'news_user',
    'password' => 'Irk818$#12',
    'port' => 27017,
    'host' => '127.0.0.1',
);
$f = fopen("domains.txt", "r");
while (!feof($f)) {
    $line = fgets($f);
    $config = array();
    $config['db'] = $db;
    $config['site_url'] = "http://$line/";
    $config['site_name'] = $sitenames[mt_rand(0, count($sitenames) - 1)] . $sitename_suffix[mt_rand(0, count($sitename_suffix) - 1)];
    $keyword = array();
    while (count($keyword)<5){
        for ($i = 0;$i < count($keywords);$i++){
            $keyword[]=$keywords[mt_rand(0,count($keywords)-1)];
        }
        $keyword=array_unique($keyword);
    }
    $config['keyword']=implode(",",array_slice($keyword,0,5));
    $descriptions=str_replace("<repl>",$config['keyword'],$descriptions);
    $config['description']=$config['site_name'].$descriptions;
    $nav=array();
    while (count($nav)<5){
        for ($i = 0;$i < 5;$i++){
            $key=array_rand($categorys);
            $nav[$key]=$categorys[$key];
        }
        $nav=array_unique($nav);
    }
    $config['nav']=$nav;
    if(!is_dir($line)){
        mkdir($line,0755,true);
    }
    $config=var_export($config,true);
    file_put_contents("$line/config.php","<?php\nreturn ".$config.";");

}
