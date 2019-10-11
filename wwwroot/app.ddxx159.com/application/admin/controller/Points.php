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

namespace app\admin\controller;

use controller\BasicAdmin;
use service\DataService;
use service\NodeService;
use service\ToolsService;
use service\LogService;
use think\Db;

/**
 * 后台用户积分控制器
 * Class Points
 * @package app\admin\controller
 */
class Points extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'pointslog';


    /**
     * 积分明细
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '积分明细';
        $get = $this->request->get();
        
        if(isset($get['allmemberId']) && $get['allmemberId'] !== ''){
            $allmemberId=$get['allmemberId'];
        }else{
            $allmemberId=0;
            $allmember=getAllMember();
            if($allmember){
                $allmemberId=$allmember[0]['id'];
            }
        }
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        
        $db = Db::connect($db_config)->name($this->table)->alias('p')->join('member m','m.id=p.memberId','inner')->order('p.id desc')->field("p.*,m.realname,m.phone");
        
        // 信息查询过滤
        foreach (['phone', 'realname'] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where("m.".$field, 'like', "%{$get[$field]}%");
            }
        }

        // 时间过滤
        if (isset($get["add_time"]) && $get["add_time"] !== '') {
            list($start, $end) = explode(' - ', $get["add_time"]);
            $db->whereBetween("p.add_time", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }

    /**
     * 显示系统常规配置
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function msg()
    {
        $this->title='积分说明';
        
        $table = 'SystemConfig';
        
        if ($this->request->isGet()) {
            return $this->fetch('', ['title' => $this->title]);
        }
        if ($this->request->isPost()) {
            foreach ($this->request->post() as $key => $vo) {
                sysconf($key, $vo);
            }
            LogService::write('积分说明', '积分说明配置成功');
            $this->success('积分说明配置成功！', '');
        }
    }


   
}
