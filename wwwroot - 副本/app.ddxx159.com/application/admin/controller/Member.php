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
use think\Db;

/**
 * 后台用户管理控制器
 * Class Member
 * @package app\admin\controller
 */
class Member extends BasicAdmin
{

    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Member';

    /**
     * 用户列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '用户管理';
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
        $db = Db::connect($db_config)->name($this->table)->order('id desc')->where('dataFlag',1);
        
        // 会员信息查询过滤
        foreach (['phone', 'realname', 'level'] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where($field, 'like', "%{$get[$field]}%");
            }
        }
        // 状态
        (isset($get['realnameStatus']) && $get['realnameStatus'] !== '') && $db->where('realnameStatus', $get['realnameStatus']);
        (isset($get['isPay']) && $get['isPay'] !== '') && $db->where('isPay', $get['isPay']);
        
        // 时间过滤
        if (isset($get["regTime"]) && $get["regTime"] !== '') {
            list($start, $end) = explode(' - ', $get["regTime"]);
            $db->whereBetween("regTime", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }
    /**
     * 查看下级
     *
     *
     * */
    public function downrecommend()
    {
        $userId=input('request.id/d',0);
        $allmemberId=input('request.allmemberId/d',0);
        $this->assign('allmemberId',$allmemberId);
        $db_config=db_config($allmemberId);
        $db = Db::connect($db_config)->name($this->table)->order('id desc')->where(['recommendId'=>$userId]);
        return parent::_list($db);
    }
}
