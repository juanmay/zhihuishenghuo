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
use think\Db;

/**
 * 品牌管理控制器
 * Class Agent
 * @package app\admin\controller
 */
class Allmember extends BasicAdmin
{
    
    /**
     * 绑定操作模型
     * @var string
     */
    public $table = 'Allmember';
    
    /**
     * 品牌列表
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $this->title = '品牌管理';
        $get = $this->request->get();
        
        $where['dataFlag']=1;
        if(session('user.isAllShow') == '0'){
            $where['fid']=session('user.id');
        }
        $db = Db::name($this->table)->where($where)->order('id desc');
        
        // 会员信息查询过滤
        foreach (['phone', 'realname'] as $field) {
            if (isset($get[$field]) && $get[$field] !== '') {
                $db->where($field, 'like', "%{$get[$field]}%");
            }
        }
        // 状态
        (isset($get['status']) && $get['status'] !== '') && $db->where('status', $get['status']);
        
        // 时间过滤
        if (isset($get["regTime"]) && $get["regTime"] !== '') {
            list($start, $end) = explode(' - ', $get["regTime"]);
            $db->whereBetween("regTime", ["{$start} 00:00:00", "{$end} 23:59:59"]);
        }
        return parent::_list($db);
    }
    
    /**
     * 添加品牌
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function add()
    {
        if ($this->request->isPost()) {
            $data=$this->request->post();
            $fbmemberId=Db::name($this->table)->insertGetId($data);
            if($fbmemberId){
                $data['key']=userKey($fbmemberId);
                $data['mysqlName']='dscj_'.$fbmemberId;
                $fbmember=Db::name($this->table)->where('id',$fbmemberId)->update($data);
                if($fbmember){
                    $this->success('恭喜, 数据保存成功!', '');
                }else{
                    Db::name($this->table)->where('id',$fbmemberId)->delete();
                    $this->error('数据保存失败, 请稍候再试!');
                }
            }else{
                $this->error('数据保存失败, 请稍候再试!');
            }
        }
        return $this->fetch('form');
    }
    
    /**
     * 编辑品牌
     * @return array|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function edit()
    {
        if ($this->request->isPost()) {
            $allmemberId=input('post.id/d',0);
            $data=$this->request->post();
            $fbmember=Db::name($this->table)->where('id',$allmemberId)->update($data);
            if($fbmember !== false){
                $this->success('恭喜, 数据保存成功!', '');
            }else{
                $this->error('数据保存失败, 请稍候再试!');
            }
        }
        $fbmemberId=input('get.id/d',0);
        $fbmember=Db::name($this->table)->where('id',$fbmemberId)->find();
        $this->assign('vo',$fbmember);
        return $this->fetch('form');
    }
    
    
    /**
     * 删除品牌
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        if (DataService::update($this->table)) {
            $this->success("品牌删除成功!", '');
        }
        $this->error("品牌删除失败, 请稍候再试!");
    }
    
    /**
     * 品牌禁用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function forbid()
    {
        if (DataService::update($this->table)) {
            $this->success("品牌禁用成功!", '');
        }
        $this->error("品牌禁用失败, 请稍候再试!");
    }
    
    /**
     * 品牌启用
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function resume()
    {
        if (DataService::update($this->table)) {
            $this->success("品牌启用成功!", '');
        }
        $this->error("品牌启用失败, 请稍候再试!");
    }
    /**
     * 充值
     *
     * */
    public function money()
    {
        $allmemberId=input('get.id/d',0);
        $allmember=Db::name($this->table)->where('id',$allmemberId)->find();
        $this->assign('allmember',$allmember);
        if($this->request->isPost()){
            $money = input("post.money/f",0);
            $type = input("post.type/d",1);
            $content = input("post.content/s",'');
            $allmemberId = input("post.allmemberId/d",0);
            $money=abs($money);
            if(($money == 0) || ( $money == '') ||  ($money == 0.0) ){
                $this->error("保存失败,金额无效");
            }
            $db_config=db_config($allmemberId);
            
            $result=allmember_moneylog($allmemberId,$money,$content,$type,$allmemberId,'allmember',$db_config);
            if($result){
                $this->success('保存成功！','');
            }else{
                $this->error("保存失败");
            }
        }
        return $this->fetch();
    }
}
