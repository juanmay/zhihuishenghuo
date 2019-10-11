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
use service\LogService;
use think\Db;

/**
 * 统计控制器
 * Class About
 * @package app\admin\controller
 */
class Statistics extends BasicAdmin
{

    /**
     * 用户统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function member()
    {
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
        $dayOne=Db::connect($db_config)->name('member')->where('dataFlag',1)->count();
        $dayTwo=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(regTime)")->count();
        //->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY)",'<=',date('regTime'))->count();
        $dayThree=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(regTime)")->count();
        //->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY)",'<=',date('regTime'))->count();
        $dayFour=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= date(regTime)")->count();
        //->where("DATE_SUB(CURDATE(), INTERVAL 3 month)",'<=',date('regTime'))->count();
        $dayFive=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= date(regTime)")->count();
        //->where("DATE_SUB(CURDATE(), INTERVAL 6 month)",'<=',date('regTime'))->count();
        $dayOne2=Db::connect($db_config)->name('member')->where('dataFlag',1)->where('realTime is not null')->count();
        $dayTwo2=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(realTime)")->count();
        $dayThree2=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(realTime)")->count();
        $dayFour2=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= date(realTime)")->count();
        $dayFive2=Db::connect($db_config)->name('member')->where('dataFlag',1)
        ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= date(realTime)")->count();
        

        $day=[
            '1'=>$dayOne?$dayOne:0,
            '2'=>$dayTwo?$dayTwo:0,
            '3'=>$dayThree?$dayThree:0,
            '4'=>$dayFour?$dayFour:0,
            '5'=>$dayFive?$dayFive:0,
        ];

        $day2=[
            '1'=>$dayOne2?$dayOne2:0,
            '2'=>$dayTwo2?$dayTwo2:0,
            '3'=>$dayThree2?$dayThree2:0,
            '4'=>$dayFour2?$dayFour2:0,
            '5'=>$dayFive2?$dayFive2:0,
        ];

        $userSource1=Db::connect($db_config)->name('member')->where('dataFlag',1)->where('realTime','<>','')->count();
        $userSource2=Db::connect($db_config)->name('member')->where('dataFlag',1)->where('realTime',NULL)->count();

        $userSource[]=['name'=>'认证量','value'=>$userSource1];
        $userSource[]=['name'=>'未认证量','value'=>$userSource2];

        $time=date("Y-m-d");


        for($i=30;$i>=0;$i--){
            $x=date("Y-m-d",strtotime("-{$i} day"));
            /* if($i%3 == 0){
                $timeX[]=$x;
            }else{
                $timeX[]='';
            } */
            $timeX[]=$x;
            
            $userLine1=Db::connect($db_config)->name('member')->where('dataFlag',1)->where('regTime','like',"{$x}%")->count();
            $userLine2=Db::connect($db_config)->name('member')->where('dataFlag',1)->where('realTime','like',"{$x}%")->count();
            $userLineAll1[]=$userLine1?round($userLine1,2):0;
            $userLineAll2[]=$userLine2?round($userLine2,2):0;
        }
        $this->assign('day',$day);
        $this->assign('day2',$day2);
        $this->assign('userSource',json_encode($userSource));

        $this->assign("timeX",json_encode($timeX));
        $this->assign("userLineAll1",json_encode($userLineAll1));
        $this->assign("userLineAll2",json_encode($userLineAll2));
        return $this->fetch('', ['title' => '用户统计']);
    }
    /**
     * 还款统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function repayment()
    {
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
        
        $channel_type=[
            'hx','cjm','cj'
        ];
        $all=[
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ];
        foreach($channel_type as &$v){
        $dayOne=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)->sum('repayment_money');
        $dayTwo=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)
        ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
        $dayThree=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)
        ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
        $dayFour=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)
        ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
        $dayFive=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)
        ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
        $daySix=Db::connect($db_config)->name('repayment')->where('status',2)->where('channel_type',$v)->count();
        
        $day[$v]=[
            '1'=>$dayOne?round($dayOne,2):0,
            '2'=>$dayTwo?round($dayTwo,2):0,
            '3'=>$dayThree?round($dayThree,2):0,
            '4'=>$dayFour?round($dayFour,2):0,
            '5'=>$dayFive?round($dayFive,2):0,
            '6'=>$daySix?$daySix:0,
        ];
        //总计
        $all[1]+=$dayOne;
        $all[2]+=$dayTwo;
        $all[3]+=$dayThree;
        $all[4]+=$dayFour;
        $all[5]+=$dayFive;
        $all[6]+=$daySix;
        
        switch($v){
            case 'hx':$name='环讯小额';break;
            case 'cjm':$name='畅捷小额';break;
            case 'cj':$name='畅捷大额';break;
        }
        //饼图
        $repaymentName[]=$name;
        $repaymentSource[]=['name'=>$name,'value'=>$dayOne];
        }
        $day['all']=$all;
        
        $time=date("Y-m-d");
        $repaymentAll=[];
        foreach($channel_type as $k=>&$v){
            for($i=30;$i>=0;$i--){
                $x=date("Y-m-d",strtotime("-{$i} day"));
                $timeX[]=$x;
                $repayment_money=Db::connect($db_config)->name('repayment')->where('status',2)
                ->where('channel_type',$v)
                ->where("FROM_UNIXTIME(add_time,'%Y-%m-%d') = '{$x}'")->sum('repayment_money');
                $repaymentAll[$k]['name']=$repaymentName[$k];
                $repaymentAll[$k]['type']='line';
                $repaymentAll[$k]['stack']='总量';
                $repaymentAll[$k]['data'][]=$repayment_money?round($repayment_money,2):0;
            }
        }
        
        $this->assign('day',$day);
        $this->assign('repaymentSource',json_encode($repaymentSource));
        $this->assign('repaymentName',json_encode($repaymentName));
        $this->assign('repaymentAll',json_encode($repaymentAll));
        $this->assign("timeX",json_encode($timeX));
        return $this->fetch('', ['title' => '还款统计']);
    }
    /**
     * 还款统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function repaymentmember()
    {
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
        
        $channel_type=[
            'hx','cjm','cj'
        ];
        $all=[
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ];
        foreach($channel_type as &$v){
            $dayOne=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)->sum('repayment_money');
            $dayTwo=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayThree=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFour=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFive=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $daySix=Db::connect($db_config)->name('repayment_member')->where('status',2)->where('channel_type',$v)->count();
            
            $day[$v]=[
                '1'=>$dayOne?round($dayOne,2):0,
                '2'=>$dayTwo?round($dayTwo,2):0,
                '3'=>$dayThree?round($dayThree,2):0,
                '4'=>$dayFour?round($dayFour,2):0,
                '5'=>$dayFive?round($dayFive,2):0,
                '6'=>$daySix?$daySix:0,
            ];
            //总计
            $all[1]+=$dayOne;
            $all[2]+=$dayTwo;
            $all[3]+=$dayThree;
            $all[4]+=$dayFour;
            $all[5]+=$dayFive;
            $all[6]+=$daySix;
            
            switch($v){
                case 'hx':$name='环讯小额';break;
                case 'cjm':$name='畅捷小额';break;
                case 'cj':$name='畅捷大额';break;
            }
            //饼图
            $repaymentName[]=$name;
            $repaymentSource[]=['name'=>$name,'value'=>$dayOne];
        }
        $day['all']=$all;
        
        $time=date("Y-m-d");
        $repaymentAll=[];
        foreach($channel_type as $k=>&$v){
            for($i=30;$i>=0;$i--){
                $x=date("Y-m-d",strtotime("-{$i} day"));
                $timeX[]=$x;
                $repayment_money=Db::connect($db_config)->name('repayment_member')->where('status',2)
                ->where('channel_type',$v)
                ->where("FROM_UNIXTIME(add_time,'%Y-%m-%d') = '{$x}'")->sum('repayment_money');
                $repaymentAll[$k]['name']=$repaymentName[$k];
                $repaymentAll[$k]['type']='line';
                $repaymentAll[$k]['stack']='总量';
                $repaymentAll[$k]['data'][]=$repayment_money?round($repayment_money,2):0;
            }
        }
        
        $this->assign('day',$day);
        $this->assign('repaymentSource',json_encode($repaymentSource));
        $this->assign('repaymentName',json_encode($repaymentName));
        $this->assign('repaymentAll',json_encode($repaymentAll));
        $this->assign("timeX",json_encode($timeX));
        return $this->fetch('', ['title' => '中介还款统计']);
    }
    /**
     * 一卡还卡统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function repaymentcard()
    {
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
        $channel_type=[
            'cjm'
        ];
        $all=[
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ];
        foreach($channel_type as &$v){
            $dayOne=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)->sum('repayment_money');
            $dayTwo=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayThree=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFour=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFive=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $daySix=Db::connect($db_config)->name('repayment_card')->where('status',2)->where('channel_type',$v)->count();
            
            $day[$v]=[
                '1'=>$dayOne?round($dayOne,2):0,
                '2'=>$dayTwo?round($dayTwo,2):0,
                '3'=>$dayThree?round($dayThree,2):0,
                '4'=>$dayFour?round($dayFour,2):0,
                '5'=>$dayFive?round($dayFive,2):0,
                '6'=>$daySix?$daySix:0,
            ];
            //总计
            $all[1]+=$dayOne;
            $all[2]+=$dayTwo;
            $all[3]+=$dayThree;
            $all[4]+=$dayFour;
            $all[5]+=$dayFive;
            $all[6]+=$daySix;
            
            switch($v){
                case 'hx':$name='环讯小额';break;
                case 'cjm':$name='畅捷小额';break;
                case 'cj':$name='畅捷大额';break;
            }
            //饼图
            $repaymentName[]=$name;
            $repaymentSource[]=['name'=>$name,'value'=>$dayOne];
        }
        $day['all']=$all;
        
        $time=date("Y-m-d");
        $repaymentAll=[];
        foreach($channel_type as $k=>&$v){
            for($i=30;$i>=0;$i--){
                $x=date("Y-m-d",strtotime("-{$i} day"));
                $timeX[]=$x;
                $repayment_money=Db::connect($db_config)->name('repayment_card')->where('status',2)
                ->where('channel_type',$v)
                ->where("FROM_UNIXTIME(add_time,'%Y-%m-%d') = '{$x}'")->sum('repayment_money');
                $repaymentAll[$k]['name']=$repaymentName[$k];
                $repaymentAll[$k]['type']='line';
                $repaymentAll[$k]['stack']='总量';
                $repaymentAll[$k]['data'][]=$repayment_money?round($repayment_money,2):0;
            }
        }
        
        $this->assign('day',$day);
        $this->assign('repaymentSource',json_encode($repaymentSource));
        $this->assign('repaymentName',json_encode($repaymentName));
        $this->assign('repaymentAll',json_encode($repaymentAll));
        $this->assign("timeX",json_encode($timeX));
        return $this->fetch('', ['title' => '一卡还卡还款统计']);
    }
    /**
     * 空卡统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function fpaywithhold()
    {
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
        
        $channel_type=[
            'kb'
        ];
        $all=[
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ];
        foreach($channel_type as &$v){
            $dayOne=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)->sum('repayment_money');
            $dayTwo=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayThree=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFour=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $dayFive=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= FROM_UNIXTIME(add_time, '%Y-%m-%d %H:%i:%s')")->sum('repayment_money');
            $daySix=Db::connect($db_config)->name('fpaywithhold')->where('status',2)->where('channel_type',$v)->count();
            
            $day[$v]=[
                '1'=>$dayOne?round($dayOne,2):0,
                '2'=>$dayTwo?round($dayTwo,2):0,
                '3'=>$dayThree?round($dayThree,2):0,
                '4'=>$dayFour?round($dayFour,2):0,
                '5'=>$dayFive?round($dayFive,2):0,
                '6'=>$daySix?$daySix:0,
            ];
            //总计
            $all[1]+=$dayOne;
            $all[2]+=$dayTwo;
            $all[3]+=$dayThree;
            $all[4]+=$dayFour;
            $all[5]+=$dayFive;
            $all[6]+=$daySix;
            
            switch($v){
                case 'kb':$name='酷宝还款';break;
            }
            //饼图
            $repaymentName[]=$name;
            $repaymentSource[]=['name'=>$name,'value'=>$dayOne];
        }
        $day['all']=$all;
        
        $time=date("Y-m-d");
        $repaymentAll=[];
        foreach($channel_type as $k=>&$v){
            for($i=30;$i>=0;$i--){
                $x=date("Y-m-d",strtotime("-{$i} day"));
                $timeX[]=$x;
                $repayment_money=Db::connect($db_config)->name('fpaywithhold')->where('status',2)
                ->where('channel_type',$v)
                ->where("FROM_UNIXTIME(add_time,'%Y-%m-%d') = '{$x}'")->sum('repayment_money');
                $repaymentAll[$k]['name']=$repaymentName[$k];
                $repaymentAll[$k]['type']='line';
                $repaymentAll[$k]['stack']='总量';
                $repaymentAll[$k]['data'][]=$repayment_money?round($repayment_money,2):0;
            }
        }
        
        $this->assign('day',$day);
        $this->assign('repaymentSource',json_encode($repaymentSource));
        $this->assign('repaymentName',json_encode($repaymentName));
        $this->assign('repaymentAll',json_encode($repaymentAll));
        $this->assign("timeX",json_encode($timeX));
        return $this->fetch('', ['title' => '空卡还款统计']);
    }
    /**
     * 收款统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function quick()
    {
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
        
        $type=[
            'cj','yb'
        ];
        $all=[
            '1'=>0,
            '2'=>0,
            '3'=>0,
            '4'=>0,
            '5'=>0,
            '6'=>0,
        ];
        foreach($type as &$v){
            $dayOne=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)->sum('money');
            $dayTwo=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= add_time")->sum('money');
            $dayThree=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= add_time")->sum('money');
            $dayFour=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= add_time")->sum('money');
            $dayFive=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)
            ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= add_time")->sum('money');
            $daySix=Db::connect($db_config)->name('quick')->where('status',6)->where('type',$v)->count();
            
            $day[$v]=[
                '1'=>$dayOne?round($dayOne,2):0,
                '2'=>$dayTwo?round($dayTwo,2):0,
                '3'=>$dayThree?round($dayThree,2):0,
                '4'=>$dayFour?round($dayFour,2):0,
                '5'=>$dayFive?round($dayFive,2):0,
                '6'=>$daySix?$daySix:0,
            ];
            //总计
            $all[1]+=$dayOne;
            $all[2]+=$dayTwo;
            $all[3]+=$dayThree;
            $all[4]+=$dayFour;
            $all[5]+=$dayFive;
            $all[6]+=$daySix;
            
            switch($v){
                case 'xf':$name='先锋';break;
                case 'cj':$name='畅捷';break;
                case 'yb':$name='易宝';break;
            }
            //饼图
            $quickName[]=$name;
            $quickSource[]=['name'=>$name,'value'=>$dayOne];
        }
        $day['all']=$all;
        
        $time=date("Y-m-d");
        $quickAll=[];
        foreach($type as $k=>&$v){
            for($i=30;$i>=0;$i--){
                $x=date("Y-m-d",strtotime("-{$i} day"));
                $timeX[]=$x;
                $money=Db::connect($db_config)->name('quick')->where('status',6)
                ->where('type',$v)
                ->where("FROM_UNIXTIME(add_time,'%Y-%m-%d') = '{$x}'")->sum('money');
                $quickAll[$k]['name']=$quickName[$k];
                $quickAll[$k]['type']='line';
                $quickAll[$k]['stack']='总量';
                $quickAll[$k]['data'][]=$money?round($money,2):0;
            }
        }
        
        $this->assign('day',$day);
        $this->assign('quickSource',json_encode($quickSource));
        $this->assign('quickName',json_encode($quickName));
        $this->assign('quickAll',json_encode($quickAll));
        $this->assign("timeX",json_encode($timeX));
        return $this->fetch('', ['title' => '收款统计']);
    }
    /**
     * 用户统计
     * @return string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function memberlogin()
    {
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
        
        $dayOne=Db::connect($db_config)->name('log_member_logins')->count();
        $dayTwo=Db::connect($db_config)->name('log_member_logins')
        ->where("DATE_SUB(CURDATE(), INTERVAL 7 DAY) <= date(loginTime)")->count();
        $dayThree=Db::connect($db_config)->name('log_member_logins')
        ->where("DATE_SUB(CURDATE(), INTERVAL 30 DAY) <= date(loginTime)")->count();
        $dayFour=Db::connect($db_config)->name('log_member_logins')
        ->where("DATE_SUB(CURDATE(), INTERVAL 3 month) <= date(loginTime)")->count();
        $dayFive=Db::connect($db_config)->name('log_member_logins')
        ->where("DATE_SUB(CURDATE(), INTERVAL 6 month) <= date(loginTime)")->count();
        
        $day=[
            '1'=>$dayOne?$dayOne:0,
            '2'=>$dayTwo?$dayTwo:0,
            '3'=>$dayThree?$dayThree:0,
            '4'=>$dayFour?$dayFour:0,
            '5'=>$dayFive?$dayFive:0,
        ];
        
        $time=date("Y-m-d");
        
        for($i=30;$i>=0;$i--){
            $x=date("Y-m-d",strtotime("-{$i} day"));
            $timeX[]=$x;
            
            $userLine1=Db::connect($db_config)->name('log_member_logins')->where('loginTime','like',"{$x}%")->count();
            $userLineAll[]=$userLine1?round($userLine1,2):0;
        }
        
        for($i=12;$i>=0;$i--){
            $x=date("Y-m",strtotime("-{$i} month"));
            $timeX2[]=$x;
            
            $userLine1=Db::connect($db_config)->name('log_member_logins')->where('loginTime','like',"{$x}%")->count();
            $userLineAll2[]=$userLine1?round($userLine1,2):0;
        }
        $this->assign('day',$day);
        
        $this->assign("timeX",json_encode($timeX));
        $this->assign("timeX2",json_encode($timeX2));
        $this->assign("userLineAll",json_encode($userLineAll));
        $this->assign("userLineAll2",json_encode($userLineAll2));
        return $this->fetch('', ['title' => '活跃统计']);
    }
}
